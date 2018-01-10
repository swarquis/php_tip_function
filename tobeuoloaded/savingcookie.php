<?php
header("content-type:text/html;charset=utf-8");


//模拟网站登陆
//chrome下抓取信息先view source
$url = "http://www.maiziedu.com/user/login/";
$data = "account_l=xu.rc%40qq.com&password_l=123456%2F";
//$data = urlencode($data);
$header = array(
    "Host:www.maiziedu.com",
    "Origin:http://www.maiziedu.com",
    "Referer:http://www.maiziedu.com/",
    "User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36"
);
$cookieFile = dirname(__FILE__).'/cookiefile.txt';

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);

curl_setopt($ch,CURLOPT_COOKIESESSION,1);//开启cookie
curl_setopt($ch,CURLOPT_COOKIEJAR,$cookieFile);//存储cookie信息
curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile);//读取cookie信息

curl_setopt($ch,CURLOPT_COOKIE,session_name().'='.session_id());

curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);//支持跳转
$res = curl_exec($ch);
//echo $res;//{"status":"success", "url":"/home/?source=login", "onepay_status":"False", "careercourse_id": ""}



$url = "https://api.growingio.com/v2/bbf5b5656387fd73/web/action?stm=1510467417078";
$data = "object_type=ARTICLE&object_id=28703&parent_id=0&comment=%3Cp%3Etest11111111helloworld1111111111111%3C%2Fp%3E";
$header = array(
  "Host:api.growingio.com",
    "Origin:http://www.maiziedu.com",
    "Referer:http://www.maiziedu.com/article/28703/",
    "User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36"
);

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POST,$data);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
$res = curl_exec($ch);
curl_exec($ch);
curl_close($ch);    