<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
header("content-type:text/html;charset=utf-8");

ini_set("session.save_handler","user");
function open(){
    echo "<h1>call open</h1>";
    $link = mysqli_connect("localhost","root","root");
    mysqli_set_charset($link,"utf8");
    mysqli_select_db($link,"test1");
    return true;
}
function close(){
    echo "<h1>call close</h1>";
    return true;
}
function read($session_id,$link){
    echo "<h1>call read</h1>";
    $query = "SELECT session_data FROM sessions WHERE session_id = {$session_id}";
    $res = mysqli_query($link,$query);
    if($res && mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);
        return $row['session_data'];
    }
    return false;
}
function write($session_id,$session_data,$link){
    echo "<h1>call write</h1>";
    $lifetime = get_cfg_var("session.gc_maxlifetime");
    $session_update_time = time()+$lifetime;
    $query = "INSERT sessions VALUES('{$session_id}', '{$session_data}','{$session_update_time}')";
    $res = mysqli_query($link,$query);
    if(!$res){
        $query = "UPDATE sessions SET session_data = '{$session_data}' AND session_update_time = '{$session_update_time}' WHERE session_id='{$session_id}' AND session_update_time > ".time();
        mysqli_query($link,$query);
    }
}
function destroy($session_id,$link){
    echo "<h1>call destroy</h1>";
    $query = "DELETE FROM sessions WHERE session_id = '{$session_id}'";
    return mysqli_query($link, $query);
}
function gc(){
    echo "<h1>gc</h1>";
    
}
session_set_save_handler('open','close','read','write','destroy','gc');