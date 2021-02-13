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
	 // Using Named Placeholder
      $sql = "INSERT INTO student (name, roll, address) VALUES (:name, :roll, :address)";
      
      // Prepared Statement
      $result = $conn->prepare($sql);

      // Bind Parameter to Prepared Statement
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->bindParam(':roll', $roll, PDO::PARAM_INT);
      $result->bindParam(':address', $address, PDO::PARAM_STR);

      // Variables and Values
      $name = "Ragini";
      $roll = 107;
      $address = "Kolkata";

      // Execute Prepared Statement
      $result->execute();

      echo $result->rowCount() . " Row Inserted <br>";
 }
 catch(PDOException $e) {
  echo $e->getMessage();
 }

 // Close Prepared Statement
 unset($result);

 // Close Connection
 $conn = null;

?>