<?php 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_COOKIE,1);
 ?>