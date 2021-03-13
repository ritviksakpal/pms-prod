<?php
require_once("../user_CRUD/PHP/component.php");
require_once("../user_CRUD/PHP/operation.php");

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Page</title>
    <link rel="stylesheet" href="../user_CRUD/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> <!--  Custom CSS-->
</head>

<body>
    <main>
        <div class="container text-center">
            <h1 style="background-color: #000 !important;" class="py-4 bg-dark text-light rounded"> <i class="fas fa-warehouse"></i> Property Portal <i class="fas fa-warehouse"></i></h1>
            <a class="po-back" href="../Signup/index.php"> <i class="fas fa-arrow-left"></i> Back</a>
            <div class="d-flex justify-content-center">

                <form action="" method="POST" class="w-50">
                    <!-- <div class="py-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i style="margin: 4px 0;" class="fas fa-address-card"></i></span>
                            </div>
                            <input type="number" autocomplete="off" class="form-control" name="id" placeholder="ID" aria-label="id" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
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
                            <span class="input-group-text" style="padding: 0 15px;"><i class="fas fa-rupee-sign"></i></span>
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
                            <span class="input-group-text"><i class="fas fa-clone"></i></span>
                            <select class="form-select" name="area" aria-label="Default select example">
                                <option value="less than 300 Sqft">less than 300 Sqft</option>
                                <option value="300 Sqft to 500 Sqft">300 Sqft to 500 Sqft</option>
                                <option value="500 Sqft to 700 Sqft">500 Sqft to 700 Sqft</option>
                                <option value="500 Sqft to 800 Sqft">500 Sqft to 800 Sqft</option>
                                <option value="800 Sqft to 1000 Sqft">800 Sqft to 1000 Sqft</option>
                                <option value="1000 Sqft to 1500 Sqft">1000 Sqft to 1500 Sqft</option>
                                <option value="more than 1500 Sqft">more than 1500 Sqft</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <select class="form-select" name="possession" aria-label="Default select example">
                                <option value="Ready to move">Ready to Move</option>
                                <option value="within 1 Year">within 1 Year</option>
                                <option value="within 3 Years">within 3 Years</option>
                                <option value="within 5 Years">within 5 Years</option>
                                <option value="more than 5 Years+">more than 5 Years+</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="d-flex justify-content-center">
                        <a data-toggle='tooltip' data-placement='bottom' title='Register Property' class="post_Button" href="./POST_PROP/index.php">Post Property</a>
                        <?php buttonElement('btn-read', 'btn btn-primary loadABtn ', 'Load All Properties', 'Read', "data-toggle='tooltip' data-placement='bottom' title='Load Property'"); ?>

                        <!-- <?php buttonElement('btn-create', 'btn btn-success loadABtn', '<i class="fas fa-plus"></i>', 'Register', "data-toggle='tooltip' data-placement='bottom' title='Register Property'"); ?>
                        <?php buttonElement('btn-update', 'btn btn-light border', '<i class="fas fa-pen-alt"></i>', 'Update', "data-toggle='tooltip' data-placement='bottom' title='Update Property'"); ?>
                        <?php buttonElement('btn-delete', 'btn btn-danger', '<i class="fas fa-trash-alt"></i>', 'Delete', "data-toggle='tooltip' data-placement='bottom' title='Delete Property'"); ?> -->
                    </div>
                </form>
            </div>


            <!--  Bootstrap user_CRUD Table-->
            <div class="d-flex table-data">
                <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Area(Sqft.)</th>
                            <th>Possession</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody id="tbody" class="tbody">
                        <?php
                        if (isset($_POST['Read'])) {
                            $result = getData();
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['location']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['price']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['area']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['possession']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['contact']; ?></td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../user_CRUD/PHP/main.js"></script>
</body>

</html>