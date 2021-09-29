<?php  
 //pagination.php  
 $connect = mysqli_connect("localhost", "root", "", "attendance");  
 $record_per_page = 5;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM employee ORDER BY emp_id LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 $output .= "  
      <table class='table table-bordered'>  
           <tr>  
                <th width='50%'>Employee ID</th>  
                <th width='50%'>Firstname</th> 
                <th width='50%'>Lastname</th> 
                <th width='50%'>Immediate Head</th>
                <th width='50%'>Department</th>
                <th width='50%'>Position</th>
           </tr>  
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
           <tr>  
                <td>'.$row["emp_id"].'</td>  
                <td>'.$row["firstname"].'</td>
                <td>'.$row["lastname"].'</td>
                <td>'.$row["immediate_head"].'</td>
                <td>'.$row["department"].'</td>     
                <td>'.$row["position"].'</td> 
           </tr>  
      ';  
 }  
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM employee ORDER BY emp_id";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<a><span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span></a>
      ";  
 }  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?>  