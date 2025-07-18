<?php
session_start();
include 'connect.php';
$username=$_POST['username'];
$pass=$_POST['password'];
$sql="select * from users where username=? ";
$stat=$connect->prepare($sql);
$stat->bind_param("s",$username);
$stat->execute();
$result=$stat->get_result();
$user=$result->fetch_assoc();
if($user && $user['password']==$pass){
    $_SESSION['user']=[
        'ID' =>$user['ID'] ,
        'username'=>$user['username']
    ];
    header("location:intro.php");
}else{
    header("location:login.php?error=user not found");
}