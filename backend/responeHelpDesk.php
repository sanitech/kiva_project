<?php

require('../config/connection.php');

$connect = new dbConnect();
session_start();


$db = $connect->dbConnection();

$id = $_GET['id'];
echo $status = $_GET['status'];
$uid = $_SESSION['userinfo'];


$currentTimestamp = date('Y-m-d H:i:s');


$stm = $db->prepare("SELECT * FROM helpdesk WHERE issue_id = '$id'");
$stm->execute();
if ($stm->rowCount() <= 0) {
    echo $stm->rowCount();
    header("location:../dashboard/?error=Issue not found");
    exit();
}

$stm = $db->prepare("SELECT * FROM helpdesk WHERE issue_id = '$id'");
$stm->execute();
$helpDesk = $stm->fetch(PDO::FETCH_ASSOC);
$stm=$db->prepare("SELECT * FROM users WHERE uid='$uid'");
$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);
$by_who=$userInfo['username'];
if($status=='done'){
    $stm = $db->prepare("UPDATE helpdesk SET status='$status', work_end='$currentTimestamp', by_who='$by_who' WHERE issue_id='$id'");
}else{
    $stm = $db->prepare("UPDATE helpdesk SET status='$status', work_start='$currentTimestamp', by_who='$by_who' WHERE issue_id='$id'");
}

if ($stm->execute()) {
    header("location:../dashboard/?success=Successfully Updated status");
}
