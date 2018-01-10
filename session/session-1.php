<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

session_start();
/* $_SESSION['username'] = "A";
$_SESSION['age'] = 12;
$_SESSION[12] = 12; */

$_SESSION['info'] = [
    'username' => 'A',
    'age' => 12
];
setcookie(session_name(),session_id(),time()+100);