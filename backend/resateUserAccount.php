<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$id = $_GET['id'];
$password=md5('admin');

$stm = $db->prepare("SELECT * FROM users WHERE uid = '$id'");
$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);
$name=$userInfo['username'];

$stm = $db->prepare("UPDATE users SET password = '$password' WHERE id = '$id'");
if ($stm->execute()) {
    header("location:../dashboard/user.php?success=Successfully Reset account Name $name Password 'admin'");
}
