
<?php
//db.php

$conn="";

function OpenMySQLDatabase() {
    //connection string global variable
   global $conn;
  
   $conn=mysqli_connect("localhost","root","","reserv");
}

function MySQLDate($d) {
  if ($d=="") return "";
  $d2=date_create($d);
  return date_format($d2,"Y-m-d");
}

OpenMySQLDatabase();




?>
