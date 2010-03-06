<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

require_once 'lib/common.php';
require_once 'classes/classes.php';
require_once 'lib/parameters.php';
require_once 'lib//database_connection.php';

session_start();
$user_login = $_SESSION['name'];

$admin = ($user_login=='admin');
$conn = connect_database();

save_object(get_string_parameter('object'), $conn, $admin);



function save_object($object, $conn, $admin=false) {
    $location = generate_link("index.php");
    switch ($object) {
        case 'user':
        /* @var $user Statistics */
            $user = Statistics::load_from_form();
            $email = $user->get_email();
            if(!isset($email)) {
                close_db($conn);
                redirection($_SERVER['HTTP_REFERER'],'Wprowadź adres email'  ,0);
                break;
            }
            $painting = Painting::load_one($conn, "id=".$user->get_painting_id());
            $artist = Artist::load_one($conn, "id=".$painting->get_artist_id());
            $message = $artist->get_name()." ".$artist->get_surname()." - ".$painting->get_name()."\r\n".$user->to_string();
            include('lib/config.php');
            mail($admin_email, "notification from artgaleria.net", $message,
                    "From: $daemon_email\r\n");


            $peristent = Statistics::load_one($conn, "email='".$email."'");
            if($peristent) {
                $user->update($conn,"email='".$email."'");
            }else {
                $user->insert($conn);
                $user = Statistics::load_one($conn, "email='".$email."'");
            }
            $_SESSION['email']=$email;

            $condition = 'user_id='.$user->get_id().' and painting_id='.$user->get_painting_id();
            $row = load_db_one('user_painting', "count", $condition, $conn);
            IF($row) {
                $count=$row['count']+1;
                $fields = array('count'=> $count);
                update_db('user_painting', $fields , $condition, $conn);
            }else {
                $count=1;
                $fields = array('count'=> $count, 'user_id'=> $user->get_id(), 'painting_id'=>$user->get_painting_id());
                insert_db('user_painting', $fields, $conn);
            }


            close_db($conn);
            redirection($_SERVER['HTTP_REFERER'],'Dziękujemy. Odpowiemy niezwłocznie.'  ,0);
            break;
        case 'article':
            if (!$admin) {
                break;
            }
            $article=Article::load_from_form();
            if($article->get_id()!=NULL && Article::load_one($conn,"id=".$article->get_id())) {
                $article->update($conn, "id=".$article->get_id());
                close_db($conn);
                redirection($_SERVER['HTTP_REFERER'],'Artykuł został zapisany'  ,0);
            }else {
                close_db($conn);
                redirection($_SERVER['HTTP_REFERER'],'Strona nie istnieje'  ,1);
            }
            break;
        case 'painting':
            if (!$admin) {
                break;
            }
            $painting=Painting::load_from_form();
            $new = (($painting->get_id() == NULL) || ($painting_pers= Painting::load_one($conn, "id=".$painting->get_id())) == false);
            if(!$new && $painting->get_pdf_file()== NULL) {
                $painting->set_pdf_file($painting_pers->get_pdf_file());
            }elseif($painting->get_pdf_file()!= NULL) {
                $pdf_filename = uniqid("", TRUE).'.pdf';
                save_file($painting->get_pdf_file(), 'files/'.$pdf_filename, FALSE);
                $painting->set_pdf_file($pdf_filename);
            }
            if(!$new && $painting->get_photo()==NULL) {
                $painting->set_photo($painting_pers->get_photo());
            }elseif ($painting->get_photo()!=NULL) {
                $foto_filename = uniqid("", TRUE).'.jpeg';
                $tmp_path = '/tmp/'.$foto_filename;
                save_file($painting->get_photo(), $tmp_path , TRUE);
                $width=150;
                $size = getimagesize($tmp_path);
                $w = $size[0];
                $scale = $w/$width;
                $h = $size[1]/$scale;
                cropImage($width, $h, $tmp_path, 'jpg', 'images/'.$foto_filename);
		@unlink($tmp_path);
                $painting->set_photo($foto_filename);
            }
            if($new) {

                $painting->insert($conn);
            }else {

                $painting->update($conn, "id=".$painting->get_id());
            }
            close_db($conn);
            redirection($_SERVER['HTTP_REFERER'],'Obraz został zapisany'  ,0);
            break;

        case 'artist':
            if (!$admin) {
                break;
            }
            echo get_string_parameter('active', 'on');
            $artist=Artist::load_from_form();
            $new = (($artist->get_id()==NULL) || ($artist_pers = Artist::load_one($conn, 'id='.$artist->get_id()))==false) ;
            if (!$new && $artist->get_photo()==NULL) {
                $artist->set_photo($artist_pers->get_photo());
            }elseif ($artist->get_photo()!=NULL) {
                $foto_filename = uniqid("", TRUE).'.jpeg';
                save_file($artist->get_photo(),  'images/'.$foto_filename , FALSE);
                $artist->set_photo($foto_filename);
            }
            if($new) {
                $artist->insert($conn);
            }else {
                $artist->update($conn, "id=".$artist->get_id());
            }
            close_db($conn);
            redirection($_SERVER['HTTP_REFERER'],'Artysta został zapisany'  ,0);
            break;
        case 'paintingsOrder':
            if (!$admin) {
                break;
            }
            $result = $_REQUEST["table-sortable"];
            $order_index=0;
            foreach($result as $value) {
                if($value!=null && is_numeric($value)) {
                    $value= intval($value);
                    $order_index++;
                    update_db('Painting', array('paintings_order'=>$order_index), "id=$value", $conn);
                }
            }
            break;

    }
    close_db($conn);
    header("Location: $location", true, 302);
    exit;
}



?>
