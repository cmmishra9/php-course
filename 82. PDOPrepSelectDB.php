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

      // Bind by Column Number
      $result->bindColumn(1, $id);
      $result->bindColumn(2, $name);
      $result->bindColumn(3, $roll);
      $result->bindColumn(4, $address);

      // // Bind by Column Name
      // $result->bindColumn('id', $id);
      // $result->bindColumn('name', $name);
      // $result->bindColumn('roll', $roll);
      // $result->bindColumn('address', $address);

      // Fetch data
      while($result->fetch(PDO::FETCH_BOUND)){
      echo "ID: " . $id . " Name: " . $name . " Roll: " . $roll . " Address: " . $address . "<br><br>";
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