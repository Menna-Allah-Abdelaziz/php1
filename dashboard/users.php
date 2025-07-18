<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include 'connect.php';
include 'layouts/header.php';
include 'layouts/sidebar.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1 class="m-3">USERS</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>User name</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = $connect->query("SELECT id, name, username FROM users");
          $i = 1;
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$i}</td>
                      <td>{$row['name']}</td>
                      <td>{$row['username']}</td>
                    </tr>";
              $i++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</div>

<?php
include 'layouts/footer.php';
include 'layouts/contr-sidebar.php';
?>
