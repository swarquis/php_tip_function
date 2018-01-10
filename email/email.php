<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$to = "123#qq.com";
$subject = "test subject";
$content = "test content";
//mail($to,$subject,$content);