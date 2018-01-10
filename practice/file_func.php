<?php
function checkFileName($filename){
    $pattern = "/[\\\/\?<>\*]/";
    if(preg_match($pattern,$filename)){
        return false;
    }
    return true;
}

function createFile($filename){
    if(!checkFileName($filename)){
        return "文件名不规范";
    }
    if(file_exists($filename)){
        return "文件已存在";
    }
    if(!touch($filename)){
        return "创建失败";
    }
    return "创建成功";
}

function delFile($filename){
    if(!file_exists($filename)){
        return "文件不存在";
    }
    if(filesize($filename) != 0){
        return "文件不为空";
    }
    if(!unlink($filename)){
        return "删除失败";
    }
    return "删除成功";
}

function renameFile($oldName,$newName){
    if(file_exists($newName)){
        return "文件名被占用";
    }
    if(!file_exists($oldName)){
        return "源文件不存在";
    }
    if(!rename($oldName,$newName)){
        return "重命名失败";
    }
    return "重命名成功";
}

function cutFile($originFile,$dest){
    if(!file_exists($dest)){
        mkdir(dirname($originFile).'/'.$dest,755,true);
    }
    if(!rename($originFile,dirname($originFIle).'/'.$dest)){
        return "剪切失败";
    }
    return "剪切成功";
}

function copyFile($originFile,$dest){
    if(!file_exists($dest)){
        mkdir(dirname($originFile).'/'.$dest,755,true);
    }
    if(!file_exists($originFile)){
        return false;
    }
    if(file_exists($dirname($originFile).'/'.$dest.'/'.basename($originFile))){
        return false;
    }
    if(!copyFile($originFile, $dest)){
        return false;
    }
    return true;
}