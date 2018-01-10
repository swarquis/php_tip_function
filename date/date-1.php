<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
//echo date("jS F Y,H i s O");
//$timestamp = mktime();
$timestamp = time();
$timestamp = date("U");
//echo $timestamp;
foreach(getdate(time()) as $k=> $time){
    print_r($k.'---'.$time);
    echo "<br/>";
}

var_dump(checkdate(12,33,12));

echo strftime("%c");