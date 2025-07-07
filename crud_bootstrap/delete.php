<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $connect->query("DELETE FROM custmers WHERE ID = $id");

    if ($delete) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error while deleting.";
    }
} else {
    echo "ID not provided.";
}
?>