<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <style>
  button[disabled] {
    opacity: 0.6;
    cursor: not-allowed;
  }
</style>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="assets/index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="register-p.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control"name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"name="username" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"name="Rpassword" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
            if(isset($_GET['empty']))
{
?>
<div class="alert alert-danger mt-2 p-1 text-center">
<h6>Please fill in all fields</h6>
</div>
<?php
}
      if(isset($_GET['usernameR']))
{
?>
<div class="alert alert-danger mt-2 p-1 text-center">
<h6>Please choose another user name</h6>
</div>
<?php
}
      if(isset($_GET['invalidUsername']))
{
?>
<div class="alert alert-danger mt-2 p-1 text-center">
<h6>Invalid user name</h6>
</div>
<?php
}
            if(isset($_GET['shortPass']))
{
?>
<div class="alert alert-danger mt-2 p-1 text-center">
<h6>Password is short</h6>
</div>
<?php
}

            if(isset($_GET['weakPass']))
{
?>
<div class="alert alert-danger mt-2 p-1 text-center">
<h6>Password is weak</h6>
</div>
<?php
}
      if(isset($_GET['Rpass']))
{
?>
<div class="alert alert-danger mt-2 p-1 text-center">
<h6>Passwords do not match</h6>
</div>
<?php
}
?>
      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script>
  // أول ما الصفحة تجهز
  document.addEventListener("DOMContentLoaded", function () {
    const checkbox = document.getElementById("agreeTerms");
    const submitBtn = document.querySelector("button[type='submit']");

    // نخلي الزرار مقفول في البداية
    submitBtn.disabled = true;

    // كل ما يضغط أو يشيل العلامة من الشيك بوكس
    checkbox.addEventListener("change", function () {
      submitBtn.disabled = !this.checked;
    });
  });
</script>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
