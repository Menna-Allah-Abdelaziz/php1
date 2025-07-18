<?php
session_start();
include 'connect.php';

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $user_id = $_SESSION['user']['ID'];
    $stmt = $connect->prepare("UPDATE tasks SET completed = NOT completed WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);
    $stmt->execute();
}
header("Location: intro.php");
exit;
