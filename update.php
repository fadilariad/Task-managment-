<?php
include ("config1.php");
include("session.php");
$variable = $_POST['variable'];

// Create connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// attempt insert query execution'
$sql = "update  tasks set done = 'כן', user_done = '$_SESSION[login_user]' where primaryKey = " . $variable .";";

if ($conn->query($sql) === TRUE) {
    echo "Done";
} else {
    echo "נכשל: <br>" . $sql . "<br>" . $conn->error;
}
?>
 