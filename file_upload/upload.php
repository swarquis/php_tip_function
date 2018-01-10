<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
//var_dump($_FILES);
session_start();
$img = $_FILES['the_file']['tmp_name'];
$filename = "F:maizi/php_file/file_upload/".$_FILES['the_file']['name'];
/* file_put_contents($filename,$img);
if($_FILES['the_file']['error'] > 0){
    echo "problem";
    
}

if($_FILES['the_file']['type'] != "image/png"){
    
}
if(is_uploaded_file($_FILES['the_file']['tmp_name'])){
    if(!move_uploaded_file(($_FILES['the_file']['tmp_name']),$filename)){
        echo "problem";
        exit;
    }
} */

if($_FILES['the_file']['error']>0){
    
}
if($_FILES['the_file']['type'] != "image/png"){
    
}
if(is_uploaded_file($_FILES['the_file']['tmp_name'])){
    if(move_uploaded_file($_FILES['the_file']['tmp_name'],$filename)){
        var_dump($_SESSION);
    }
}