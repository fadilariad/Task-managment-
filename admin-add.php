<?php
include("session.php");
?>
<html>
    <head>
        
    </head>
    <body>
        <h3>הוספת משתמש</h3>
        <form id="add-admin" action="admin-add-script.php" method="post">
            <table>
                <tr>
                    <td> ת.ז.</td>
                    <td><input type="text" id="add-id" name="add-id" /></td>
                </tr>
                <tr>
                    <td> שם</td>
                    <td><input type="text" id="add-user-name" name="add-user-name"/> </td>
                </tr>
                <tr>
                    <td> סיסמה</td>
                    <td><input id="add-user-pass" type="text" name="add-user-pass" /> </td>
                </tr>
                <tr>
                    <td> תפקיד</td>
                    <td><select id="add-type" name="add-type">
                            <option value="מנהל">מנהל</option>
                            <option value="נציג">נציג</option>
                        </select></td>
                </tr>
                <tr>
                    <td><input type="submit" value="הוסף" /></td>
                </tr>
                 
            </table>
        </form>
        <div id="msg1"></div>
        <script>
 $('#add-admin').submit(function () {
    $.post('add-admin-script.php', $('#add-admin').serialize(), function (data, textStatus) {
         $('#msg1').html(data);
    });
    return false;
});
</script>

    </body>
    
</html>