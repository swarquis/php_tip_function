<?php
header("content-type:text/html;charset=utf-8");
session_start();
//查看是否由会话
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];   
    echo "欢迎您".$username;
    echo "<a href='logout.php'>注销</a>";
}

if(empty($_SESSION['username'])){
    //查看是否有cookie，用cookie给会话赋值
    
    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
        
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['password'] = $_COOKIE['password'];
    }else{
        echo "请先登录";
        echo "<meta http-equiv='refresh' content='1;url=session_login.php'>";
    }
    
}