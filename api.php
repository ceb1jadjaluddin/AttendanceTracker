<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
/*
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
*/
    include_once 'db.php';
    $response = array();

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM employee";
    $result = mysqli_query($conn, $sql);
    if($result){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['emp_id'] = $row['emp_id'];
            $response[$i]['firstname'] = $row['firstname'];
            $response[$i]['lastname'] = $row['lastname'];
            $response[$i]['immediate_head'] = $row['immediate_head'];
            $response[$i]['department'] = $row['department'];
            $response[$i]['position'] = $row['position'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
?>