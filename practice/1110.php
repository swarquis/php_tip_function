<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
function createFile($filename){
    if(is_file($filename)&&file_exists($filename)){
        return false;
    }
    if(touch($filename)){
        echo "done";
        return true;
    }else{
        echo "failed";
        return false;
    }
}

function delFile($filename){
    if(!file_exists($filename)){
        echo "file not there";
        return false;
    }
    if(unlink($filename)){
        echo "deleted.";
        return true;
    }
}
function copyFile($origin, $dest){
    if(!file_exists($origin)){
        echo "origin file not found";
        return false;
    }
    if(!file_exists(dirname($origin).'/'.$dest)){
        mkdir(dirname($origin).'/'.$dest,755,true);
    }
    if(copy($origin, dirname($origin).'/'.$dest.'/'.basename($origin))){
        return true;
    }
}

$path = "F:maizi/php_file/curl";
function traceDir($path){
    $handle = opendir($path);
    while(($entry = readdir($handle)) !== false){
        if($entry != '.' && $entry != '..'){
            if(is_file(dirname($path).'/'.$entry)){
                $arr['file'][] = dirname($path).'/'.$entry;
            }
            if(is_dir(dirname($path).'/'.$entry)){
                $arr['dir'][] = dirname($path).'/'.$entry;
                $funcname = __FUNCTION__;
                $funcname(dirname($path).'/'.$entry);
            }
        }
    }
    return $arr;
}
function traceDir2($path){
    $file = array();
    if(!is_dir($path)){
        return false;
    }
    $arr = scandir($path);
    foreach($arr as $val){
        if($val != '.' && $val != '..'){
            if(is_dir($val)){
                $file['dir'][] = $val;
            }
            if(is_file($val)){
                $file['file'][] = $val;
            }
        }
        
    }
    
    closedir();
    return $file;
}
//$arr = scandir($path);
var_dump(traceDir2($path));
//$fp = fopen("e2.php","rb+");
//while(!feof($fp)){
    //echo fgetc($fp).PHP_EOL;
    //echo fgets($fp).PHP_EOL;
//}
/* echo ftell($fp);
fseek($fp, 20);
echo ftell($fp);
rewind($fp); */

//echo fpassthru($fp);
//copyFile("e2.php","a");
//$filename = "test.txt";
//createFile($filename);
//delFile($filename);