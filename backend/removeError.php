<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$id = $_GET['id'];

$stm = $db->prepare("DELETE FROM error WHERE error_code = '$id'");
if ($stm->execute()) {
    header('location:../dashboard/errorCode.php?success=Successfully deleted');
}
