<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$sn = $_POST['sn'];
$product = $_POST['product'];
$for = $_POST['for'];
$item = $_POST['item'];
$model = $_POST['model'];
$dep = $_POST['dep'];
$location = $_POST['location'];
$price = $_POST['price'];
$Date = $_POST['date'];
$status = $_POST['status'];
$pImage = $_FILES['pImage'];

if (empty($sn) || empty($product) || empty($for)|| empty($Date)) {
    header('location:../dashboard/addproduct.php?error=Failed required');
    exit();
}




$stm = $db->prepare("SELECT * FROM product WHERE sn = '$sn'");
$stm->execute();

if ($stm->rowCount() > 0) {
    header('location:../dashboard/addproduct.php?error=product already exists');
    exit();
}


if(!empty($_FILES['pImage']['name']) ){
    $fileDir='../Data/product/';
    if(!is_dir($fileDir)){
        mkdir($fileDir, 0755, true);
    }
    $productImagePath= $fileDir. $pImage['name'];  
    move_uploaded_file($_FILES['pImage']['tmp_name'], $productImagePath);
}


$stm = $db->prepare("INSERT INTO product (sn, product, employee, item, location, model, dep, price, date, status, p_image) VALUES ('$sn', '$product', '$for', '$item', '$location', '$model', '$dep', '$price', '$Date', '$status', '$productImagePath')");
if ($stm->execute()) {
    header('location:../dashboard/addproduct.php?success=successfully registered');
}
