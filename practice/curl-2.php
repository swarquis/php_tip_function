<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

$ch = curl_init();
/* $option = array(
    CURLOPT_URL=>"getCurl.php",
    CURLOPT_RETURNTRANSFER=>1,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array('name'=>'abc','id'=>'dnsa13')
);

$res = curl_setopt_array($ch,$option); */
$data = array("name"=>"avb","age"=>12);
$data = array("file"=>"@http://localhost/php_file/practice/test.gif");
//$data = json_encode($data);
curl_setopt($ch,CURLOPT_URL,"http://localhost/php_file/practice/getCurl.php");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

 $res = curl_exec($ch);

curl_close($ch);
echo $res;