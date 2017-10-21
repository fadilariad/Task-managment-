<?php
 
include ("config1.php");
include("session.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// attempt insert query execution'
$sql = "insert into tasks (id,user,date,ndate,note,assigned_to,done,opened,status) values ('" . $_POST['ID'] . "', '"  . $_POST['user'] . "', CURRENT_TIMESTAMP,STR_TO_DATE('" . $_POST['end_date'] . "', '%m/%d/%Y'), '" . $_POST['note'] . "', '" . $_POST['assigned'] . "','לא','$_SESSION[login_user]','open')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert ("הוספת משימה בוצעה בהצליחה"); </script>';
} else {
    echo '<script>alert ("הוספת משימה נכשלה"); </script>';
}

?>
 