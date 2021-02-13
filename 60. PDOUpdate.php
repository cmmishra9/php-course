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

  // Update Data
  $sql = "UPDATE student SET name = 'Sameer', roll = '1001', address = 'Chennai' WHERE id = 7";
  $affected_row = $conn->exec($sql);
  echo $affected_row . " Row Updated Successfully <br>";
 }
 
 catch(PDOException $e) {
  echo "Connection Failed " . $e->getMessage();
 }
 $conn = null;

?>