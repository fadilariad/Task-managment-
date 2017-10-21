<html>
<head>
<style>
 table, th, td {
    border:0;
}
</style>
</head>
<body>
<?php
include ("config1.php");
include("session.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM test_user where status = 'open'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>תאריך</th><th>שם משתמש</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["date"]. "</td><td>" . $row["user"]. "</td></tr>" ;
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
