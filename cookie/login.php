<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
<form action="doAction.php" method="post">
	<table>
			<tr>
				<td>username</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>password</td>
				<td><input type="password" name="password" id="" /></td>
			</tr>
			<tr><td><input type="checkbox" name="autoLogin" value=1 id="" />rmb for 1 week</td>
			<td><input type="submit" value="login" /></td>
			</tr>
	</table>

</form>
	
</body>
</html>