<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

/* echo gethostname("192.168.1.113");
getmxrr("baidu.com",$arr);
var_dump($arr); */

$url = $_POST['url'];
$email = $_POST['email'];
$url = parse_url($url);
$host = $url['host'];
gethostbyname();
gethostbyaddr();
checkdnsrr();