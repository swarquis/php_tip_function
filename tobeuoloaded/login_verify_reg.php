<?php

error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$username = isset($_POST['username'])?$_POST['username']:'';
$username = htmlspecialchars(trim($username));
$password = isset($_POST['password'])?$_POST['password']:'';
$password = htmlspecialchars(trim($password));
$telenum = isset($_POST['tele'])?$_POST['tele']:'';

$patternUsername = "#^[_a-z][\w]{5,11}$#";
if(!preg_match($patternUsername,$username)){
    echo "用户名不规范";
    return false;
}
$patternPassword = "#^[0-9a-zA-Z]{6,12}$#";
if(!preg_match($patternPassword,$password)){
    echo "密码不规范";
    return false;
}
 $patternTele = "#^1[34578]\d{9}#";//手机号码1开头第二个数有34578,11位
if(!preg_match($patternTele,$telenum)){
    echo "电话号码不规范";
    return false;
} 
echo "注册成功";
?>