<?php
/*
 * * Filename.......: vcard.php
 * * Author.........: Troy Wolf [troy@troywolf.com]
 * * Last Modified..: 2005/07/14 13:30:00
 * * Description....: Generate a vCard from form data.
 * */

require_once('classes/class_vcard.php');
#require_once 'lib/common.php';
require_once 'classes/classes.php';
require_once 'lib/parameters.php';
require_once 'lib//database_connection.php';

session_start();
$user_login = $_SESSION['name'];

$admin = ($user_login=='admin');
if (!$admin) {
	exit;
}
$conn = connect_database();
$id=get_int_parameter('id');
$user=Statistics::load_one($conn, "id=$id");

$vc = new vcard();

$vc->data['last_name']=$user->get_name();
$vc->data['work_address']=$user->get_address();
$vc->data['cell_tel']=$user->get_mobile();
$vc->data['fax_tel']=$user->get_fax();
$vc->data['email1']=$user->get_email();

/*foreach ($_POST as $key=>$val) {
	  $vc->data[$key] = $val;
}*/

$vc->download();

?>

