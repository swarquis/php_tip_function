<?php
$filename = "test.txt";
/* if(!file_exists($filename)){
    touch($filename);
}
$handle = fopen($filename,"rb+");
$content = fread($handle,1);
if(filesize($filename) == 0){
    return "empty file";
}
fclose($handle); */
$handle = fopen($filename,"ab+");
$content = "this is a test";
//fwrite($handle,$content);//写完指针指向末尾
/* //rewind($handle);
while(!feof($handle)){
    echo fgetc($handle);
} */
fputs($handle,$content);
$content1 = "another test";
fputs($handle, $content1);//overwrite for wb+ mode, append for ab+mode
fclose($handle);

$filename = "test2.txt";
$handle = fopen($filename, "rb+");
//fwrite($handle,"test2.txt");
/* if(fread($handle,filesize($filename))){
    
}else{
    echo "failure on read.";
} */
fread($handle,filesize($filename));

