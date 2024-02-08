<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$name=$_POST['name'];

$stm = $db->prepare("SELECT * FROM employee WHERE name = '$name'");
$stm->execute();
 $employee= $stm->fetch(PDO::FETCH_ASSOC);

echo $employee['dep'];

