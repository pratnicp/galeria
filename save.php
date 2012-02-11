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
            if(!$new && $painting->get_photo()==NULL) {
                $painting->set_photo($painting_pers->get_photo());
            }elseif ($painting->get_photo()!=NULL) {
                $foto_filename = uniqid("", TRUE);
                $tmp_path = '/tmp/'.$foto_filename;
                save_file($painting->get_photo(), $tmp_path.'.jpeg' , TRUE);
                $width=150;
                $size = getimagesize($tmp_path.'.jpeg');
                $w = $size[0];
                $scale = $w/$width;
                $h = $size[1]/$scale;
                cropImage($width, $h, $tmp_path.'.jpeg', 'jpg', 'images/'.$foto_filename.'.jpeg');
				cropImage($size[0], $size[1], $tmp_path.'.jpeg', 'jpg', 'images/'.$foto_filename.'big.jpeg');
		@unlink($tmp_path.'.jpeg');
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

        case 'technique':
            if (!$admin) {
                break;
            }
            $technique=Technique::load_from_form();
            $new = (($technique->get_id()==NULL) || ($technique_pers = Technique::load_one($conn, 'id='.$technique->get_id()))==false) ;
            if($new) {
                $technique->insert($conn);
            }else {
                $technique->update($conn, "id=".$technique->get_id());
            }
            close_db($conn);
            redirection($_SERVER['HTTP_REFERER'],'Technika została zapisana'  ,0);
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
                    update_db('Painting', array('order_id'=>$order_index), "id=$value", $conn);
                }
            }
            break;

    }
    close_db($conn);
    header("Location: $location", true, 302);
    exit;
}



?>
