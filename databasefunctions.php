<?php


    function insert($firstname, $lastname, $immediatehead, $department, $position)
    {
        include_once 'db.php';
        $conn = mysqli_connect($servername, $username, $password, $dbname);
		$sql = "INSERT INTO employee (firstname, lastname, immediate_head, department, position) VALUES ('$firstname','$lastname', '$immediatehead', '$department', '$position')";
        mysqli_query($conn, $sql);
        $sql2 = "SELECT emp_id FROM employee WHERE firstname='$firstname' AND lastname='$lastname'";
        $result = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result) > 0){

            while ($row = mysqli_fetch_assoc($result)) {
               $employeeID = $row['emp_id'];
            }
        }
        mysqli_close($conn);
        echo "<script>alert('successfully registered! Your Employee ID is $employeeID'); window.location.href='index.html';</script>";

    }
    function logintime($empid,$date,$time,$cutoffdate)
    {
        include_once 'db.php';
        $conn = mysqli_connect($servername, $username, $password, $dbname);
		$sql = "INSERT INTO timelog (emp_id, date_record, time_in, cutoff) VALUES ('$empid', '$date', '$time', '$cutoffdate')";
        mysqli_query($conn, $sql);
		mysqli_close($conn);
    }
    function logouttime($empid,$time,$datenow)
    {
        include_once 'db.php';
        $conn = mysqli_connect($servername, $username, $password, $dbname);
		$sql = "UPDATE timelog SET time_out='$time' WHERE emp_id='$empid' AND date_record='$datenow'";
        mysqli_query($conn, $sql);
		mysqli_close($conn);
    }
    function checker($empid)
    {
			include_once 'db.php';
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("connection failed : " . mysqli_connect_error());
			}
			$checker = "SELECT * FROM `employee` WHERE emp_id='$empid'";
			$result = mysqli_query($conn, $checker);
			if (mysqli_num_rows($result) > 0) {
				# code...
                session_start();
			    header('location:index.php');
			}
			else{
				echo "<script>alert('NOT FOUND IN DATABASE'); window.location.href = 'index.html';</script>";
			}
			mysqli_close($conn);
    }
?>