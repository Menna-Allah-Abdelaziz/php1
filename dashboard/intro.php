<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
if(!isset($_SESSION['user'])){
  header("location:login.php");
}
include 'layouts/header.php';
?>
 
<?php
include 'layouts/sidebar.php';
include 'layouts/m-contant.php';
include 'layouts/footer.php';
include 'layouts/contr-sidebar.php';
?>
