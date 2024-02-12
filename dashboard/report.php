<?php

require "../dashboard/timeAgoDef.php";
require('../config/connection.php');
session_start();

$connect = new dbConnect();

$db = $connect->dbConnection();
$uid = $_SESSION['userinfo'];
$stm = $db->prepare("SELECT * FROM users WHERE uid='$uid'");
$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/beforPrint.css" media="all">
    <!-- <link rel="stylesheet" href="../assets/css/print.css" media="print"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
</head>
<style>
.date-picker{
    /* height: 2rem; */
    background-color: #ddd;
    border: none;
    padding: 10px 10px;
    margin-right: 10px;
}
.date-picker:active{
    border: 1px solid #ddd;
}
.btn-sub{
    background-color: blueviolet;
    color: #fff;
    padding: 10px 10px;
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 5px;
    box-shadow: 0 0 10 0 blueviolet ;
}
.rest{
    background-color: red;
    margin-left: 10px;
}
</style>

<body>
    <div class="container">
        <div class="print-controller">
            <form action="" method="get" enctype="multipart/form-data">
                <input type="date" name="start" id="" class="date-picker">
                <input type="date" name="end" id="" class="date-picker">
                <button class="btn-sub ">Generate</button>
            </form>
           <a href="report.php"> <button class="btn-sub rest">Reset Filter</button></a>
            <i class="bi bi-printer" onclick="print()"></i>
            <a href="./"> <i class="bi bi-arrow-left"></i></a>
        </div>

        <div class="report-container">
            <div class="logo">
                <img src="../assets/images/National-Bi-Lingual.png" alt="">
            </div>
            <div class="report-info">

                <div class="date"><?php echo date('d-m-Y H:i a') ?></div>
                <div class="title">All report</div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="cell">ID</th>
                    <th class="cell">Error type</th>
                    <th class="cell">Department</th>
                    <th class="cell">Subject</th>
                    <th class="cell">Completed</th>
                    <th>Status</th>
                    <th class="cell">By Who</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['start'])&& isset($_GET['end'])){
                    $start=$_GET['start'];
                    $end=$_GET['end'];
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                }
                elseif($userInfo['dep'] == 'super') {
                    $stm = $db->prepare("SELECT * FROM helpdesk ORDER BY create_time DESC");
                } else {
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE by_who='$userInfo[username]' ORDER BY create_time DESC");
                }
                $stm->execute();
                foreach ($stm->fetchAll() as $help) :
                ?>
                    <tr class="row">
                        <td><?= $help['issue_id'] ?></td>
                        <td><?= $help['error_type'] ?></td>
                        <td><?= $help['dep'] ?></td>
                        <td><?= $help['subject'] ?></td>
                        <td> <?php
                                if ($help['work_start'] && $help['work_end']) {
                                    $start = $help['work_start'] ? $help['work_start'] : $help['create_time'];
                                    echo time_ago_def($help['work_start'], $help['work_end']);
                                }
                                ?>
                        </td>
                        <td>
                            <div class=" status status-<?php if ($help['status'] === 'out source') echo 'danger';
                                                        if ($help['status'] === 'waiting') echo 'warning';
                                                        if ($help['status'] === 'open') echo 'info';
                                                        if ($help['status'] === 'done') echo 'success';
                                                        if ($help['status'] === 'send') echo 'danger' ?>"> <?= $help['status'] ?> </div>
                        </td>
                        <td><?= ucwords($help['by_who']) ?></td>

                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>