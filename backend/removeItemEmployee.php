<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$id = $_GET['id'];

$stm = $db->prepare("DELETE FROM employee WHERE id = '$id'");
if ($stm->execute()) {
    header('location:../dashboard/employee.php?success=Successfully deleted Item');
}
