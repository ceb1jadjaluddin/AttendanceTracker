<?php
    include_once 'databasefunctions.php';
    session_start();

    if(!isset($_SESSION['empid'])){
        echo "<script>alert('Please enter employeed ID first'); window.location.href='index.html'</script>";
      

    }else{

            $cutoff = "-05";
            $cutoffsecond = "-20";
            $dash = "-";

            //cutoff dates
            $fifthcutoffdate = date('Y').$dash.date('m').$cutoff;
            $twentycutoffdate = date('Y').$dash.date('m').$cutoffsecond;

            $time = date("h:i:sa");
            $empid = $_SESSION['empid'];
            $time2 = strtotime($fifthcutoffdate);
            $cutoffnextmonth = date("Y-m-d", strtotime("+1 month", $time2));
            $datenow = date('Y-m-d');
            //date today is 2021-06-03
            //$NewDate=Date('Y-m-d', strtotime('-2 days'));

            if ($datenow < $fifthcutoffdate){    
                logintime($empid,$datenow,$time,$fifthcutoffdate);
                
            }
            else if($datenow > $fifthcutoffdate && $datenow < $twentycutoffdate){
                logintime($empid,$datenow,$time,$twentycutoffdate);
            }else if($datenow > $twentycutoffdate){
                logintime($empid,$datenow,$time,$cutoffnextmonth);
            }else{
                echo "<script>alert('Unresolve error') window.location.href='index.php';</script>";
        }
        }
?>