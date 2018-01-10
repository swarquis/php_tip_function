<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
/* $ch = curl_init("baidu.com");
curl_exec($ch);
curl_close(); */
//$ch = curl_init();
//curl_setopt($ch,CURLOPT_URL,'baidu.com');
//curl_close();

$ch = curl_init();
$filename = "http://www.maiziedu.com/uploads/avatar/4_big.jpg";
curl_setopt($ch, CURLOPT_URL,$filename);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$size = filesize($filename);
$res = curl_exec($ch);
$info = curl_getinfo($ch);
file_put_contents("./test.jpg", $res);
$downloadSize = $info['size_download'];
if(false === $res){
    echo curl_strerror(curl_errno($ch));
}else{
    if($size == $downloadSize){
        //file_get_contents('test.jpg');
    }else{
        echo "incomplete";
    }
    
}
curl_close($ch);


curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);