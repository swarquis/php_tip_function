<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
/* 
$path = "C:/A/B/c.txt";
$file1 = basename($path);
$file2 = basename($path,'txt');
echo $file1.'--'.$file2; */

/* $handle = opendir($path);
while(($entry = readdir($handle))!==false){
    if($entry != '.' && $entry != '..'){
        
    }
}
closedir($handle); */

$path = "F:/maizi/php_file";
//echo disk_free_space($path);
var_dump(stat($path));
$handle = opendir($path);
$file1 = scandir($path);
foreach($file1 as $file){
    if($file != '.' && $file != '..'){
        if(is_dir($file)){
            $arr['dir'][] = $file;
        }
        if(is_file($file)){
            $arr['file'][] = $file;
        } 
      //var_dump ($arr['dir']);
    }
    
}

