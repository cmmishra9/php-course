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
		// Using Anonymous Positional Placeholder
      $sql = "INSERT INTO student (name, roll, address) VALUES (?, ?, ?)";
      
      // Prepared Statement
      $result = $conn->prepare($sql);

      // Execute Prepared Statement
      $result->execute(array('Rohan', 106, 'Kolkata'));
	  /*
	  // Variables and Values
      $name = "Ragini";
      $roll = 107;
      $address = "Kolkata";

      $result->execute(array($name, $roll, $address));
	*/
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