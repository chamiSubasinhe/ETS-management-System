<?php
session_start();

$_SESSION = array();

session_destroy();
unset($_COOKIE['UID']);

header("location: login.php");
exit;
?>