<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$dep = $_POST['dep'];
$password = md5($_POST['password']);

if (empty($dep) || empty($password)) {
    header('location:help.php?error=failed require');
    exit();
}


$stm = $db->prepare("SELECT * FROM users WHERE dep='$dep'");
$stm->execute();
if (0 < count($stm->fetchAll())) {

    $stm = $db->prepare("SELECT uid, password, username FROM users WHERE dep='$dep'");
    $stm->execute();
    $userInfo = $stm->fetch(PDO::FETCH_ASSOC);

    if ($userInfo['password'] == $password) {
        session_start();
        var_dump($userInfo);
      
        $_SESSION['helpSession'] = $userInfo['uid'];
        header('location:../helpDesk/');
    } else {
        header('location:../help.php?error=department or password invalid');
    }
} else {
    header('location:../help.php?error=department or password invalid');
}
