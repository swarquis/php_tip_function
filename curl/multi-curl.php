<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

$ch1 = curl_init();
curl_setopt($ch1,CURLOPT_URL,"baidu.com");
curl_setopt($ch1,CURLOPT_RETURNTRANSFER,1);
$ch2 = curl_init();
curl_setopt($ch2,CURLOPT_URL,"sina.com");
curl_setopt($ch2,CURLOPT_RETURNTRANSFER,1);
$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch1);
curl_multi_add_handle($mh,$ch2);
$flag = null;
while($flag == true){
    curl_multi_exec($mh, $flag);
}
//var_dump($res);
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh,$ch2);
curl_close($ch1);
curl_close($ch2);