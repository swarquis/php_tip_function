<?php
header("content-type:text/html;charset=utf-8");
$link = mysqli_connect("localhost","root","") or die("数据库连接失败");
mysqli_set_charset($link,"utf8");
mysqli_select_db($link,"test");
$table = "test1";
//$password = substr(str_shuffle(join('',array_merge(range(0,9),range('a','z'),range('A','Z')))),0,5);

for($i=1;$i<=18;$i++){
    $password = substr(str_shuffle(join('',array_merge(range(0,9),range('a','z'),range('A','Z')))),0,5);
    
    $sql = "UPDATE {$table} SET password='{$password}' WHERE id={$i}";
    $res = mysqli_query($link,$sql);
}

mysqli_close($link);

$raw = array_merge(range('a','z'),range('A','Z'),range(0,9));
$raw = join('',$raw);
$code .= substr($raw,mt_rand(0,strlen($raw)-1),1);