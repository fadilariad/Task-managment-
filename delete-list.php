<?php
include ("config1.php");
include("session.php");

// Create connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// attempt insert query execution'
$sql = "update  test_user set status = 'deleted'";

if ($conn->query($sql) === TRUE) {
    echo "רשימה נמחקה";
} else {
    echo "נכשל: <br>" . $sql . "<br>" . $conn->error;
}
?>
 