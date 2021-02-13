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
      // Using Positional Parameter
      $sql = "SELECT * FROM student WHERE id = ?";

      // Using Named Parameter
      // $sql = "SELECT * FROM student WHERE id = :id";

      // Prepared Statement
      $result = $conn->prepare($sql);

      // Bind parameter (Positional Parameter)
      $result->bindParam(1, $id);

      // Bind parameter (Named Parameter)
      // $result->bindParam(':id', $id);

      $id = 4;

      // Execute Prepared statement
      $result->execute();

      $row = $result->fetch(PDO::FETCH_ASSOC);

      echo " ID: " . $row["id"] . " Name: " . $row["name"] . " Roll: " . $row["roll"] . " Address: " . $row["address"] . "<br><br>";
 }
 catch(PDOException $e) {
  echo $e->getMessage();
 }

  // Close Prepared Statement
 unset($result);

 // Close Connection
 $conn = null;

?>