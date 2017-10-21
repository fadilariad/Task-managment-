 <?php   
include("config1.php");
include("session.php");
$output='';

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="select * from tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    $output .='<table> <tr><th>מספר משימה</th><th>פותח הפניה<th>ת.ז.</th><th>שם משתמש</th><th>ת.התחלה</th><th>הערות</th><th>בטיפול של</th><th>ת.סופי</th><th>בוצע</th><th>בוצע על ידי</th><th>מצב</th></tr>';
     while($row = $result->fetch_assoc()) {
       $output .='<tr><td>' . $row["primaryKey"] . '</td><td>' . $row["opened"] . '</td><td>' . $row["id"] . '</td><td>' . $row["user"] . '</td> <td>' . $row["date"] . '</td><td>' . $row["note"] . '</td><td>' . $row["assigned_to"] . '</td><td>' . $row["ndate"] . '</td><td >' . $row["done"] . '</td><td>' . $row["user_done"] . '</td><td>' . $row["status"] . '</td></tr>';             
    }
    $output .= '</table>';
    header("Content-type: Application/xls");
    header("Content-Disposition: attachment; filename=tasks.xls");
    echo chr(239) . chr(187) . chr(191) .$output;
}
?>