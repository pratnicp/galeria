<?php

define('PARAM_LOWER_ENGLISH', '[a-z]+');
define('PARAM_WHATEVER', '.*');
define('PARAM_WHATEVER_NO_EMPTY', '.+');
define('PARAM_DATE', '[0-9]{4}-[0-9]{2}-[0-9]{2}');
define('PARAM_HOUR', '[0-9]{2}:[0-9]{2}');
define('PARAM_ALPHANUM_POLISH', '[A-Za-ząśćężź]+');
define('PARAM_PATH', '[A-Za-ząśćężź/_. ]*');
define('PARAM_DATETIME', '[0-9.:-]+');


function get_string_parameter($parameter_name, $regex=PARAM_LOWER_ENGLISH){
	if(!isset($_GET[$parameter_name])){
		return NULL;
	}
	$param_value =$_GET[$parameter_name];
	if(!$param_value){
		return NULL;
	} elseif (ereg($regex, $param_value)) {
$param_value= quote_smart($param_value);
		return $param_value;
	} else {
		echo "$parameter_name: $regex ";
		clean_and_die("Try hacking somebody else's site.");
	}
}


function get_int_parameter($parameter_name){
	if(!isset($_GET[$parameter_name])){
		return NULL;
	}
	$param_value =$_GET[$parameter_name];
	if(is_numeric($param_value)){
		return intval($param_value);
	} else {
		echo "$parameter_name:  '$param_value'";
		clean_and_die("Try hacking somebody else's site.");
	}
}

function post_string_parameter($parameter_name, $regex){
	if(!isset($_POST[$parameter_name])){
		return NULL;
	}
	$param_value =$_POST[$parameter_name];
	if(!$param_value){
		return NULL;
	} elseif (ereg($regex, $param_value)) {
$param_value= quote_smart($param_value);
		return $param_value;
	} else {
		clean_and_die("Try hacking somebody else's site.");
	}
}

function post_int_parameter($parameter_name){
	if(!isset($_POST[$parameter_name])){
		return NULL;
	}
	$param_value =$_POST[$parameter_name];
//	if(is_int($param_value)){
		return (int)$param_value;
//	} else {
//		clean_and_die("Try hacking somebody else's site.");
//	}
}

function post_string_parameter_strip($parameter_name, $regex){
	$value = post_string_parameter($parameter_name, $regex);
	return strip_tags($value);
}

function quote_smart($value) {
    // Stripslashes
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }
    // Quote if not integer
    if (!is_numeric($value)) {
        $value = mysql_real_escape_string($value);
    }
    return $value;
}

?>
