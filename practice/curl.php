<?php
header("content-type:text/html;charset=utf-8");

$ch = curl_init();
$url = "http://www.maiziedu.com/user/login/";
$header = array(
    "www.maiziedu.com",
    "Origin: http://www.maiziedu.com",
    "Referer: http://www.maiziedu.com/",
    "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36"
    
);
$data = "account_l=xu.ruochen%40outlook.com&password_l=11111il%2F";

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_COOKIESESSION,1);
curl_setopt($ch,CURLOPT_COOKIEJAR,$cookiefile);
curl_setopt($ch,CURLOPT_COOKIEFILE,$cookiefile);

curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
$res = curl_exec($ch);
echo $res;
curl_close($ch);