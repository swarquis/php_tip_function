<?php
header("content-type:text/html;charset=utf-8");

$length = 4;
$type = 4;
$strNum = join('',range(0,9));
$strLetter = join('',array_merge(range('a','z'),range('A','Z')));
$strMix = join('',array_merge(range('a','z'),range('A','Z'),range(0,9)));
$strWords = "山景区位于潜伏期哦我配额区区阿婆怎么能从事计算机委屈却忽然眼前卡啊面对的是";
$res = '';
switch($type){
    case 1:
        for($i=0;$i<$length;$i++){
            $str = substr($strNum,mt_rand(0,strlen($strNum)-1),1);
            $res .= $str;
        }
        break;
    case 2:
        for($i=0;$i<$length;$i++){
            $str = substr($strLetter,mt_rand(0,strlen($strLetter)-1),1);
            $res .= $str;
        }
        break;
    case 3:
        for($i=0;$i<$length;$i++){
            $str = substr($strMix,mt_rand(0,strlen($strMix)-1),1);
            $res .= $str;
        }
        break;
    case 4:
        for($i=0;$i<$length;$i++){
            $str = mb_substr($strWords,mt_rand(0,mb_strlen($strWords,"utf-8")-1),1,"utf-8");
            $res .= $str;
        }
        break;
        
}


echo $res;

