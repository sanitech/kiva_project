<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$dep = $_POST['dep'];


if (empty($dep)) {
    header('location:../dashboard/department.php?error=Failed required');
    exit();
}


$stm = $db->prepare("SELECT * FROM department WHERE dep = '$dep'");
$stm->execute();

if ($stm->rowCount() > 0) {
    header('location:../dashboard/department.php?error=Department already exists');
    exit();
}



$stm = $db->prepare("INSERT INTO department (dep) VALUES ( '$dep')");
if ($stm->execute()) {
    header('location:../dashboard/department.php?success=successfully registered');
}
