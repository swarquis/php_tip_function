

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>用户名注册验证</title>
</head>
<body>
	<form action="login_verify_reg.php" method="post">
		<table border='1' width="80%" cellspacing='0' cellpadding='0' bgcolor='orange'>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" />以字母，下划线开头，中间可以有数字，长度在6到12位之间</td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="password" />包含数字和大小写字母，6到12位之间</td>
			</tr>
			<tr>
				<td>电话号码</td>
				<td><input type="text" name="tele" />输入格式正确的电话号码</td>
			</tr>
			<tr>
				<td colspan='2'><input type="submit" value="注册" /></td>
			</tr>
		</table>
	</form>
</body>
</html>