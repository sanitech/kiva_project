<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();


session_start();
$uid = $_SESSION['userinfo'];

$fileDir='../Data/profile/';
if(!is_dir($fileDir)){
    mkdir($fileDir, 0755, true);
}

$profile=$_FILES['profile'];

echo $fileDirPath= $fileDir. $profile['name'];

move_uploaded_file($_FILES['profile']['tmp_name'], $fileDirPath);




$stm = $db->prepare("UPDATE users SET profile = '$fileDirPath' WHERE uid = '$uid'");
if ($stm->execute()) {
    header("location:../dashboard/setting.php?success=Successfully upload  profile");
}
