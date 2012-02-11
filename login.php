<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'lib/database_connection.php';
require_once 'lib/common.php';
require_once 'lib/parameters.php';

$logout = get_int_parameter('logout');
if($logout) {
    session_start();
    $_SESSION = array();

    // Jeśli pożądane jest zabicie sesji, usuń także ciasteczko sesyjne.
    // Uwaga: to usunie sesję, nie tylko dane sesji
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }
    // Na koniec zniszcz sesję
    session_destroy();

}else {

    $conn = connect_database();
    $name = post_string_parameter('login', '[a-zA-Z0-9]+');
    $pass = post_string_parameter('password', ".+");


    $salt_length = 9;

    $result = load_db_one("users", "password, substring(password, 1, $salt_length) as salt, id", " login = '$name'", $conn);

    $hashed_pass = generate_hash($pass, $salt_length, $result['salt']);
    if($hashed_pass == $result['password']) {
        session_start();
        $_SESSION["name"]=$name;
    }
    close_db($conn);
}
$new_location = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:generate_link("index.php");
header("Location: $new_location", true, 302);
exit;

?>
