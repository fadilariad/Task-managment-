<?php
include ("config1.php");
include("session.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// attempt insert query execution'
$sql = "insert into test_user (user,date,status) values ('" . $_POST['user'] . "', CURRENT_TIMESTAMP , 'open')";

if ($conn->query($sql) === TRUE) {
    echo "הוספת יוזר בוצעה בהצלחה";
} else {
    echo "נכשל: <br>"  . $sql . "<br>" . $conn->error;
}

?>
 