<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $ID = mysqli_real_escape_string($db,$_POST['ID']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $code='qwe123';
       $code1='bvc876';
       $newpsw = $code.$mypassword.$code1.$mypassword;
      $sql = "SELECT * FROM users WHERE ID = '$ID' and password = '$newpsw' and status = 'active'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    //     session_register("myusername");
         $_SESSION['login_user'] =" $row[user] ";
         $_SESSION['login_type'] = "  $row[type] ";   
          header("location: main.php");
      }else {
           echo '<script>
           alert ("שגיאה : שם משתמש או סיסמה לא נכונים");
          </script>';
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
  <h1> כניסה</h1><span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    
  </div>
  <div class="form">
    <h2>כניסה</h2>
    <form action=""  method="post">
      <input type="text" placeholder="User ID" name="ID" />
      <input type="password" placeholder="Password" name="password"/>
      <button type="submit">כניסה</button>
    </form>
  </div>
  
  </div>

  


   </body>
</html>