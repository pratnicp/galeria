<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('upload_tmp_dir','/tmp/');


require_once('lib/parameters.php');
require_once('lib/session.php');
require_once('lib/database_connection.php');
require_once('lib/common.php');
require_once('view.php');
//require_once('admin.php');



//$start_time = podaj_czas();
$debug = false;
start_session();
$action = get_string_parameter('action',"^[a-z]+$");

open_HTML();
print_HTML_head($action);

print_container($action);

close_body_HTML();
close_db();
//echo podaj_czas()-$start_time;

?>
