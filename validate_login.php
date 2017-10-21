<?php
session_start();
$_SESSION['user'] =" '" . $_POST["user_name"] . "' ";
$_SESSION['pass']  = " '" . $_POST["users_pass"] . "' ";
include ("config1.php");

// Create connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users where user = $_SESSION[user] and password = $_SESSION[pass]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 echo '<script type="text/javascript" language="javascript">
              $("#content").load("select.html");
                  </script>' ;
} 
   else {
	 echo '<script type="text/javascript" language="javascript">
              alert ("not found");
                  </script>'; 
}
$conn->close();
?>