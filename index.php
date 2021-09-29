<?php
    session_start();
    if (!isset($_SESSION['empid'])) {
        # code..
        echo "<script>alert('You need to provide your employee ID first'); window.location.href='index.html'</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="mycss.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
        label{
            text-transform : uppercase;
            font-weight : bold;
        }
    </style>
    <script>
        function printpage() {
                //Get the print button and put it into a variable
                var printButton = document.getElementById("printpagebutton");
                var postButton = document.getElementById("loginnow");
                var reenterButton = document.getElementById("logoutnow");
                var exit = document.getElementById("exit");
                var loginlogout = document.getElementById("loginlogout");
                var exportbutton = document.getElementById("exportbutton");

                //Set the button visibility to 'hidden' 
                printButton.style.visibility = 'hidden';
                postButton.style.visibility = 'hidden';
                reenterButton.style.visibility = 'hidden';
                exit.style.visibility = 'hidden';
                exportbutton.style.visibility = 'hidden';
                
                //Print the page content
                window.print();
                
                //Restore button visibility
                printButton.style.visibility = 'visible';
                postButton.style.visibility = 'visible';
                reenterButton.style.visibility = 'visible';
                exit.style.visibility = 'visible';
                exportbutton.style.visibility = 'visible'
        }

            function exportTableToExcel(tableID, filename = ''){
                    var downloadLink;
                    var dataType = 'application/vnd.ms-excel';
                    var tableSelect = document.getElementById(tableID);
                    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
                    
                    // Specify file name
                    filename = filename?filename+'.xls':'excel_data.xls';
                    
                    // Create download link element
                    downloadLink = document.createElement("a");
                    
                    document.body.appendChild(downloadLink);
                    
                    if(navigator.msSaveOrOpenBlob){
                        var blob = new Blob(['\ufeff', tableHTML], {
                            type: dataType
                        });
                        navigator.msSaveOrOpenBlob( blob, filename);
                    }else{
                        // Create a link to the file
                        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                    
                        // Setting the file name
                        downloadLink.download = filename;
                        
                        //triggering the function
                        downloadLink.click();
                    }
                }
        
    </script>
    <script>
        function loadData(){
            $(document).ready(function(){
              
                    $.post("login.php",{},function(data, status){
                        $("#tabledata").load(location.href + " #tabledata");
                        $("#loginnow").prop('disabled', true);
                        $('#logoutnow').prop('disabled', false);
                        $('#myModal').modal('show');
                    });
            
            });
        }
    </script>
    <script>
        function logoutData(){
            $(document).ready(function(){
                    $.post("logout.php",{},function(data, status){
                        $("#tabledata").load(location.href + " #tabledata"); 
                        $("#logoutnow").prop('disabled', true);     
                        $('#myModalLogout').modal('show');
                    });
            
            });
        }
    </script>

</head>
<body style="background-color: gainsboro;">
    <div class="container">
        <div class="row" id="loginlogout">

            <div id="backgroundimage" class="col-sm-3" >
                <img src="index.png" width="250" height="100">
            </div>

            <div class="col-sm-6" style="padding-top : 50px;">  
                <center>   
                    <h1 style="font-weight : bold;">ATTENDANCE FORM</h1>
                    <h6>3rd Floor Mitsubishi Bldg. M.C Briones St.</h6>
                    <h6>Brgy. Maguikay, Mandaue City, Cebu 6014</h6>
                </center>    
            </div>

            <div class="col-sm-3" style="padding-top : 100px; padding-left:80px;">
            <?php
                    //session_start();
                    include_once 'db.php';
                    
                    $empid = $_SESSION['empid'];  
                    $dateid = $_SESSION['dateid'];
                    $date = date("Y/m/d");
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM timelog WHERE date_record='$date' AND time_in='' AND emp_id='$empid'";
                    $sql2 = "SELECT * FROM timelog WHERE date_record='$date' AND time_out='' AND emp_id='$empid'";
                    $sql3 = "SELECT * FROM timelog WHERE date_record='$date' AND time_out!='' AND emp_id='$empid'";
                    $result = mysqli_query($conn, $sql);
                    $result2 = mysqli_query($conn, $sql2);
                    $result3 = mysqli_query($conn, $sql3);
                   

                    if(mysqli_num_rows($result) > 0)
                    {
                        echo"<button  class='btn btn-outline-success' id='loginnow' onclick='loadData()'>LOGIN</button>". " ";
                        echo "<button type='button' id='logoutnow' class='btn btn-danger' disabled>LOGOUT</button>" . " ";

                    }else if(mysqli_num_rows($result2) > 0){
                        echo "<button type='button' id='loginnow' class='btn btn-success' disabled>LOGIN</button>" . " ";
                        echo "<button  class='btn btn-outline-danger' id='logoutnow' onclick='logoutData()'>LOGOUT</button>" . " ";
                    }else if(mysqli_num_rows($result3) > 0){
                        
                        echo"<button  class='btn btn-outline-success' id='loginnow' onclick='loadData()' disabled>LOGIN</button>". " ";
                        echo"<button  class='btn btn-outline-danger' id='logoutnow' onclick='logoutData()' disabled>LOGOUT</button>" . " ";
                    }
                    else
                    {
                        echo"<button  class='btn btn-outline-success' id='loginnow' onclick='loadData()'>LOGIN</button>". " ";
                        echo"<button  class='btn btn-outline-danger' id='logoutnow' onclick='logoutData()' disabled>LOGOUT</button>" . " ";
                    }
                    ?>      
            </div>
        </div>

        <div class="row">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Message Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <a>Successfully logged in!</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
                <div class="modal fade" id="myModalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Message Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <a>Successfully logged out!</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>   

    <div class="container" id="mybody">
    <?php
            
            include_once 'db.php';
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $sql = "SELECT * FROM employee WHERE emp_id='$empid'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_assoc($result)) {
                    
                        $firstname = $row['firstname'];
                        $lastname =$row['lastname'];
                        $immediatehead = $row['immediate_head'];
                        $department = $row['department'];
                        $position = $row['position'];
                    }
                } 
                mysqli_close($conn);     
        ?> 
        Employee Name : <label><?php echo $firstname ." ".$lastname;?></label><br>
        Immediate Head : <label><?php echo $immediatehead;?></label><br>
        Site/Department : <label><?php echo $department;?></label><br>
        Position : <label><?php echo $position;?> </label><br>
        Cut-off date : <label><?php echo $_SESSION['dateid'];?> </label><br>
        
        <button id="printpagebutton" onClick="printpage()">Print</button>
        <a href="exit.php"><button type="button" id='exit'>EXIT</button></a>
        <button type="button" id='exportbutton' onClick="exportTableToExcel('tableexport')">Export</button>
    </div>   

    <div class="container" id="tabledata">    
    <div class="table-responsive">     
        <table class="table table-dark table-hover" id="tableexport">
            <tr>
                <th>Date</th>
                <th>Time in</th>
                <th>Signature</th>
                <th>Time out</th>
                <th>Signature</th>
                
            </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'db.php';
                    $dateid = $_SESSION['dateid'];
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM timelog WHERE emp_id='$empid' AND cutoff='$dateid'";
                    $result = mysqli_query($conn, $sql);

                
                    if (mysqli_num_rows($result) > 0){
                    
                        while($row = mysqli_fetch_assoc($result)) {
                            $date = $row['date_record'];
                            $time_in = $row['time_in'];
                            $time_out =$row['time_out'];
                            //$cutoffdate =$row['cutoff']; 
                            echo <<<_END
                                <tr>
                                    <td>$date</td>
                                    <td>$time_in</td>
                                    <td></td>
                                    <td>$time_out</td> 
                                    <td></td>                
                                </tr>
                        
        _END;
                    }
    }
                ?>
            </tbody>
        </table>
    </div>
        <br><br><br>
        <div class="row"> 

                <div class="col-sm-4">
                <center>    
                <label><?php echo "$firstname. $lastname";?></label>
                    <br>
                    <b style="text-decoration: overline;">Employee's name and signature</b>
                </center>  
                </div>

                <div class="col-sm-4">

                </div>
                
                <div class = "col-sm-4">
                <center>   
                    <label><?php echo "$immediatehead";?></label>
                    <br>
                    <b style="text-decoration : overline;">Approved by immediate head</b>
                </center>   
                </div>
        </div>     
    </div>
</body>
</html>