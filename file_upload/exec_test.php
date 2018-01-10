<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=gbk");
chdir("F:/maizi/php_file");
//exec('dir', $result);
/* foreach($result as $line){
    echo $line.PHP_EOL;
} */

//passthru('dir');
//system('dir');
/* $res = `dir`;
var_dump($res);
escapeshellcmd($command); */
var_dump(getenv());