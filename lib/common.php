<?php
function shorten_text($text, $chars) {
	// Change to the number of characters you want to display

	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."...";

	return $text;
}

function generate_link($relative){
	if(parse_url($relative)== FALSE ){
		return 'http://'.$_SERVER['HTTP_HOST'].$relative;
	}
	return $relative;
}
function generate_href($url){
	$parsed_url= parse_url($url);
	if(isset($parsed_url['scheme'])){
		return "href=\"".$url."\" target=\"_blank\"";
	}
	return "href=\"".'http://'.$_SERVER['HTTP_HOST'].'/'.$url."\"";;
}


function decode_BBCode($string) {
	$search = array(
    '@\[(?i)b\](.*?)\[/(?i)b\]@si',
    '@\[(?i)i\](.*?)\[/(?i)i\]@si',
    '@\[(?i)u\](.*?)\[/(?i)u\]@si',
    '@\[(?i)img\](.*?)\[/(?i)img\]@si',
    '@\[(?i)url=(.*?)\](.*?)\[/(?i)url\]@si',
    '@\[(?i)code\](.*?)\[/(?i)code\]@si',
	'@\[(?i)url\](.*?)\[/(?i)url\]@si',
	'@\[(?i)quote\](.*?)\[/(?i)quote\]@si',
	'/\n/'
	);
	$replace = array(
    '<b>\\1</b>',
    '<i>\\1</i>',
    '<u>\\1</u>',
    '<img align="left" hspace="10" vspace="10" src="\\1" alt="\\1" />',
    '<a href="\\1">\\2</a>',
    '<code>\\1</code>',
    '<a href="\\1" target="new">\\1</a>',
    '<p class="quote">\\1</p>',
    '<br/>'
    );
    return preg_replace($search , $replace, $string);
}
function strip_BBCode($string) {
	$search = array(
    '@\[(?i)b\](.*?)\[/(?i)b\]@si',
    '@\[(?i)i\](.*?)\[/(?i)i\]@si',
    '@\[(?i)u\](.*?)\[/(?i)u\]@si',
    '@\[(?i)img\](.*?)\[/(?i)img\]@si',
    '@\[(?i)url=(.*?)\](.*?)\[/(?i)url\]@si',
    '@\[(?i)code\](.*?)\[/(?i)code\]@si',
	'@\[(?i)url\](.*?)\[/(?i)url\]@si',
	'@\[(?i)quote\](.*?)\[/(?i)quote\]@si'
	);
	$replace = array(
    '\\1',
    '\\1',
    '\\1',
    '',
    '\\2',
    '\\1',
    '\\1',
    '\\1'
    );
    return preg_replace($search , $replace, $string);
}


function polish_monts($number){
	switch ($number){
		case 1:
			return "Styczeń";
		case 2:
			return "Luty";
		case 3:
			return "Marzec";
		case 4:
			return "Kwiecień";
		case 5:
			return "Maj";
		case 6:
			return "Czerwiec";
		case 7:
			return "Lipiec";
		case 8:
			return "Sierpień";
		case 9:
			return "Wrzesień";
		case 10:
			return "Październik";
		case 11:
			return "Listopad";
		case 12:
			return "Grudzień";
		default:
			return "";
	}
}

function is_valid_email($string){
	if (ereg("(^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$)", $string)){
		return true;
	}
	return false;
}

function is_valid_link($page){
	if(ereg("^http\:\/\/([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$",$page)){
		return true;
	}
	return false;
}
function notify_admin($message){
	include 'config.php';
	$sender_agent= $_SERVER['HTTP_USER_AGENT'];
	$sender_ip=$_SERVER['REMOTE_ADDR'];
	mail($admin_email, "notification from mod-kaski.art.pl", "$sender_agent \r\n $sender_ip \r\n $message \r\n",
	    "From: $daemon_email\r\n");
}

