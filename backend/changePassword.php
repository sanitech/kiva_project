<?php

require('../config/connection.php');
session_start();

$connect = new dbConnect();

$db = $connect->dbConnection();

$pass = md5(trim($_POST['password']));
$newPass = trim($_POST['newPass']);
$rePass = trim($_POST['rePass']);

if ($newPass != $rePass) {
  header("location:../dashboard/setting.php?error=Password Confirmation Failed");
  exit();
}
if (strlen($newPass) < 6) {
  header("location:../dashboard/setting.php?error=Password length must be 6 characters");
  exit();
}

echo $id = $_SESSION['isLogin'];
$stm = $db->prepare("SELECT * FROM users WHERE uid = '$id'");
$stm->execute();
$newPass = md5($newPass);
if ($stm->rowCount() == 0) {
  header("location:../dashboard/setting.php?error=User not found");
  exit();
} else {
  $user = $stm->fetch(PDO::FETCH_ASSOC);
  if ($user['password'] == $pass) {
    $stm = $db->prepare("UPDATE users SET password='$newPass' WHERE uid='$id'");
    if ($stm->execute()) {
      header("location:../dashboard/setting.php?success=Successfully Updated password");
    }
  } else {
    header("location:../dashboard/setting.php?error=Previous password not correct");
    exit();
  }
}
