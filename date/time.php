<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

echo microtime(true);
$test = extension_loaded('calender');
var_dump($test);