function replace_emoticons_with_images($string){

	$patterns[0]="/\r\n/";
	$patterns[1]="/(:\)|:-\))/";		// :)
	$patterns[2]="/(:\(|:-\()/";		// :-(
	$patterns[3]="/(:\]|:-\])/";		// :]
	$patterns[4]="/(:[Pp]|:-[Pp])/";	//:P
	$patterns[5]="/(;\)|;-\))/";		//;)
	$patterns[6]="/(:[Dd>]|:-[Dd>])/";	//:D
	$patterns[7]="/(;\(|;-\()/";		//;(
	$patterns[8]="/(:[Oo]|:-[Oo])/";	//:O
	$patterns[9]="/(:@|:-@)/";		//:@
	$patterns[10]="/(:$|:-$)/";		//:$
	$patterns[11]="/(:\||:-\|)/";		//:|
	$patterns[12]="/(:[Ss]|:-[sS])/";	//:S
	$patterns[13]="/([B8]\)|[B8]-\))/";	//8)
	$patterns[14]="/(:\[|:-\[)/";		//:[
	$patterns[15]="/\&/";		// & - ampersand



	$replacements[0]='<br/>';
	$replacements[1]='<img src="../zasoby/morda_smile.png" alt=":-)" />';
	$replacements[2]="<img src=\"../zasoby/morda_unhappy.png\" alt=\":-(\"/>";
	$replacements[3]="<img src=\"../zasoby/morda_krzywy.png\" alt=\":]\"/>";
	$replacements[4]="<img src=\"../zasoby/morda_tongue.png\" alt=\":P\"/>";
	$replacements[5]="<img src=\"../zasoby/morda_wink.png\" alt=\";)\"/>";
	$replacements[6]="<img src=\"../zasoby/morda_biggrin.png\" alt=\":D\"/>";
	$replacements[7]="<img src=\"../zasoby/morda_cry.png\" alt=\";(\"/>";
	$replacements[8]="<img src=\"../zasoby/morda_oh.png\" alt=\":O\"/>";
	$replacements[9]="<img src=\"../zasoby/morda_angry.png\" alt=\":@\"/>";
	$replacements[10]="<img src=\"../zasoby/morda_blush.png\" alt=\":$\"/>";
	$replacements[11]="<img src=\"../zasoby/morda_stare.png\" alt=\":|\"/>";
	$replacements[12]="<img src=\"../zasoby/morda_frowning.png\" alt=\":S\"/>";
	$replacements[13]="<img src=\"../zasoby/morda_coolglasses.png\" alt=\"B)\"/>";
	$replacements[14]="<img src=\"../zasoby/morda_bat.png\" alt=\":[\"/>";
	$replacements[15]='&amp;';
	return preg_replace($patterns,$replacements,$string);
}

function is_valid_captcha($code){
	session_start();
	$valid_code=$_SESSION['captcha'];
	session_unregister('captcha');
	if($code == $valid_code ){
		return true;
	}
	return false;
}


function generate_hash($plainText,$length, $salt = null )
{
	if ($salt === null)
	{
		$salt = substr(md5(uniqid(rand(), true)), 0, $length);
	}
	else
	{
		$salt = substr($salt, 0, $length);
	}

	return $salt . sha1($salt . $plainText);
}

function dict_to_HTML($dict, $key_collumn, $value_column, $default=null){
	$html = "";
	foreach ($dict as $row) {
		$key = $row[$key_collumn];
		if($key == $default){
			$html .= '<option value="'.$key. '" selected>'.$row[$value_column] .'</option>';
		}else{
			$html .= '<option value="'.$key. '">'.$row[$value_column] .'</option>';
		}
	}
	return $html;
}

function simple_dict_to_HTML($dict, $default=null){
	$html = "";
	foreach ($dict as $key => $value) {
		if($key == $default){
			$html .= '<option value="'.$key. '" selected>'.$value .'</option>';
		}else{
			$html .= '<option value="'.$key. '">'.$value .'</option>';
		}
	}
	return $html;
}


function javascript_escape($string){
	$search = array(
    '/\n/',
    '/\r/',
    '/\t/',
    '/\'/'
    );
    $replace = array(
    '\\n',
    '\\r',
    '\\\''
    );
    return preg_replace($search , $replace, $string);
}

