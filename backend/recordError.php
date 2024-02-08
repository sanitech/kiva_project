<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$error_code = $_POST['ecode'];
$error = $_POST['error'];


if (empty($error_code) || empty($error)) {
    header('location:../dashboard/errorCode.php?error=Failed required');
    exit();
}


$stm = $db->prepare("SELECT * FROM error WHERE error_code = '$error_code'");
$stm->execute();

if ($stm->rowCount() > 0) {
    header('location:../dashboard/errorCode.php?error=Error code  already exists');
    exit();
}



$stm = $db->prepare("INSERT INTO error (error_code, error_type) VALUES ('$error_code', '$error')");
if ($stm->execute()) {
    header('location:../dashboard/errorCode.php?success=successfully Error registered');
}
