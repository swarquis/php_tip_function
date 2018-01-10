<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

//实例化一个memcache 类
$memcache = new Memcache();
//打开memcached服务器的连接
$memcache->connect("localhost",11211); 
//获取memcache的一些信息
//echo "memcache's version: ".$memcache->getversion();
$memcache->add("key1","value1",false,30);
$data = array(
    "url" => "http://sina.com",
    "name" => "test memcache"
);
//在服务器上存数据

$memcache->set("info",$data,0,10);
//去除服务器上的数据
$info = $memcache->get("info");
$item = $memcache->get("key1");

var_dump($info);
echo "<br/>";
echo $item;
echo "<br/>";

//替换数据
$memcache->replace("key1","replaced value",false,60);
$replaced_value = $memcache->get("key1");
echo "replaced value for key1: ".$replaced_value."<br/>";

//删除数据
$memcache->delete("key1");
$res = $memcache->get("key1");
var_dump($res);//false

//清除数据
$memcache->flush();
var_dump($memcache->get("info"));//false
//关闭服务器
$memcache->close();