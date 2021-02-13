<?php
// create variable for connection
 $dsn = "mysql:host=localhost; dbname=test_db";
 $db_user = "root";
 $db_password = "";
 
 // Create Connection with exception handling
 try {
  $conn = new PDO($dsn, $db_user, $db_password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected";
 }
 catch(PDOException $e) {
  echo "Connection Failed " . $e->getMessage();
 }

 // http://php.net/manual/en/pdo.setattribute.php

?>