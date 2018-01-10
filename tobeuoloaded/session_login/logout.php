<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION['username'])){
    echo "请先登录";
    echo "<meta http-equiv='refresh' content='1;url=session_login.php'>";   
}
if(isset($_SESSION['username'])){
    setcookie("username",'',time()-1);
    setcookie("password",'',time()-1);
    if(isset($_COOKIE)){
        setcookie(session_name(),'',time()-1);
    }
    
    $_SESSION = array();
    session_destroy();
    echo "注销成功";
    echo "<meta http-equiv='refresh' content='1;url=session_login.php'>";
    
}