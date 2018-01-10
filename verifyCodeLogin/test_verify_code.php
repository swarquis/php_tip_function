<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
require_once 'verify_pic.php';
header("content-type:text/html;charset=utf-8");

$obj = new VerifyPic(100, 30, 4, 3);
$obj->createStr();
$obj->createVerifyCode(); 
//echo $_SESSION['verifyCode'];
?>