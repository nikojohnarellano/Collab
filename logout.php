<?php
include 'partials/head.php';
include 'config/config.php';

if(!isset($_SESSION['user_id'])){
	die('<a href="login.php">log in</a> first');
}

$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header('location:./login.php');
ob_end_flush();
