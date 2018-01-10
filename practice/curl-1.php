<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

/* $dsn = "mysql:host=localhost;dbname=test";
try {
    $db = new PDO($dsn,'root','root',array(PDO::ATTR_PERSISTENT=>true));
    $db->beginTransaction();
    $sql1 = "";
    $res = $db->exec($sql1);
    $sql2 = "INSERT table(name,age) VALUES(:name,:age)";
    $stmt = $db->prepare($sql2);
    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    $stmt->bindParam(':age', $age,PDO::PARAM_INT);
    $res = $stmt->execute();
    $db->commit();
} catch (Exception $e) {
    echo $e->getMessage();
    $db->rollBack();

} */

$str = <<<xml


xml;

/* $obj = simplexml_load_string($data);
$arr = $obj->document; */

/* $obj = new SimpleXMLElement($str); */


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://p0.ssl.qhimg.com/t0140b234478faf38e5.gif");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$res = curl_exec($ch);
//var_dump($res);
if(file_exists("test.gif")){
    echo "gg";
}else{
    $inputsize = file_put_contents("test.gif", $res);
}
//$size = filesize("https://p0.ssl.qhimg.com/t0140b234478faf38e5.gif");

$info = curl_getinfo($ch);
//var_dump($info);
$downloadSize = $info['size_download'];
if($inputsize == $downloadSize){
    echo "done";
}else{
    echo "not done";
}