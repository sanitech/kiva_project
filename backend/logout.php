<?php
$to=$_GET['to'];
session_start();
session_destroy();
header("location:../$to.php");
