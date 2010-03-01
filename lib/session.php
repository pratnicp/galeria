<?php

function start_session() {
    session_start();	// This connects to the existing session
    if(!isset($_SESSION["name"])) {
        session_register ("name");	// Create a session variable called name
        $_SESSION["name"] = NULL;	// Set name = form variable $name
    }
    if(!isset($_SESSION["last_url"])) {
        $_SESSION["last_url"] = "index.php";
        session_register("last_url");
    }
    if(!isset($_SESSION["message"])) {
        $_SESSION["message"] = "";
        session_register("message");
    }
    if(!isset($_SESSION["sql_conn"])) {
        $_SESSION["sql_conn"] = connect_database();
    }
    if(!isset($_SESSION["email"])) {
        $_SESSION["email"] = "";
        session_register("email");
    }
}

?>