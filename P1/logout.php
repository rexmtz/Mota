<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 04/02/2018
 * Time: 12:24 AM
 */


ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
header('location: subir.php');

?>
