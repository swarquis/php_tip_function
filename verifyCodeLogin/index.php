
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>验证码</title>
    <script type="text/javascript">
            function changePic(){
                var verify_code = document.getElementById("verify_code");
                verify_code.src = "http://localhost/php_gd2/test_verify_code.php";
        }
    </script>
</head>
<body>
<form action="doAction.php" method="post">
    <table  cellspacing="0" cellpadding="0" width="30%">
        <tr>
            <td>验证码</td>
            <td ><input type="text" name="verify_code" /></td>
            <img src="test_verify_code.php" id="verify_code"/>
            <a href="javascript:void(0)" onclick="changePic()">换一张</a>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="检测"></td>
        </tr>
    </table>
</form>
</body>
</html>
