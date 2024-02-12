<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();




$password = md5( $_POST['password']);
$dep = $_POST['dep'];


if (empty($dep) || empty($password)) {
    header('location:../dashboard/users.php?error=Failed required');
    exit();
}


$stm = $db->prepare("SELECT * FROM users WHERE dep='$dep'");
$stm->execute();

if ($stm->rowCount() > 0) {
    header('location:../dashboard/users.php?error=users already exists');
    exit();
}
$stm = $db->prepare("INSERT INTO users (dep, password) VALUES ('$dep', '$password')");
if ($stm->execute()) {
    header('location:../dashboard/users.php?success=successfully created account');
}
