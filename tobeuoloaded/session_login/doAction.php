<?php
header("content-type:text/html;charset=utf-8");

if(empty($_POST['username'])|| empty($_POST['password'])){
    echo "请输入完整信息";
    echo "<meta http-equiv='refresh' content='1;url=session_login.php'>";
}

$username = $_POST['username'];
$username = htmlspecialchars(trim($username));
$password = $_POST['password'];


$link = mysqli_connect("localhost","root","") or die("数据库连接失败");
mysqli_set_charset($link,"utf8");
mysqli_select_db($link,"test");
$table = "test1";
$query = "SELECT id FROM {$table} WHERE name=? AND password=?";
$stmt = mysqli_prepare($link,$query);
mysqli_stmt_bind_param($stmt,'ss',$username,$password);
$exe = mysqli_stmt_execute($stmt);
$res = mysqli_stmt_store_result($stmt);
if($exe && mysqli_stmt_num_rows($stmt)==1){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    setcookie("username",$username,time()+3600);
    setcookie("password",$password,time()+3600);
    echo "登陆成功,跳转到主页面...";
    echo "<meta http-equiv='refresh' content='1;url=mainPage.php'>";
}else{
    echo "登录失败，重新登录";
    echo "<meta http-equiv='refresh' content='1;url=session_login.php'>";    
}