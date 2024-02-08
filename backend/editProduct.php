<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$sn = $_POST['sn'];
$newSn = $_POST['newSn'];
$product = $_POST['product'];
$for = $_POST['for'];
$item = $_POST['item'];
$model = $_POST['model'];
$dep = $_POST['dep'];
$location = $_POST['location'];

$stm = $db->prepare("SELECT sn FROM product WHERE sn= '$sn'");
$stm->execute();
if ($stm->rowCount() > 0) {
    header('location:../dashboard/editProduct.php?error=Serial number already exists&sn=' . $sn);
}



$stm = $db->prepare("UPDATE product SET product='$product', sn='$newSn', employee='$for', item='$item', model='$model', location='$location', dep='$dep' WHERE sn = '$sn'");
if ($stm->execute()) {
    header('location:../dashboard/product.php?success=Successfully update product');
}
