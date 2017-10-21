<?php  
include("config.php"); 
include("session.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
       $id= mysqli_real_escape_string($db,$_POST['add-id']);
       $username = mysqli_real_escape_string($db,$_POST['add-user-name']);
       $password = mysqli_real_escape_string($db,$_POST['add-user-pass']);
       $code='qwe123';
       $code1='bvc876';
       $newpsw = $code.$password.$code1.$password;
       $type = mysqli_real_escape_string($db,$_POST['add-type']);
       $sql = "insert into users (user,password,id,type,status) values('$username','$newpsw','$id','$type','active')";
       $result = mysqli_query($db,$sql);  
      if ($result === TRUE) {
          echo "הוספת נציג בוצעה בהצלחה";
               } else {
              echo "נכשל:";
              }
   }
?>   