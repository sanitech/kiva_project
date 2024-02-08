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

    $stm = $db->prepare("SELECT uid, password, username FROM users WHERE username='$name'");
    $stm->execute();
    $userInfo = $stm->fetch(PDO::FETCH_ASSOC);

    if ($userInfo['password'] == $password) {
        session_start();
        var_dump($userInfo);
        $_SESSION['isLogin'] = true;
        $_SESSION['userinfo'] = $userInfo['uid'];

        header('location:../dashboard/');
    } else {
        header('location:../dashboard/setting.php?error=username or password invalid');
    }
} else {
    header('location:../dashboard/setting.php?error=username or password invalid');
}