function redirection($url, $message, $is_error){
	session_start();
	$_SESSION["last_url"] = generate_link($url);
	$_SESSION["message"] = $message;
	$location = generate_link("index.php?action=message&error=$is_error");
	header("Location: $location");

//		print "<a href=\"$url\">$message</a>";
	exit;
}

function check_file_restrictions($uploaded_file_field, $types, $max_size){

	if(!isset($_FILES[$uploaded_file_field]) || ($_FILES[$uploaded_file_field]['name']=='')){
		return FALSE;
	}
	$uploaded_file = $_FILES[$uploaded_file_field];
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) && $_SERVER['CONTENT_LENGTH'] > 0) {
		redirection($_SERVER['HTTP_REFERER'],'The server was unable to handle that much POST data ('. $_SERVER['CONTENT_LENGTH'] .' bytes) due to its current configuration'  ,1 );
	}
	if ($uploaded_file["size"] > $max_size){
		redirection($_SERVER['HTTP_REFERER'], "Rozmiar pliku większy niż $max_size bajtów" ,1 );
	}
	if (!in_array($uploaded_file["type"], $types )){
print_r( $uploaded_file);
 echo "Upload: " . $uploaded_file["name"] . "<br />";
  echo "Type: " . $uploaded_file["type"] . "<br />";
  echo "Size: " . ($uploaded_file["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $uploaded_file["tmp_name"];
		redirection($_SERVER['HTTP_REFERER'], "To ".$uploaded_file['type']." Niedozwolony typ pliku" ,1 );
	}
	if ($uploaded_file["error"] > 0)
	{
		redirection($_SERVER['HTTP_REFERER'], $uploaded_file["error"] ,1 );
	}
	return $uploaded_file;
}

function save_file($file, $path, $owerwrite ){
	if (file_exists($path) && !$owerwrite)
	{
		redirection($_SERVER['HTTP_REFERER'], "Plik $path już istnieje" ,1 );
	}
	else
	{
		move_uploaded_file($file["tmp_name"],
		$path);
	}
}

function podaj_czas(){
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}


//usage example
//cropImage(225, 165, '/path/to/source/image.jpg', 'jpg', '/path/to/dest/image.jpg');
function cropImage($nw, $nh, $source, $stype, $dest) {
	$size = getimagesize($source);
	$w = $size[0];
	$h = $size[1];
	switch($stype) {
		case 'gif':
			$simg = imagecreatefromgif($source);
			break;
		case 'jpg':
			$simg = imagecreatefromjpeg($source);
			break;
		case 'png':
			$simg = imagecreatefrompng($source);
			break;
	}

	$dimg = imagecreatetruecolor($nw, $nh);

	$wm = $w/$nw;
	$hm = $h/$nh;

	$h_height = $nh/2;
	$w_height = $nw/2;

	if($w> $h) {
			
		$adjusted_width = $w / $hm;
		$half_width = $adjusted_width / 2;
		$int_width = $half_width - $w_height;
			
		imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
			
	} elseif(($w <$h) || ($w == $h)) {
			
		$adjusted_height = $h / $wm;
		$half_height = $adjusted_height / 2;
		$int_height = $half_height - $h_height;
			
		imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
			
	} else {
		imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
	}

	imagejpeg($dimg,$dest,100);
}


function rmdir_recurse($path)
{
	$path= rtrim($path, '/').'/';
	$handle = opendir($path);
	for (;false !== ($file = readdir($handle));)
	if($file != "." and $file != ".." )
	{
		$fullpath= $path.$file;
		if( is_dir($fullpath) )
		{
			rmdir_recurse($fullpath);
			rmdir($fullpath);
		}
		else
		unlink($fullpath);
	}
	closedir($handle);
}

function is_null_or_empty($str){
    if($str==NULL){
        return true;
    }
    if (trim($str)==""){
        return true;
    }
    return false;

}

?>
