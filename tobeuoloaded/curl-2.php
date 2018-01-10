<?php
header("content-type:text/html;charset=utf-8");

//使用curl post数据
$url = "http://localhost/php_file/getpostdata.php";
$data = array(
    "name" => "abc",
    "password" => "12345"
);
//$data = json_encode($data);
//$data1 = join('&',$data);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$res = curl_exec($ch);



curl_close($ch);

print_r($res);
/* array(2) {
  ["name"]=>
  string(3) "abc"
  ["password"]=>
  string(5) "12345"
} */
