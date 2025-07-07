<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];

  $connect->query("UPDATE custmers SET name='$name', age='$age' WHERE ID=$id");

  header("Location: view.php");
}
?>