<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$uid = $_GET['uid'];


$stm = $db->prepare("DELETE FROM users WHERE uid = $uid");
if($stm->execute()){
    header('location:../dashboard/users.php?success=Successfully');
}