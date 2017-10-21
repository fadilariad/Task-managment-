<?php

  $DB_SERVER = "localhost:3306";
  $DB_USERNAME = "root";
   $DB_PASSWORD = "root";
   $DB_DATABASE = "tasks";
   $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
   $db -> set_charset("utf8");

?>
