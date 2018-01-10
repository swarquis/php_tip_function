<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");


$link = mysqli_connect('localhost','root','root','test1') or die("connection failed");
mysqli_set_charset($link,"utf8");
//生成测试数据
/* for($i=0; $i<100;$i++){
    $str = join('',array_merge(range(a,z),range(A,Z)));
    $ranstr = substr(str_shuffle($str),0,10);
    $keystr = mt_rand(0,10000).substr(str_shuffle($str),0,10);
    $valstr = md5($keystr);
    $sql = "INSERT INTO test VALUES('{$keystr}','{$valstr}')";
    mysqli_query($link,$sql);
} */

$sql = "SELECT * FROM test";
//连接memcached服务器并储存数据
$res = mysqli_query($link, $sql);
while($row = mysqli_fetch_assoc($res)){
    $rows[] = $row;
}
//var_dump($rows[0]["val"]);die;
$mem = new Memcache();
$mem->connect("localhost",11211) or die("can't connect to memcached server");
//插入数据
for($i=0;$i<100;$i++){
  $val = $rows[$i]["val"];
    $mem->set("key".$i,"{$val}",false,600);
}

//读数据
 for($i=0;$i<100;$i++){
  $res = $mem->get("key".$i);
   echo $res; 
} 
//清除数据
$mem->flush();
$mem->close();
mysqli_close($link);