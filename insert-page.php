<?php
 include("session.php");
?>
<style>
    input {
        width: 100%;
    }
    textarea {
    resize: none;
    width: 100%
    }
    #add {
     background-color: gray;
    color: white;
}
    
</style>

<form action="insert.php" id="form" method="post">
    <table>
        <tr>
            <td colspan="2"><h1>הוספת משימה חדשה</h1></td>
        </tr>
        <tr>
            <td>
                <label for="ID">ת.ז. :</label>
            </td>
            <td>
                <input type="text" name="ID" id="ID">
            </td>
        </tr>
        <tr>
            <td>
                <label for="user">שם משתמש :</label>
            </td>
            <td>
                <input type="text" name="user" id="user">
            </td>
        </tr>
        <tr>
            <td>
                <label for="end_date">ת. סיום :</label>
            </td>
            <td>
                <input type="text"  name="end_date" id="datepicker">
            </td>
        </tr>
        <tr>
            <td>
                <label for="note">הערות :</label>
            </td>
            <td>
                <textarea id="note-textarea" name="note"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label for="note">בטיפול של :</label>
            </td>
            <td>
                <?php
include ("config1.php");

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $sql = "SELECT * FROM users";  
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<select name='assigned' id='assigned'><option value='כללי'>כללי</option> ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<option value='" . $row["user"] . "'>" . $row["user"] . "</option>";
    }
    echo "</select>";
} else {
    echo "אין משימות";
}

$conn->close();
?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button id="submitFormButton">הוסף</button>
            </td>
        </tr>
    </table>
</form>
<div id="selected">
    
</div>
<script type="text/javascript">
    function mysql_real_escape_string(str) {
        return str.replace(/[\0\x08\x09\x1a\n\r"'\\\%]/g, function (char) {
            switch (char) {
                case "\0":
                    return "\\0";
                case "\x08":
                    return "\\b";
                case "\x09":
                    return "\\t";
                case "\x1a":
                    return "\\z";
                case "\n":
                    return "\\n";
                case "\r":
                    return "\\r";
                case "\"":
                case "'":
                case "\\":
                case "%":
                    return "\\" + char; // prepends a backslash to backslash, percent,
                    // and double/single quotes
            }
        });
    }
    function jsEscape(js) {
        return js.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    }
    $(document).ready(function () {
        var datepickerObj = $("#datepicker");
        var textareaObj = $("#note-textarea");
        var submitFormObj = $("#submitFormButton");
        var formObj = $("#form");
        datepickerObj.datepicker("destroy");
        datepickerObj.datepicker();
        submitFormObj.click(function (e) {
            //$("#insertForm").submit();
            e.preventDefault();
            var parsedHTML = mysql_real_escape_string(jsEscape(textareaObj.val()));
            textareaObj.val(parsedHTML);
             formObj.submit()
            //alert($.parseHTML($("#note-textarea").val()).text());
        });
    });
</script>
<script>
     $('#form').submit(function () {
    $.post('insert.php', $('#form').serialize(), function (data, textStatus) {
         $('#selected').html(data);
         $("#content").load("insert-page.php");
    });
    return false;
});
</script>
