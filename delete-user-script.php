<?php
$variable = $_POST['variable'];
include ("config1.php");
include("session.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// attempt insert query execution'
$sql = "update  users set status = 'deleted' where id = " . $variable .";";

if ($conn->query($sql) === TRUE) {
    echo "Done";
} else {
    echo "נכשל: <br>" . $sql . "<br>" . $conn->error;
}
?>
 