

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
	hello <?php echo $_COOKIE["username"]?>
	<a href="login.php">login</a>
	<a href="logout.php">logout</a>
</body>
</html>