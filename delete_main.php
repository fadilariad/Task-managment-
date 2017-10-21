<html>
    <head>
        <style>
            table, th, td {
                border: 0px solid black;
            }
                tr:nth-child(even){
    background-color:  #b3e0ff;
}
        </style>
    </head>
    <body>
        <button id="delete-all" class="delete-button">מחיקת כל המשימות שבוצעו</button> <br>
        <?php
       include ("config1.php");     
       include("session.php");
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM tasks where status='open' ORDER BY done  , primaryKey";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table> <tr><th>מספר משימה</th><th>פותח הפניה</th><th>ת.ז.</th><th>שם משתמש</th><th>ת.התחלה</th><th>הערות</th><th>בטיפול של</th><th>ת.סופי</th><th>בוצע</th><th></th></tr>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td data-col-name='primaryKey'>" . $row["primaryKey"] . "</td><td>" . $row["opened"] . "</td><td>" . $row["id"] . "</td><td>" . $row["user"] . "</td> <td>" . $row["date"] . "</td><td>" . $row["note"] . "</td><td>" . $row["assigned_to"] . "</td><td>" . $row["ndate"] . "</td><td >" . $row["done"] . "</td><td colspan=2><button class='myClass'>מחק</button></td></tr>";
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
            var primaryKey = $("td[data-col-name='primaryKey']", tr).text().trim();
            $.ajax('delete.php', {
                data: {
                    variable: primaryKey
                },
                type: "POST",
                async: false,
                success: function (result) {
                   
                   $("#admin-body").load("delete_main.php");
                
                }
            });
        });
    </script>
    <script>
    $(function () {
        $("#delete-all").on("click", function (e) {
            e.preventDefault();
            $("#admin-body").load("delete-all-script.php");
        });
    });
</script>

</html>
