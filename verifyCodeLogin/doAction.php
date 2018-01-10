<?php

session_start();
/*echo $_SESSION['verifyCode'];
echo $_POST['verify_code'];*/
if( $_SESSION['verifyCode']){
    $verifycode = strtolower($_SESSION['verifyCode']);
    $verifycode2 = trim(strtolower($_POST['verify_code']));
    if( $verifycode ==  $verifycode2){
        echo "验证码正确";

    }
    else{
        echo "验证码错误";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
}else{
    echo "请输入验证码";
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
}