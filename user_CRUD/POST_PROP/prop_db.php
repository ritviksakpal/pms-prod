<?php


/* Attempt MySQL server connection.*/
function Createdb()
{
    $serverName = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "raw_data";

    $con = mysqli_connect($serverName, $user, $pass, $dbname);

    // Check connection
    if (!$con) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // create DB
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($serverName, $user, $pass, $dbname);
        $sql = "
            CREATE TABLE IF NOT EXISTS property(
                id INT(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
                location VARCHAR(25) NOT NULL,
                price VARCHAR(25) NOT NULL,
                area VARCHAR(25) NULL,
                possession VARCHAR(25) NOT NULL,
                contact BIGINT(10) NOT NULL,
                createdby VARCHAR(25) NOT NULL
            ) ;
        ";

        if (mysqli_query($con, $sql)) {
            return $con;
        } else {
            "Cannot create table..!";
        }
    } else {
        echo "Error while creating Database" .  mysqli_error($con);
    }
}
