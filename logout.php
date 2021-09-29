<?php
    include_once 'databasefunctions.php';
    session_start();
    $date = date("Y/m/d");
    $time = date("h:i:sa");
    $empid = $_SESSION['empid'];
    logouttime($empid,$time,$date);
?>
