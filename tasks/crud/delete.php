<?php
include'connect.php';
$id=$_POST['ID'];
$sql="delete from custmers where ID=$id ";
if ($connect->query($sql) === true) {
    header("Location: delete.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
$connect->close();
?>