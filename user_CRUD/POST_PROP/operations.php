<?php

require_once("../POST_PROP/prop_db.php");
require_once("../POST_PROP/components.php");

$con = Createdb();

if (isset($_POST['Register'])) {
    createData();
}

function createData()
{
    // $id = idCheck('id');
    $location = locationCheck('location');
    $price = priceCheck('price');
    $area = areaCheck('area');
    $possession = possessionCheck('possession');
    $contact = contactCheck('contact');
    $createdby = createdbyCheck('createdby');

    if ($location && $price && $area && $possession && $contact && $createdby) {
        $sql = "
                INSERT INTO property(location, price, area, possession,contact,createdby)
                VALUES('$location','$price','$area','$possession', '$contact','$createdby')
        ";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", 'Data has been submitted for the verification, it will be soon uploaded... ');
        } else {
            "Error";
        }
    } else {
        TextNode("errorData", 'Kindly Provide Contact Number');
    }
}
// function idCheck($value)
// {
//     $id = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
//     if (empty($id)) {
//         return false;
//     } else {
//         return $id;
//     }
// }

function createdbyCheck($value)
{
    $createdby = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($createdby)) {
        return false;
    } else {
        return $createdby;
    }
}
function locationCheck($value)
{
    $location = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($location)) {
        return false;
    } else {
        return $location;
    }
}
function priceCheck($value)
{
    $price = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($price)) {
        return false;
    } else {
        return $price;
    }
}
function areaCheck($value)
{
    $area = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($area)) {
        return false;
    } else {
        return $area;
    }
}
function possessionCheck($value)
{
    $possession = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($possession)) {
        return false;
    } else {
        return $possession;
    }
}
function contactCheck($value)
{
    $contact = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($contact)) {
        return false;
    } else {
        return $contact;
    }
}

function TextNode($className, $msg)
{
    $element = "<h6 class='$className'>$msg</h6> ";
    echo $element;
}
