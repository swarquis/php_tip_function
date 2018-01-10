<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

session_start();
ob_start();
header("content-type:application/json");

$db = mysqli_connect("localhost",'root','root') or die();

mysqli_set_charset($db,"utf8");
mysqli_select_db($db,"test");
session_id();
$_SERVER['REQUEST_METHOD'];
date_default_timezone_set($timezone_identifier);

$.ajax("url",{
    
})