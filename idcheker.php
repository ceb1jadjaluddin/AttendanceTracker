<?php
include_once 'databasefunctions.php';
session_start();


    if (isset($_POST['empid']) && isset($_POST['dateid'])) {
        # code...
        $empid = $_POST['empid'];
        $dateid = $_POST['dateid'];
        $_SESSION['empid'] = $empid;
        $_SESSION['dateid'] = $dateid;
        checker($empid);

    } else {
        echo "<script>alert('Invalid please try again.'); window.location.href='index.html';</script";
    }
?>