<?php
include 'connect.php';

$cust = $connect->query("SELECT * FROM custmers");

$edit_id = isset($_GET['edit']) ? (int)$_GET['edit'] : null;
$insert_mode = isset($_GET['insert']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View & Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="text-align:center; padding:100px;">
  <div class="container">
    <table class="table table-dark table-hover">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Actions</th>
      </tr>

      <?php while ($row = $cust->fetch_assoc()) { ?>
        <tr>
          <?php if ($edit_id === (int)$row['ID']) { ?>
            <form action="update.php" method="post">
              <td><?= $row['ID']; ?>
                <input type="hidden" name="id" value="<?= $row['ID']; ?>">
              </td>
              <td><input type="text" name="name" value="<?= $row['name']; ?>" class="form-control" required></td>
              <td><input type="number" name="age" value="<?= $row['age']; ?>" class="form-control" required></td>
              <td>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
                <a href="view.php" class="btn btn-secondary btn-sm">Cancel</a>
              </td>
            </form>
          <?php } else { ?>
            <td><?= $row['ID']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['age']; ?></td>
            <td>
              <a href="view.php?edit=<?= $row['ID']; ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="delete.php?id=<?= $row['ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
          <?php } ?>
        </tr>
      <?php } ?>

      <!-- Insert Mode -->
      <?php if ($insert_mode) { ?>
        <tr>
          <form action="insert.php" method="post">
            <td>#</td>
            <td><input type="text" name="name" placeholder="Enter name" class="form-control" required></td>
            <td><input type="number" name="age" placeholder="Enter age" class="form-control" required></td>
            <td>
              <button type="submit" class="btn btn-success btn-sm">Confirm</button>
              <a href="view.php" class="btn btn-secondary btn-sm">Cancel</a>
            </td>
          </form>
        </tr>
      <?php } else { ?>
        <tr>
          <td colspan="4">
            <a href="view.php?insert=true" class="btn btn-primary btn-sm">Insert New</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>