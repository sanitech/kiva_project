<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();



$item = $_POST['item'];

if (empty($item)) {
    header('location:../dashboard/addItem.php?error=Failed required');
    exit();
}


$stm = $db->prepare("SELECT * FROM item WHERE item = '$item'");
$stm->execute();

if ($stm->rowCount() > 0) {
    header('location:../dashboard/addItem.php?error=Item already exists');
    exit();
}

$stm = $db->prepare("INSERT INTO item (item) VALUES ('$item')");
if ($stm->execute()) {
    header('location:../dashboard/addItem.php?success=successfully registered');
}
