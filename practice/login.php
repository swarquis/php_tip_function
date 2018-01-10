<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$username = $_POST['username'];
$password = $_POST['password'];
$age = $_POST['age'];
$email = $_POST['email'];

/*$pattern = "#^[a-zA-Z]_*[\w+]{5,10}$#";
 if(!preg_match($pattern,$username)){
    echo "invalid username";
} */
$pattern = "#(?:[\w*\W*]){5,10}#";
if(!preg_match($pattern,$password)){
    echo "invalid password";
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
<form action="login.php" method="post">
	<table>
		<tr>
			<td>用户名</td>
			<td><input type="text" name="username"/></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="password" id="" /></td>
		</tr>
		<tr>
			<td>年龄</td>
			<td><input type="number" name="age" id="" /></td>
		</tr>
		<tr>
			<td>邮箱</td>
			<td><input type="email" name="email" id="" /></td>
		</tr>
		<tr>
			<td colspan='2'><input type="submit" value="提交" /></td>
		</tr>
	</table>

</form>
	
</body>
</html>