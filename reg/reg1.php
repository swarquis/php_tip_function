<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$subject = "this is a test";
$subject = "3821906dnasja";
$pattern = "#\d+#";
$subject = "this is a test message";
$subject = "T22his\nis\na\nTest";
$pattern = "#\Bis\b#";
$pattern = "#[[:alpha:]]#";
$pattern = "#[[:digit:]]#";
$pattern = "#[[:alnum:]]#";
$pattern = "#[[:lower:]]#";
$subject = "hello world";
$pattern = "#hello (?:world|day)#";
$pattern = "#\W|\bllo|x#";
if(preg_match($pattern,$subject,$match)){
    var_dump($match);
}