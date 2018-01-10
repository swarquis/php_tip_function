<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$host = "ftp server site";
$user = "anonymous";
$password = "abc@example.com";

$con = ftp_connect($host);
if(!$con){
    echo "connection failed.";
}
$login = @ftp_login($con,$user,$password);
if(!$login){
    echo "login failed.";
        ftp_quit($con);
}

ftp_pasv($con,true);

if(file_exists($locafile)){
    $locatime = filemtime($localfile);
}
$remotetime = ftp_mdtm($con,$remotefile);
if(!($remotetime>$localtime)){
    
}
$fp = fopen($localfile,"wb+");
ftp_fget($con,$fp,$remotefile,FTP_BINARY);
fclose($fp);
ftp_quit($con);