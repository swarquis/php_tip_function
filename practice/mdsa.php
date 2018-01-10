<?php
header("content-type:text/html;charset=utf-8");

$link = mysqli_connect("localhost",'','') or die(mysqli_connect_error());
mysqli_set_charset($link,"utf-8");
mysqli_select_db($link,'');

$sql = "INSERT INTO TABLE VALUES(?,?,?)";
$stmt = mysqli_prepare($link,$sql);
mysqli_stmt_bind_param($stmt,'sss',$vars);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

mysqli_stmt_num_rows($stmt);
mysqli_stmt_affected_rows($stmt);
mysqli_stmt_fetch($stmt);