<?php

$existsError = false;
$showError = false;
$showAlert = false;
$emptyError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include('../../partials/_dbconnect.php');
  $email =  $_POST['email'];
  $password =  $_POST['password'];
  $cpassword =  $_POST['cpassword'];
  // $exists = false;
  $existsSQL = "SELECT * FROM `users` WHERE email = '$email' ";
  $result = mysqli_query($con, $existsSQL);
  $numExistsRows = mysqli_num_rows($result);
  if ($numExistsRows > 0) {
    // $exists = true;
    $existsError = true;
  } else {
    // $exists = false;
    if ($email && $password && $cpassword == !NULL) {
      if ($password == $cpassword) {
        $sql = "INSERT INTO `users` ( `email`, `password`, `createdate`) VALUES ('$email', '$password', current_timestamp())";
        $result = mysqli_query($con, $sql);
        if ($result) {
          $showAlert = true;
        }
      } else {
        $showError = true;
      }
    } else {
      $emptyError = true;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>

<body>

  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <a href=""><img src="assets/images/logo.png" alt="logo" class="logo"></a>
          </div>
          <?php
          if ($showAlert) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success</strong> We've successfully registered your account!
                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
          if ($showError) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Sorry!  </strong>Password Doesn't Match!
                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
          if ($emptyError) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Sorry!  </strong>Please Enter all the fields!
                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
          if ($existsError) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Sorry!  </strong>Email already registered
                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
          ?>

          <div class="login-wrapper my-auto">

            <h1 class="login-title">Register Page</h1>
            <form method="post" action="../../Signup/AUTH/Signup.php">
              <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
              </div>
              <div class="form-group mb-4">
                <label for="password">Enter Password again</label>
                <input type="password" name="cpassword" id="password" class="form-control" placeholder="enter your passsword">
              </div>
              <button type="submit" style="outline: none;background-color: #12e6c8;color: #fff;border: none;padding: 10px 25px;">Register</button>
              <br>
              <br>
              <label for="exampleFormControlInput1" class="form-label">Already Have an account?</label>
              <a href="../../Signup/AUTH/index.php">Login</a>
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>