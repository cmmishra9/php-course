<?php
// create variable for connection
 $dsn = "mysql:host=localhost; dbname=test_db";
 $db_user = "root";
 $db_password = "";
 
 // Create Connection with exception handling
 try {
  $conn = new PDO($dsn, $db_user, $db_password);

  // Set Error Mode
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected <hr><br>";

  // Insert Data
  $sql = "INSERT INTO student (name, roll, address) VALUES('Ali', '107', 'Ranchi')";
  $affected_row = $conn->exec($sql);
  echo $affected_row . " Row Inserted Successfully <br>";
 }
 
 catch(PDOException $e) {
  echo "Connection Failed " . $e->getMessage();
 }
 $conn = null;

?>