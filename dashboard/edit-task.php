<?php
session_start();
include 'connect.php';

$user_id = $_SESSION['user']['ID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task_id'], $_POST['task'])) {
    $task_id = $_POST['task_id'];
    $task = $_POST['task'];

    $stmt = $connect->prepare("UPDATE tasks SET task = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sii", $task, $task_id, $user_id);
    $stmt->execute();

    header("Location:intro.php");
    exit;
}
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $stmt = $connect->prepare("SELECT task FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $task_data = $result->fetch_assoc();
}
?>

<form action="edit-task.php" method="post">
  <input type="hidden" name="task_id" value="<?= $task_id ?>">
  <input type="text" name="task" value="<?= htmlspecialchars($task_data['task']) ?>" required>
  <button type="submit">Save</button>
</form>
