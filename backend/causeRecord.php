<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



  $cause = $_POST['cause'];
$issue_id = $_POST['issue_id'];


if (empty($cause)) {
    header('location:../dashboard/?error=Failed required');
    exit();
}



$stm = $db->prepare("SELECT * FROM helpdesk WHERE issue_id = '$issue_id'");
$stm->execute();


if ($stm->rowCount() <= 0) {

    header('location:../dashboard/?error=No such issue in this id');
    exit();
}

echo $stm->rowCount();


$stm = $db->prepare("UPDATE helpdesk SET cause='$cause' WHERE issue_id='$issue_id'");
if ($stm->execute()) {
    header('location:../dashboard/?success=successfully insert cause');
}
