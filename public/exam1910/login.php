<?php

ini_set("display_errors","On");
error_reporting(E_ALL);
$config=[
    'host'      =>  '192.168.70.110',
    'port'      =>  '3306',
    'dbname'    =>  'exam1910',
    'user'      =>  'root',
    'pass'      =>  '123456abc'
];

$pdo= new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",$config['user'],$config['pass']);
$user_name=$_POST['user_name'];
$user_pwd=$_POST['user_pwd'];
//echo $user_pwd,$user_name;
$sql="select * from users where user_name='{$user_name}' and user_pwd='{$user_pwd}'";
$stmt=$pdo->prepare($sql);
$stmt->bindParam('user_name',$user_name);
$stmt->bindParam('user_pwd',$user_pwd);
$stmt->execute();
$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
if($res){
    echo '登陆成功';
}else{
    echo '账号密码错误';
}
