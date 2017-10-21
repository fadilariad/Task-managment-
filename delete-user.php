<html>
    <head>
        <style>
            table, th, td {
                border: 0;
          
            }
                tr:nth-child(even){
    background-color:  #b3e0ff;
}
        </style>
    </head>
    <body>
        <h3>רשימת נציגים</h3>
        <?php
include ("config1.php");
include("session.php");
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users order by status ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table> <tr><th>ת.ז</th><th>שם נציג</th><th>סיסמה</th><th>תפקיד</th><th>מצב</th></tr>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $status="" . $row["status"] . "";
                if($status == "active"){
                echo "<tr><td data-col-name='id'>" . $row["ID"] . "</td><td>" . $row["user"] . "</td><td>" . $row["password"] . "</td><td>" . $row["type"] . "</td> <td>" . $row["status"] . "</td><td ><button class='myClass'>הקפיא</button></td></tr>";
            }else {
             echo "<tr><td data-col-name='id'>" . $row["ID"] . "</td><td>" . $row["user"] . "</td><td>" . $row["password"] . "</td><td>" . $row["type"] . "</td> <td>" . $row["status"] . "</td><td ><button class='myClass2'>הפעל</button></td></tr>";   
            }
            }
            echo "</table>";
        } else {
            echo "אין משימות";
        }

        $conn->close();
        ?>
    </body>
   <script>
        $('.myClass').on('click', function (e) {
            var $this = $(this);
            var tr = $this.closest('tr');
            var id = $("td[data-col-name='id']", tr).text().trim();
            $.ajax('delete-user-script.php', {
                data: {
                    variable: id
                },
                type: "POST",
                async: false,
                success: function (result) {
                   
                   $("#admin-body").load("delete-user.php");
                
                }
            });
        });
    </script>
<script>
        $('.myClass2').on('click', function (e) {
            var $this = $(this);
            var tr = $this.closest('tr');
            var id = $("td[data-col-name='id']", tr).text().trim();
            $.ajax('active-user-script.php', {
                data: {
                    variable: id
                },
                type: "POST",
                async: false,
                success: function (result) {
                   
                   $("#admin-body").load("delete-user.php");
                
                }
            });
        });
    </script>
</html>
