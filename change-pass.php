<?php
 include("session.php");
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="index.css"/> 
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
         #error {
              font-size:11px;
              color:#cc0000;
              margin-top:10px
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF" dir="rtl">
   <div class="pen-title">
  <h1> שינוי סיסמה</h1><span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    
  </div>
  <div class="form">
    <h2>שינוי סיסמה </h2>
    <form id="change-pass" action="change-pass-script.php"  method="post">
      <?php
include ("config1.php");

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $sql = "SELECT * FROM users";  
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<select name='user' id='user'> ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<option value='" . $row["ID"] . "'>" . $row["user"] . "</option>";
    }
    echo "</select>";
} 


$conn->close();
?>
      
        <br><br> <input type="text" placeholder="סיסמה חדשה" name="new-password"/>
      <button type="submit">עדכן</button>
    </form>
  </div>
  
  </div>
<script>
 $('#change-pass').submit(function () {
    $.post('change-pass-script.php', $('#change-pass').serialize(), function (data, textStatus) {
         $('#msg').html(data);
    });
    return false;
});
</script>
<div id="msg"></div>
</html>