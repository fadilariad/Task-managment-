<?php
   include("config.php");
   include("session.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $id = trim(mysqli_real_escape_string($db,$_POST['user'])); 
      $newpass = mysqli_real_escape_string($db,$_POST['new-password']);
      $code='qwe123';
       $code1='bvc876';
       $newpsw = $code.$newpass.$code1.$newpass;
      $sql = "update users set password ='$newpsw' WHERE id ='$id' ";
      $result = mysqli_query($db,$sql);
      if ($result === TRUE) {
    echo "הסיסמה הושתנה";
} else {
    echo "נכשל: <br>";
}

   }
?>