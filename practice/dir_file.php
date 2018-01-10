<?php
$filename = "test.txt";
/* foreach(pathinfo($filename) as $k=>$v){
    echo $k.':'.$v;
} */

$filename = "tobecreate.txt";
//echo "is_dir: ".var_dump(is_dir($filename))."<br/>";
//echo "file_exists: ".var_dump(file_exists($filename));
//mkdir("a",755,true);
//rmdir("a");

/* $str = "a b c d e";
list($a,$b,$c,$d,$e) =  sscanf($str, "%s%s%s%s%s");
echo $a.$b.$c.$d.$e; */

/* list($serial) = sscanf("SN/2350001", "SN/%d");
$mandate = "january 01 2000";
list($month,$day,$year) = sscanf($mandate, "%s %d %d");
echo $serial.'---'.$month; */

/* if(!file_exists($filename)){
    touch($filename);
} */
/* file_put_contents($filename,"this is a test");
echo file_get_contents($filename); */
/* $handle = fopen($filename,"rb+");
$str = "a,b,c,d,e";
$str = explode(',',$str);
fputcsv($handle,$str);
$arr = fgetcsv($handle);
$counter = ftell($handle);
rewind($handle);
$counter = ftell($handle);
fseek($handle,12);
$counter = ftell($handle);
echo $counter; */
/* 
if(rmdir("a")){
    echo "foloder a deleted";
}else{
    echo "failed";
} */
$handle = opendir('.');
$entry = readdir($handle);
while($entry !== false){
    if($entry != "." && $entry != ".."){
        echo $entry."<br/>";
    }
}
