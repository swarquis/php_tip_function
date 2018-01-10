<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

$url = "baidu.com";
if(! $contents = file_get_contents($url)){
    echo "fail to open ".$url;
}
list($a,$b,$c,$d) = explode(',',$contents);
$ch = culr_init();
curl_escape($string);
urlencode($string);
