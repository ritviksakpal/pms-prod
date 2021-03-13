<?php
$serverName = "localhost";
$user = "root";
$pass = "";
$dbname = "adminpms";

$con = mysqli_connect($serverName, $user, $pass, $dbname);

// Check connection
if (!$con) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (mysqli_query($con, $sql)) {
    $con = mysqli_connect($serverName, $user, $pass, $dbname);
    $sql = "
        CREATE TABLE IF NOT EXISTS users(
            id INT(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(25) NOT NULL,
            password VARCHAR(25) NOT NULL,
            createdate DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ;
    ";
    if (mysqli_query($con, $sql)) {
        // echo "table connected";
        return $con;
    } else {
        "Cannot create table..!";
    }
} else {
    echo "Error while creating Database" .  mysqli_error($con);
}

