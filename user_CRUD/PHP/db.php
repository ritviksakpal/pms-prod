<?php

function Createdb()
{
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "propertyDB";

    // create connection
    $con = mysqli_connect($serverName, $username, $password);
    // check connection
    if (!$con) {
        die("Connection failed:" . mysqli_connect_error());
    }
    // create DB
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($serverName, $username, $password, $dbname);
        $sql = "
            CREATE TABLE IF NOT EXISTS property(
                id INT(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
                location VARCHAR(25) NOT NULL,
                price VARCHAR(25) NOT NULL,
                area VARCHAR(25) NULL,
                possession VARCHAR(25) NOT NULL
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
