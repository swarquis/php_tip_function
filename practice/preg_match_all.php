<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

$subject = "this is a test in 1st file";
$pattern = "#\d#";
$subject = "baidu http://baidu.com
sina http://sina.com    
";
$pattern = "#http://\w+.[com|cn]*#";
//preg_match_all($pattern,$subject,$arr);

$subject = "this is a test";
$pattern = "#test#";
$replacement = "A";
//preg_match($pattern,$subject,$match);
//var_dump($match);
/* $subject = preg_replace($pattern,$replacement,$subject);
var_dump($subject); */

/* $subject = "capitalize all the words in this sentence";
$pattern = "#\b\w+\b#";
 preg_match_all($pattern,$subject,$arr);
foreach($arr[0] as $v){
    $v = ucfirst($v);
    //echo $v;
    $arr1[] = $v;
}
//var_dump($arr1);
echo join(' ',$arr1); */

/* $subject = "please enter your username and password here";
$pattern = ["#username#","#password#"];
$replacement = ["userA","XXX"];

$subject = "a 
b
c ";
$pattern = "#\s\s+#";
$replacement = "";
$subject  = preg_replace($pattern,",",$subject);
echo $subject; */

/* $subject = "capitalize each word in this sentence";
$pattern = "#\b\w+\b#";
$cap = function($match){
    return ucfirst($match[0]);
};
$subject = preg_replace_callback($pattern, $cap, $subject);
echo $subject; */

$filename = "http://photo.sina.com.cn/";
$content = file_get_contents($filename);
//var_dump($content);
$pattern = '#<img src="(.*)" alt="(.*)" usemap="(.*)">#';
//preg_match_all($pattern,$content,$res);
//$replacement = "<img src = http://n.sinaimg.cn/news/transform/>";
//preg_replace($pattern,$replacement,$filename);
preg_match_all($pattern,$content,$matches);
var_dump($matches);

