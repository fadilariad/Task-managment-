<?php
include("config1.php");
include("session.php");
// Start the session
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="index.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <meta http-equiv="pragma" content="no-cache" />
    </head>
    <body>
        <ul id="main-ul">
            <li><?php echo $_SESSION['login_user']; ?> </li>
            <li id="home">דף הבית</li>
            <li id="add">הוספת משימה</li>
            <li id="test">רשימת יוזרים לבדיקה</li>
            <li id="admin">מנהל</li>
            <li id="log"><a id="logout" href="logout.php">יציאה </a></li>       
        </ul>
        <div id="content"></div>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    cache: false   
                });
                $("#add").click(function () {
                    $("#content").load("insert-page.php");
                });
                $("#home").click(function () {
                    $("#content").load("select-main.php");
                });
                $("#test").click(function () {
                    $("#content").load("test-user.php");
                });
                 $("#admin").click(function () {
                     var check =  ("<?php echo $_SESSION['login_type']; ?>").trim();
                     if(check === "מנהל") {
                         $("#content").load("admin.php");
                     }else {
                         alert("איזור מנהל");
                     }
                });
                
            });
        </script>
       
    </body>
</html>
