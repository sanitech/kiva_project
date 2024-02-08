<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$fname = $_POST['fname'];
$email = $_POST['email'];
$dep = $_POST['dep'];


if (empty($fname) || empty($email) || empty($dep)) {
    header('location:../dashboard/employee.php?error=Failed required');
    exit();
}

$stm = $db->prepare("INSERT INTO employee(name, dep, email) VALUES(:name, :dep, :email)");
$stm->bindParam(':name', $fname);
$stm->bindParam(':dep', $dep);
$stm->bindParam(':email', $email);
if($stm->execute()){
    header('location:../dashboard/employee.php?success=Successfully Recorded employee');
}