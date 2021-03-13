<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

//create button click
if (isset($_POST['Register'])) {
    createData();
}
if (isset($_POST['Update'])) {
    UpdateData();
}
if (isset($_POST['Delete'])) {
    deleteRecord();
}


function createData()
{
    $id = idCheck('id');
    $location = locationCheck('location');
    $price = priceCheck('price');
    $area = areaCheck('area');
    $possession = possessionCheck('possession');
    $contact = contactCheck('contact');

    if ($location && $price && $area && $possession && $contact) {
        $sql = "
                INSERT INTO property(location, price, area, possession,contact)
                VALUES('$location','$price','$area','$possession', '$contact')
        ";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", 'Data added successfully...');
        } else {
            "Error";
        }
    } else {
        TextNode("success", 'Provide Data in the Textbox..');
    }
}

function idCheck($value){
    $id = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if (empty($id)) {
        return false;
    } else {
        return $id;
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
    $element = "<h6 class='$className'>$msg</h6>";
    echo $element;
}

// get data from mysql DB 

function getData()
{
    $sql = "SELECT*FROM property";
    $result =    mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result)>0){
        return $result;
    }
}

function UpdateData(){
    $id = idCheck("id");
    $location = locationCheck("location");
    $price = priceCheck("price");
    $area = areaCheck("area");
    $possession = possessionCheck("possession");
    $contact = contactCheck("contact");

    if($location && $price && $area && $possession && $contact){
        $sql = "
                    UPDATE property SET location='$location', price = '$price', area = '$area',  possession='$possession', contact='$contact' WHERE id='$id';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }
}

function deleteRecord()
{
    $id = (int)idCheck("id");

    $sql = "DELETE FROM property WHERE id=$id";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "Record Deleted Successfully...!");
    } else {
        TextNode("error", "Enable to Delete Record...!");
    }
}