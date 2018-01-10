<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

$dsn = "mysql:host=localhost;dbname=test";
//PDO抽象数据库的操作要在try catch里面执行 
//PDO预处理步奏：prepare->bindParam->execute->fetch->null
try {
    $db = new PDO($dsn,"root","");
    //$db = new PDO($dsn,"root","root",array(PDO::ATTR_PERSISTENT=>true);//长连接
    $name = substr(str_shuffle(join('',range('a','z'))),mt_rand(0,strlen(join('',range('a','z')))-1),mt_rand(3,5));
    $age = mt_rand(10,90);
    $query = "INSERT INTO test1(name,age) VALUES(:name,:age)";
    
    $stmt = $db->prepare($query);//相当于mysqli_prepare($query)
    
    $stmt->bindParam(":name",$name,PDO::PARAM_STR);//相当于mysqli_stmt_bind_param($query,"s",$name);
    $stmt->bindParam(":age",$age,PDO::PARAM_INT);
    
    $res = $stmt->execute();
    if($res){
        echo "Number of affected rows: ".$stmt->rowCount();
    }else{
        echo "failed to insert a data";
    }
    
    
    $query2 = "SELECT name FROM test1 WHERE age=:age";
    $stmt2 = $db->prepare($query2);
    $age = 39;
    //$stmt2->bindParam(":name",$name,PDO::PARAM_STR);
    $stmt2->bindParam(":age",$age,PDO::PARAM_INT);
    $res2=$stmt2->execute();
    //var_dump($res2);die;
    while($res3 = $stmt2->fetch(PDO::FETCH_ASSOC)){//以键值对方式遍历数据
        echo $res3['name'];
    }
    $db = null;//关闭连接
    
} catch (Exception $e) {
    echo $e->getMessage();
}
