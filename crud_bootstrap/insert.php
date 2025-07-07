<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $age = $_POST['age'];

  $connect->query("INSERT INTO custmers (name, age) VALUES ('$name', $age)");

  header("Location: view.php");
  exit();
}
?>