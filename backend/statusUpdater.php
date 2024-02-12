<?php


require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();
$from=$_GET['from'];

$stm = $db->prepare("SELECT status FROM users where uid=:id");
$stm->bindValue(":id", $_GET['id']);
$stm->execute();
$status = $stm->fetch(PDO::FETCH_ASSOC);

if ($status['status'] == 1) {
    $status = 0;
} else {
    $status = 1;
}

$stm = $db->prepare("UPDATE users SET status=:status WHERE uid=:id");
$stm->bindValue(":status", $status);
$stm->bindValue("id", $_GET['id']);
if($stm->execute()){
    header("location:../dashboard/$from.php?success=successfully update status");

}
