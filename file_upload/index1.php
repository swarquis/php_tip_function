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
<h1>upload a file</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
<!-- post method is used for upload, not get -->
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
	<label for="the_file">Upload a file:</label>
	<input type="file" name="the_file" id="the_file" />
	<input type="submit" value="Upload File" />
</form>
	
</body>
</html>