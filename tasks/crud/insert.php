<?php
include'connect.php';
$name = $_POST['name'];
$age = $_POST['age'];
$sql= "insert into custmers(name,age)values('$name','$age')";
if ($connect->query($sql) === true) {
    header("Location: insert.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
$connect->close();
?>