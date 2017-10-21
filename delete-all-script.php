<?php
include ("config1.php");
include("session.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// attempt insert query execution'
$sql = "update  tasks set status = 'deleted' where done = 'כן'";

if ($conn->query($sql) === TRUE) {
    header ("location: delete_main.php");
} else {
    echo "נכשל: <br>" . $sql . "<br>" . $conn->error;
}
?>
 