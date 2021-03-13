<?php
include('../../partials/_dbconnect.php');
$showError = false;
$login = false;
$emptyError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email =  $_POST['email'];
  $password =  $_POST['password'];
  $sql = "SELECT *  from users where email = '$email' AND password = '$password'";
  $results = mysqli_query($con, $sql);
  $num = mysqli_num_rows($results);
  if ($num == 1) {
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    header('location: welcome.php');
  } else {
    $showError = "Invalid Credentials";
  }
  $user = $_SESSION['email'] = $email;
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
            <a href="../../Signup/AUTH/index.php"><img src="assets/images/logo.png" alt="logo" class="logo"></a>
          </div>
          <?php
          if ($login) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success</strong> You're Logged in Successfully!
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
          ?>

          <div class="login-wrapper my-auto">

            <h1 class="login-title">Login Page</h1>
            <form method="post" action="../../Signup/AUTH/index.php">
              <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
              </div>
              <button type="submit" style="outline: none;background-color: #12e6c8;color: #fff;border: none;padding: 10px 25px;">Login</button>
              <br>
              <br>
              <label for="exampleFormControlInput1" class="form-label">Don't have an account?</label>
              <a href="../../Signup/AUTH/Signup.php">Signup</a> <br>
              <label for="exampleFormControlInput1" class="form-label">Admin? </label>
              <a href="../../Signup/AUTH/admin_login.php">Click Here</a>
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