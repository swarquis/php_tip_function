<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

//文件操作函数封装
//检查文件名$flag=1默认创建文件
function checkFilename($filename,$pattern,$flag=1){
    if(preg_match($pattern, $filename)){
        echo "文件名规范";
        if(is_file($filename)){
            echo "文件名已存在";
        }else{
            if($flag == 1){
                echo "创建文件";
                if(touch($filename)){
                    echo "文件创建成功";
                    return true;
                }
            }
        }
    }else{
        echo "文件名不规范";
        return false;
    }
}
//读文件
function readFile($filename){
    if(!is_file($filename)){
        echo "file not found";
        return false;
    }
    if(($handle = fopen($filename,"rb+")) !== false){
        while(!feof($filename)){
            echo fread($handle,filesize($filename));
            //echo fgets($handle).PHP_EOL;
        }
        fclose($handle);
        return true;
    }else{
        echo "cannot open file";
        return false;
    }
    //file_get_contents($filename);
}

//写入文件
function writeFile($filename,$str){
    if(!is_file($filename)){
        echo "文件不存在，正在创建...";
        if(touch($filename)){
            echo "文件创建完成";           
        }else{
            echo "文件创建失败";
            return false;
        }     
    }
    if(($handle = fopen($filename,"wb+")) !== false){
        fwrite($handle,$str,strlen($str));
        //fputs($filename,$str);
        return true;
    }else{
        echo "写入失败";
        return false;
    }
}

//拷贝文件flag=1表示删除源文件
function copyFile($src,$dest,$flag=0){
    if(!is_file($src)){
        echo "源文件不存在";
        return false;
    }
    if(is_file(dirname($dest).'/'.basename($src))){
        echo "目标目录下有同名文件，拷贝将会覆盖原内容"; 
    }
    if(!is_dir($dest)){
        echo "目标目录不存在，即将创建...";
        if(mkdir($dest,755,true)){
            echo "目录创建完成，可以拷贝";
        }
    }
    if(copy($src,$dest)){
        echo "拷贝成功";
        if($flag == 1){
            if(unlink($src)){
                echo "删除源文件成功";
            }
        }
        return true;
    }
    
}

//删除文件
function delFile($filename){
    if(!file_exists($filename)){
        echo "源文件不存在无法删除";
        return false;
    }
    if(filesize($filename) > 0){
        echo "源文件包含有内容";
    }
    if(unlink($filename)){
        echo "删除成功";
        return true;
    }
}

//重命名文件
function renameFile($oldname,$newname){
    if(!file_exists(basename($oldname))){
        echo "源文件不存在";
        return false;
    }
    if(rename($oldname,$newname)){
        echo "重命名成功";
        return true;
    }
}

//剪切文件
function cutFile($origin,$dest){
    if(!file_exists($origin)){
        echo "源文件不存在";
        return false;
    }
    if(!file_exists($dest)){
        echo "要剪切的文件不存在";
        return false;
    }
    if(rename($origin,$dest)){
        echo "剪切成功，文件被覆盖";
        return true;
    }
}


//目录操作函数封装
function createDir($dirname){
    if(file_exists($dirname) && is_dir($dirname)){
        echo "目录已存在";
        return false;
    }
    if(mkdir($dirname,755,true)){
        echo "目录创建成功";
        return true;
    }
}

//查看目录结构
function readDir($dirname){
    if(file_exists($dirname) && is_dir($dirname)){
        if(($handle = opendir($dirname)) !== false){
            while($entry = readdir($handle)){
                if($entry != '.' && $entry != '..'){
                    echo $entry;
                }
            }
        }
        closedir($handle);
        return true;
    }else{
        echo "没找到指定目录";
        return false;
    }
}

function delDir($dirname){
    if(!file_exists($dirname)){
        echo "没找到制定目录";
        return false;
    }
    if(unlink($dirname)){
        echo "删除目录成功";
        return true;
    }else{
        echo "删除失败";
        return false;
    }
}