<?php
     
include("session.php");
include("config1.php");
$output='';

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="select * from test_user where status='open'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    $output .='<table><tr><th>תאריך</th><th>שם משתמש</th></tr>';
     while($row = $result->fetch_assoc()) {
       $output .='<tr><td>' . $row["date"]. '</td><td>' . $row["user"]. '</td></tr>';             
    }
    $output .= '</table>';
    header("Content-type: Application/xls");
    header("Content-Disposition: attachment; filename=download.xls");
     echo chr(239) . chr(187) . chr(191) .$output;
}
  echo '<script>
           alert ("רשימה ריקה");        
         </script>';
  
?>