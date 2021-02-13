<?php
// create variable for connection
 $dsn = "mysql:host=localhost; dbname=test_db";
 $db_user = "root";
 $db_password = "";
 
 // Create Connection with exception handling
 try {
  $conn = new PDO($dsn, $db_user, $db_password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected <br><hr>";
 }
 catch(PDOException $e) {
  echo "Connection Failed " . $e->getMessage();
 }

 try{
      $sql = "SELECT * FROM student";

      // Prepared Statement
      $result = $conn->prepare($sql);

      // Execute Prepared statement
      $result->execute();

      // Fetch Data
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo "ID: " . $row['id'] . " Name: " . $row['name'] . " Roll: " . $row['roll'] . " Address: " . $row['address'] . "<br><br>";
      }
 }
 catch(PDOException $e) {
  echo $e->getMessage();
 }

  // Close Prepared Statement
 unset($result);

 // Close Connection
 $conn = null;

?>