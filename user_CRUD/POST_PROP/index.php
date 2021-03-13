<?php
include('../POST_PROP/components.php');
include('../POST_PROP/prop_db.php');
include('../POST_PROP/operations.php');

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header('location: index.php');
  exit;
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
            <a href="../index.php"><img src="assets/images/logo.png" alt="logo" class="logo"></a>
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Register your Property</h1>
            <form method="post" action="">
              <!-- <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
              </div>
              <input name="login" id="login" class="btn btn-block login-btn" type="button" value="Login"> -->

              <div class="input-group mb-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label">Locality: -</label>
                </div>
                <select class="form-select" name="location" aria-label="Default select example">
                  <option value="Mumbai">Mumbai</option>
                  <option value="Thane">Thane</option>
                  <option value="Upper Thane">Upper Thane</option>
                  <option value="Navi Mumbai">Navi Mumbai</option>
                  <option value="Vasai Virar">Vasai Virar</option>
                  <option value="Mira Bhayander">Mira-Bhayander</option>
                  <option value="Palghar">Palghar</option>
                  <option value="Boisar">Boisar</option>
                  <option value="Dahanu">Dahanu</option>
                  <option value="Kalyan Dombivali">Kalyan Dombivali</option>
                  <option value="Badlapur">Badlapur</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label">Budget: -</label>
                </div>
                <select class="form-select" name="price" aria-label="Default select example">
                  <option value="Below 5L">Below 5L</option>
                  <option value="5L-10L">5L-10L</option>
                  <option value="10L-20L">10L-20L</option>
                  <option value="20L-30L">20L-30L</option>
                  <option value="30L-40L">30L-40L</option>
                  <option value="50L-60L">50L-60L</option>
                  <option value="60L-80L">60L-80L</option>
                  <option value="80L to 1CR">80L to 1CR</option>
                  <option value="1CR+">1CR+</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label">Area: -</label>
                </div>
                <select class="form-select" name="area" aria-label="Default select example">
                  <option value="less than 300 Sqft">less than 300 Sqft</option>
                  <option value="300 Sqft to 500 Sqft">300 Sqft to 500 Sqft</option>
                  <option value="500 Sqft to 700 Sqft">500 Sqft to 700 Sqft</option>
                  <option value="700 Sqft to 800 Sqft">700 Sqft to 800 Sqft</option>
                  <option value="800 Sqft to 1000 Sqft">800 Sqft to 1000 Sqft</option>
                  <option value="1000 Sqft to 1500 Sqft">1000 Sqft to 1500 Sqft</option>
                  <option value="more than 1500 Sqft">more than 1500 Sqft</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label">Posession: -</label>
                </div>
                <select class="form-select" name="possession" aria-label="Default select example">
                  <option value="Ready to move">Ready to Move</option>
                  <option value="within 1 Year">within 1 Year</option>
                  <option value="within 3 Years">within 3 Years</option>
                  <option value="within 5 Years">within 5 Years</option>
                  <option value="more than 5 Years+">more than 5 Years+</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Contact: -</label>
                  </div>
                </div>
                <input type="number" step="0.01" class="form-control" name="contact" placeholder="Contact Number" aria-label="contact" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label">Createdby: -</label>
                </div>
                <select class="form-select" name="createdby" aria-label="Default select example">
                  <option value="<?php echo $_SESSION['email']?>"><?php echo $_SESSION['email']?></option>
                </select>
              </div>
              <?php buttonElement('btn-create', 'btn registerBTN', 'Register Property', 'Register', "data-toggle='tooltip' data-placement='bottom' title='Register Property'"); ?>


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