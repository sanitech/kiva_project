<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$employeeFile = $_FILES['empData'];

var_dump($_FILES['empData']);

$fileDir='../Data/employee/';
if(!is_dir($fileDir)){
    mkdir($fileDir, 0755, true);
}

require "../excelReader/excel_reader2.php";
require "../excelReader/SpreadsheetReader.php";

$fileDirPath= $fileDir. $employeeFile['name'];

move_uploaded_file($_FILES['empData']['tmp_name'], $fileDirPath);

$data=new SpreadsheetReader($fileDirPath);
$Success=true;
foreach($data as $i=>$emp):

    $name= $emp[0];
    $dep= $emp[1];
    $email= $emp[2];

    $stm = $db->prepare("INSERT INTO employee(name, dep, email) VALUES(:name, :dep, :email)");
    $stm->bindParam(':name', $name);
    $stm->bindParam(':dep', $dep);
    $stm->bindParam(':email', $email);
    $stm->execute();
endforeach;
if($Success){
    header('location:../dashboard/employee.php?success=Successfully Imported employee');
}










