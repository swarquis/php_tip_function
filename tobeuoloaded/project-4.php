<?php
header("content-type:text/html;charset=utf-8");

//使用curl步奏
//创建：curl_init()->设置请求的url:curl_setopt($ch, CULROPT_URL,$url)
//->设置结果为文件流输出还是直接输出CURLOPT_RETURNTRANSFER=1->执行：curl_exec($ch)->关闭curl:curl_close($ch);

$ch = curl_init();
//curl_setopt($ch,CURLOPT_URL,"www.maiziedu.com");
curl_setopt($ch,CURLOPT_URL,"https://zhidao.baidu.com/question/1766891652150507740.html");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);//输出内容是否带头文件0代表不带
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);//可越过https获得内容
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);//越过证书和hosts验证
$res = curl_exec($ch);
if($res !== false){
    $res = mb_convert_encoding($res, 'utf-8', 'GBK,UTF-8,ASCII'); //解决网页返回的乱码
    echo $res;
}
if($errno = curl_errno($ch)){
    echo curl_strerror($errno);
}

curl_close($ch);