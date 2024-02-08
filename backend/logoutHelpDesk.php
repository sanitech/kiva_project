<?php

session_start();
session_destroy();
header('location:../help.php');
