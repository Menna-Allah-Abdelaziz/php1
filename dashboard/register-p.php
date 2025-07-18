<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$Rpassword=$_POST['Rpassword'];
}
  $check = $connect->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();
if (empty($name) || empty($username) || empty($password) || empty($Rpassword)) {
    header("location:register.php?empty");
    exit;
}
    if (strlen($password) < 8) {
    header("Location: register.php?shortPass");
    exit;
}
if (
    !preg_match('/[A-Z]/', $password) ||
    !preg_match('/[a-z]/', $password) ||
    !preg_match('/[0-9]/', $password) ||
    !preg_match('/[\W]/', $password) 
) {
    header("Location: register.php?weakPass");
    exit;
}
if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/', $username)) {
    header("Location: register.php?invalidUsername");
    exit;
}
if ($password !== $Rpassword) {
    header("location:register.php?Rpass");
    exit;
} 
if ($check->num_rows > 0) {
    header("location:register.php?usernameR");
    exit;
}
$hpass=password_hash($password,PASSWORD_DEFAULT);
$stmt=$connect->prepare("insert into users(name,username,password)values(?,?,?)");
$stmt->bind_param("sss",$name,$username,$hpass);
if ($stmt->execute()) {
    header("Location: login.php?registered");
    exit;
} else {
    header("Location: register.php?error");
    exit;
}