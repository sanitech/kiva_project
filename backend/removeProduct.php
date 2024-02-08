<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$sn = $_GET['sn'];

$stm = $db->prepare("DELETE FROM product WHERE sn = '$sn'");
if ($stm->execute()) {
    header('location:../dashboard/product.php?success=Successfully deleted product');
}
