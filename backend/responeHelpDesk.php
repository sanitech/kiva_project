<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$id = $_GET['id'];
echo $status = $_GET['status'];



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
$stm = $db->prepare("UPDATE helpdesk SET status='$status' WHERE issue_id='$id'");
if ($stm->execute()) {
    header("location:../dashboard/?success=Successfully Updated status");
}
