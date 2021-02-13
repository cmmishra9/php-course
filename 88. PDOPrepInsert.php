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

      // Bind Parameter to Prepared Statement
      $result->bindParam(1, $name, PDO::PARAM_STR);
      $result->bindParam(2, $roll, PDO::PARAM_INT);
      $result->bindParam(3, $address, PDO::PARAM_STR);

      // Variables and Values
      $name = "Rohan";
      $roll = 106;
      $address = "Kolkata";

      // Execute Prepared Statement
      $result->execute();

          // We can write another variable and value set then execute statement.
          // It will insert another row with new value for example: -
        /*
        // Another Variables and values set
            $name = "Veeru";
			$roll = 109;
			$address = "Ranchi";
    
        // Execute Prepared Statement
        $result->execute();
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