<?php
/*   $DB_SERVER = "localhost:3306";
   $DB_USERNAME = "root";
   $DB_PASSWORD = "root";
*/
   $DB_SERVER = "localhost:3306";
   $DB_USERNAME = "riad";
   $DB_PASSWORD = "321riad123";
 
/*   $DB_SERVER = "31.154.95.29:3306";
   $DB_USERNAME = "riad";
   $DB_PASSWORD = "321riad123";
*/ 
   $DB_DATABASE = "tasks";
   $conn = new mysqli($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
   $conn -> set_charset("utf8");
   ?>