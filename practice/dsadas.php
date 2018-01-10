<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$path = "../practice";
//readDirec1($path);

function readDirec($path){
    if(!is_dir($path)){
        return "not a directory";
    }
    $handle = opendir($path);
    while(($entry = readdir($handle))!== false){
        if($entry != "." && $entry != ".."){
            if(is_file($entry)){
                echo "文件".$entry;
            }
            if(is_dir($entry)){
                echo "目录".$entry;
                readDirec($entry);
            } 
        }
    }
}

function readDirec1($path){
    if(!is_dir($path)){
        return "not a directory";
    }
    $handle = opendir($path);
    $arr = array();
    while(($entry = readdir($handle))!== false){
        if($entry != '.' && $entry != '..'){
            if(is_file($path.'/'.$entry)){
                $arr['file'][] = $entry;
            }
            if(is_dir($path.'/'.$entry)){
                $arr['dir'][] = $entry;
                $func = __FUNCTION__;
                $func($entry);
            }
        }
    }
    closedir($handle);
    var_dump($arr);
}

echo isEmptyDIr("a");
function isEmptyDIr($path){
    if(!is_dir($path)){
        return "not a directory";
    }
    $handle = opendir($path);
    while(($entry = readdir($handle))!==false){
        if($entry != '.' && $entry != '..'){
            return "不是空目录";
        }
    }
    return "空目录";
}


//var_dump(checkFileName("?dsawq"));
function checkFileName($filename){
    $pattern = "#[\/\*<>\|\?]#";
    if(preg_match($pattern,$filename)){
        return false;
    }
}

function checkDirname($dirname){
    if(!is_dir($dirname)){
        return false;
    }
    $pattern = "#[\/\|<>\?\*]#";
    if(preg_match($pattern,$dirname)){
        return false;
    }
    return true;
}

//createDir("c");
function createDir($dirname){
    if(is_dir($dirname)){
        echo "dirname exists already";
        //return false;
    }
    if(mkdir($dirname,755,true)){
        echo "dirname created";
        //return true;
    }
}

//copyDir("a","c");
function copyDir($dirname,$dest){
    if(!is_dir($dirname)){
        echo "dirname does not exist";
        return false;
    }
if(!is_dir($dest)){
    mkdir($dest,755,true);
}
    
    $handle = opendir($dirname);
    while(($entry = readdir($handle))!==false){
        if($entry != '.' && $entry != '..'){
            if(is_file($entry)){
                
                copy($dirname.'/'.$entry, $dest.'/'.$entry);
            }
            if(is_dir($entry)){
                $func = __FUNCTION__;
                $func($dirname.'/'.$entry,$dest.'/'.$entry);
            }
        }
       // closedir($handle);
    }
}
delDIr("a");
function delDir($dirName){
    $handle = opendir($dirName);
    while(($entry = readdir($handle)) !== false){
        if($entry != '.' && $entry != '..'){
            if(is_file($dirName.'/'.$entry)){
                unlink($dirName.'/'.$entry);
            }
            if(is_dir($dirName.'/'.$entry)){
                $func = __FUNCTION__;
                $func($dirName.'/'.$entry);
            }
        }
    }
}