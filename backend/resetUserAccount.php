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
$whatReset=$_GET['what'];

if($whatReset=="profile"){
    $stm = $db->prepare("UPDATE users SET profile = '' WHERE uid = '$id'");
}else if($whatReset = "password"){

    $stm = $db->prepare("UPDATE users SET password = '$password' WHERE uid = '$id'");
}
if ($stm->execute()) {
    if($whatReset=="profile"){
        header("location:../dashboard/setting.php?success=Successfully Reset Profile Picture");
    }else if($whatReset = "password"){
        header("location:../dashboard/users.php?success=Successfully Reset account Name $name Password 'admin'");
    
    }
}
