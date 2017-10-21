<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-card-2" style="width:25%;right:0;">
    <h3 class="w3-bar-item" style="background-color:#b3e0ff; text-align: center;">תפריט מנהל</h3>
    <a href="admin-add.php" class="w3-bar-item w3-button" style="text-align: center;">הוספת נציג</a>
    <a href="change-pass.php" class="w3-bar-item w3-button" style="text-align: center;">שינוי סיסמה</a>
    <a href="delete-user.php" class="w3-bar-item w3-button" style="text-align: center;">הקפאה / הפעלה נציג</a>
    <a href="delete_main.php" class="w3-bar-item w3-button" style="text-align: center;">מחיקת משימות</a>
    <a href="download admin.php" class="w3-bar-item w3-button" style="text-align: center;">הורדת דוחות</a>   
</div>

<!-- Page Content -->
<div style="margin-right:25%">

    <div id="msg11"></div>
<div id="admin-body">
    
</div>

</div>
<script>
    $(function () {
        $(".w3-bar-item").on("click", function (e) {
            e.preventDefault();
            $("#admin-body").load(this.href);
        });
    });
</script>
<style>
        #admin {
     background-color: gray;
    color: white;
}

</style>
 </body>
</html>
