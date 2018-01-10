<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

copyDir("../practice","./a/");
function copyDir($path,$dest){
    if(!is_dir($path)){
        echo "not a dir";
        return false;
    }
    if(!is_dir($dest)){
        echo "dest not there";
        mkdir($path.'/'.$dest,755,true);
    }
    $handle = opendir($path);
    while(($entry = readdir($handle)) !== false){
        if($entry != '.' && $entry != '..'){
            if(is_file($path.'/'.$entry)){
                copy($path.'/'.$entry, $path.'/'.$dest);
            }
            if(is_dir($path.'/'.$entry)){
                $func = __FUNCTION__;
                $func($path.'/'.$entry,$path.'/'.$dest);
            }
        }
    }
}