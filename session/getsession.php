<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

session_start();
//var_dump($_SESSION);
/* echo session_name().'+'.session_id();
//session_destroy();
echo $_SESSION['username'];
echo $_SESSION[12]; */
setcookie(session_name(),session_id(),time()-1);
session_destroy();
var_dump($_SESSION);
