<?php
// create variable for connection
 $dsn = "mysql:host=localhost; dbname=test_db";
 $db_user = "root";
 $db_password = "";
 
 // Create Connection
 $conn = new PDO($dsn, $db_user, $db_password);

 // check connection
 if($conn){
  echo "Connected";
 }
?>