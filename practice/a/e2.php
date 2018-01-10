<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
/* 
$subject = "2015-01-21";
$pattern = "#(\d{4})-(\d{2})-(\d{2})#"; */
/* preg_match_all($pattern, $subject,$res);
$replacement = '\1年\2月\3日';//反向引用必须单引号
$str = preg_replace($pattern,$replacement,$subject); */
/* $pattern = "#(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})#";
preg_match_all($pattern, $subject,$str);
var_dump($str); */

$str="";
for($i=1;$i<=1000;$i++){
    $str.="abababcdefg";
}
$start=microtime(true);
for($i=1;$i<=1000;$i++){
    preg_match('#^(a|b|c|d|e|f|g)+$#', $str);
}
$end=microtime(true);
echo $end-$start,'<hr/>';
$start=microtime(true);
for($i=1;$i<=1000;$i++){
    preg_match('#^[abcdefg]+$#', $str);
}
$end=microtime(true);
echo $end-$start,'<hr/>';

$start=microtime(true);
for($i=1;$i<=1000;$i++){
    preg_match('#^[a-g]+$#', $str);
}
$end=microtime(true);
echo $end-$start,'<hr/>';

