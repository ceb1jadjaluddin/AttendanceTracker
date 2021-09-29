<?php
include_once 'databasefunctions.php';
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['head']) 
&& isset($_POST['department']) && isset($_POST['position'])) {
    # code...
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $head = $_POST['head'];
    insert($firstname,$lastname,$head,$department,$position);
} else {
}

?>