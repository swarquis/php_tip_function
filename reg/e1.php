<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");
$subject = "this is 1st test message!";
$pattern = "#\d#";
$pattern = "#[1-9]#";
$pattern = "#[a-zA-Z]#";
$pattern = "#\D#";
$pattern = "#\W#";
$pattern = "#[a]#";
$pattern = "#mes+age#";//{1,}
$pattern = "#mes*age#";
$pattern = "#messi*age#";//{0,}
$pattern = "#mess?age#";//{0,1}
$pattern = "#^T#i";
$pattern = "#is\b#";
$pattern = "#us|test#";
$pattern = "#th is#x";
if(preg_match($pattern,$subject,$match)){
    var_dump($match);
}