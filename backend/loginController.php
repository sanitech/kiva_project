<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$name = $_POST['username'];
$password = md5($_POST['password']);

if (empty($name) || empty($password)) {
    header('location:../dashboard/setting.php?error=failed require');
    exit();
}


$stm = $db->prepare("SELECT * FROM users WHERE username='$name'");
$stm->execute();
if (0 < count($stm->fetchAll())) {

    $stm = $db->prepare("SELECT * FROM users WHERE username='$name'");
    $stm->execute();
    $userInfo = $stm->fetch(PDO::FETCH_ASSOC);

    if ($userInfo['password'] == $password) {
        var_dump($userInfo);
        if(!$userInfo['status']){
            header('location:../?error=Your account block by admin');
            exit();
        }else{
        session_start();

            $_SESSION['isLogin'] = true;
            $_SESSION['userinfo'] = $userInfo['uid'];
            $_SESSION['userType'] = $userInfo['dep'];
            
            header('location:../dashboard/');
        }
    } else {
        header('location:../?error=username or password invalid');
    }
} else {
    header('location:../?error=username or password invalid');
}
