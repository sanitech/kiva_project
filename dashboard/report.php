<?php

require "../dashboard/timeAgoDef.php";
require('../config/connection.php');
session_start();
if (!isset($_SESSION['isLogin'])) {
    header('Location:../admin.php?error=your not logged in');
}
$connect = new dbConnect();

$db = $connect->dbConnection();
$uid = $_SESSION['userinfo'];
$stm = $db->prepare("SELECT * FROM users WHERE uid='$uid'");
$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);
if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];
}
$today=date('Y-m-d');
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
    .date-picker {
        /* height: 2rem; */
        background-color: #ddd;
        border: none;
        padding: 10px 10px;
        margin-right: 10px;
    }

    .date-picker:active {
        border: 1px solid #ddd;
    }

    .btn-sub {
        background-color: blueviolet;
        color: #fff;
        padding: 10px 10px;
        border: none;
        outline: none;
        cursor: pointer;
        border-radius: 5px;
        box-shadow: 0 0 10 0 blueviolet;
    }

    .rest {
        background-color: red;
        margin-left: 10px;
    }

    .form-container label {
        font-family: sans-serif;
        margin-right: 10px;
        font-size: 1.2em;
        font-weight: 500;
    }

    .nowrap {
        white-space: nowrap;
    }
</style>

<body>
    <div class="container">
        <div class="print-controller">
            <form action="" method="get" enctype="multipart/form-data" class="form-container">
                <label for="start">From</label>
                <input type="date" name="start" id="start" class="date-picker">
                <label for="end">To</label>
                <input type="date" name="end" id="end" class="date-picker">
                <button class="btn-sub" type="submit ">Generate</button>
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
                <div class="title">All report <?= isset($start) && isset($end) ? $start . ' / ' . $end : '' ?></div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="cell">ID</th>
                    <th class="cell">Error type</th>
                    <th class="cell">Department</th>
                    <th class="cell">Subject</th>
                    <th class="cell">From</th>
                    <th class="cell">Completed</th>
                    <th class="cell">Status</th>
                    <th class="cell">Date</th>
                    <th class="cell">By Who</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
                    $start = $_GET['start'];
                    $end = $_GET['end'];
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                } elseif ($userInfo['dep'] == 'super') {
                    $stm = $db->prepare("SELECT * FROM helpdesk ORDER BY create_time DESC");
                } else {
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE  date='$today' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                }
                $stm->execute();
                foreach ($stm->fetchAll() as $help) :
                ?>
                    <tr class="row">
                        <td class="nowrap"><?= $help['issue_id'] ?></td>
                        <td class="nowrap"><?= $help['error_type'] ?></td>
                        <td><?= $help['dep'] ?></td>
                        <td class="nowrap"><?= $help['subject'] ?></td>
                        <td><?= $help['location'] ?></td>
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
                        <td class="nowrap"><?= date("Y-m-d", strtotime($help['create_time']))  ?></td>
                        <td class="nowrap"><?= ucwords($help['by_who']) ?></td>

                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <div class="card-title">Report by Department</div>

        <div class="card-container">
            <?php
              

            $stm = $db->prepare("SELECT * FROM department");
            $stm->execute();
            foreach ($stm->fetchAll() as $i => $row) {
                if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
                    $start = $_GET['start'];
                    $end = $_GET['end'];
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE dep=:dep AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                } elseif ($userInfo['dep'] == 'super') {
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE dep=:dep  ORDER BY create_time DESC");
                } else {
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE dep=:dep AND by_who='$userInfo[username]' AND date='$today' ORDER BY create_time DESC");
                }

                 $stm->execute([':dep'=>$row['dep']]);
                 $count=$stm->rowCount();
            ?>
                <div class="card">
                    <div class="count-dep"><?= $count?> </div>
                    <span class="dep-name"><?= $row['dep'] ?></span>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="card-title">Report by Errors</div>
        <div class="card-container">
            <?php
              

            $stm = $db->prepare("SELECT * FROM error");
            $stm->execute();
            foreach ($stm->fetchAll() as $i => $row) {
                if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
                    $start = $_GET['start'];
                    $end = $_GET['end'];
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE error_type=:error_type AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                } elseif ($userInfo['dep'] == 'super') {
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE error_type=:error_type  ORDER BY create_time DESC");
                } else {
                    $stm = $db->prepare("SELECT * FROM helpdesk WHERE error_type=:error_type AND by_who='$userInfo[username]' AND date='$today' ORDER BY create_time DESC");
                }

                 $stm->execute([':error_type'=>$row['error_type']]);
                 $count=$stm->rowCount();
            ?>
                <div class="card">
                    <div class="count-dep"><?= $count?> </div>
                    <span class="dep-name"><?= $row['error_type'] ?></span>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>