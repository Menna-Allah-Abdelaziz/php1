<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['task'])) {
    $user_id = $_SESSION['user']['ID'];
    $task = $_POST['task'];

    $stmt = $connect->prepare("INSERT INTO tasks (user_id, task) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $task);
    $stmt->execute();
}

header("Location: intro.php");
exit;
