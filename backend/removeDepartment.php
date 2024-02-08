<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$id = $_GET['id'];

$stm = $db->prepare("DELETE FROM department WHERE id = '$id'");
if ($stm->execute()) {
    header('location:../dashboard/department.php?success=Successfully deleted Department');
}
