<?php
 include("session.php");
?>
<div><br><br>
        <form action="user-test.php" method="post" id="form-2">

            <input type="text" name="user" id="user" placeholder="הכנס שם משתמש"> <br><br>
            <input type="submit" value="הוסף" class="insert-button" >
        <a id="list" href="select_test.php" class="insert-button">הצג רשימה</a>
        <a id="downlaod-users" href="download-users.php" class="insert-button">הורדת רשימה ב Excel </a>
        <a id="delete-users" href="delete-list.php" class="delete-button">מחק רשימה </a>
        </form>

</div>

<div id="users"> 
</div>
<script>
    $(function () {
        $("#list").on("click", function (e) {
            e.preventDefault();
            $("#users").load(this.href);
        });
    });
</script>
<script>
     $(function () {
        $("#download-users").on("click", function (e) {
            e.preventDefault();
            $("#users").load(this.href);
        });
    });
 </script>
<script>
     $(function () {
        $("#delete-users").on("click", function (e) {
            e.preventDefault();
            $("#users").load(this.href);
        });
    });
 </script>
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
        var textareaObj = $("#note-textarea");
        var submitFormObj = $("#submitFormButton");
        var formObj = $("#form");
        submitFormObj.click(function (e) {
            //$("#insertForm").submit();
            e.preventDefault();
            var parsedHTML = mysql_real_escape_string(jsEscape(textareaObj.val()));
            textareaObj.val(parsedHTML);
            formObj.submit();
            //alert($.parseHTML($("#note-textarea").val()).text());
        });
    });
</script>
<script>
 $('#form-2').submit(function () {
    $.post('user-test.php', $('#form-2').serialize(), function (data, textStatus) {
         $('#users').html(data);
    });
    return false;
});
</script>
<style>
    #test {
     background-color: gray;
    color: white;
}
</style>


