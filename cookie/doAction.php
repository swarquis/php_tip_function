<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);
$autoLogin = $_POST['autoLogin'];

$link = mysqli_connect("localhost","root","root","test1");
mysqli_set_charset($link,"utf-8");
$query = "SELECT username FROM login WHERE username = '{$username}' AND password = '{$password}'";
$res = mysqli_query($link, $query);
$expTime = time()+7*24*3600;

    if($res && mysqli_num_rows($res) > 0){
        if($autoLogin == 1){
            setcookie('username',$username,$expTime);
            setcookie('autoLogin',$autoLogin,$expTime);
        }
        else{
            setcookie('username',$username,0);
            setcookie('autoLogin',$autoLogin,0);
        }
        
    }else{
        header("index.php");
    }

    echo "welcome".$username;
    echo "<a href='index.php'>main page</a>";

