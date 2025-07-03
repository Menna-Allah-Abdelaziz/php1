<?php
include'connect.php';
$id=$_POST['ID'];
$sql="";
if (isset($_POST['age'])){
    $age=$_POST['age'];
    $sql="update custmers  set age=$age where ID=$id";
}
if (isset($_POST['name'])){
    $name=$_POST['name'];
    $sql="update custmers  set name='$name'  where ID=$id";
}
if ($connect->query($sql) === true) {
    header("Location: update.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
$connect->close();
?>