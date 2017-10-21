<?php
 include("session.php");
?>
<br>
<form id="form-1"  action="select.php" method="post">
  בטיפול של: <?php
include ("config1.php");

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $sql = "SELECT * FROM users";  
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<select name='assigned' id='assigned'> ";
     echo "<option value='כללי'>כללי</option>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<option value='" . $row["user"] . "'>" . $row["user"] . "</option>";
    }
    echo "</select>";
} 


$conn->close();
?>
    
    <input class="insert-button" type="submit" value="חפש"/>
</form>
<br>
<button id="select" class="insert-button">כל המשימות</button>
<div id="update">
</div>
<div id="selected">
    <h2>
        משמימות שפתחתי
    </h2>
    <?php
include ("config1.php");

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $sql = "SELECT * FROM tasks where opened = '$_SESSION[login_user]' and status ='open' ORDER BY done desc , ndate";  
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table class='tasks'> <tr><th>מספר משימה</th><th>פותח הפניה</th><th>ת.ז.</th><th>שם משתמש</th><th>ת.התחלה</th><th>הערות</th><th>בטיפול של</th><th>ת.סופי</th><th>בוצע</th><th>בוצע על ידי</th><th></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $block = "" . $row["user_done"] . "" ;
                if ($block == ""){ 
                echo "<tr><td data-col-name='primaryKey'>" . $row["primaryKey"] . "</td><td>" . $row["opened"] . "</td><td>" . $row["id"] . "</td><td>" . $row["user"] . "</td> <td>" . $row["date"] . "</td><td>" . $row["note"] . "</td><td>" . $row["assigned_to"] . "</td><td>" . $row["ndate"] . "</td><td >" . $row["done"] . "</td><td>" . $row["user_done"] . "</td><td colspan=2><button class='myClass'  >בוצע</button></td></tr>";
                }else {
                 echo "<tr><td data-col-name='primaryKey'>" . $row["primaryKey"] . "</td><td>" . $row["opened"] . "</td><td>" . $row["id"] . "</td><td>" . $row["user"] . "</td> <td>" . $row["date"] . "</td><td>" . $row["note"] . "</td><td>" . $row["assigned_to"] . "</td><td>" . $row["ndate"] . "</td><td >" . $row["done"] . "</td><td>" . $row["user_done"] . "</td><td colspan=2><button class='myClass' disabled >בוצע</button></td></tr>";   
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
            var primaryKey = $("td[data-col-name='primaryKey']", tr).text().trim();
            $.ajax('update.php', {
                data: {
                    variable: primaryKey
                },
                type: "POST",
                async: false,
                success: function (result) {
                  $("#content").load("select-main.php");
                }
            });
        });
    </script>
</html>

</div>
<script>
    $(function () {
        $("#select").on("click", function (e) {
            e.preventDefault();
            $("#selected").load("select_all.php");
        });
    });
</script>
<script>
 $('#form-1').submit(function () {
    $.post('select.php', $('#form-1').serialize(), function (data, textStatus) {
         $('#selected').html(data);
    });
    return false;
});
</script>
<style>
     tr:nth-child(even){
    background-color:  #b3e0ff;
}
table {
    width: 100%;
}
#home {
     background-color: gray;
    color: white;
}
</style>


 
