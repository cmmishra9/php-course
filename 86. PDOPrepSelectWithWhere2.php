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
      // $sql = "SELECT * FROM student WHERE id = ? && name=?";

      // Using Named Parameter
      // $sql = "SELECT * FROM student WHERE id = :id";
      // $sql = "SELECT * FROM student WHERE id = :id && name= :name";

      // Prepared Statement
      $result = $conn->prepare($sql);

      // Execute Prepared statement (Positional Paramter)
      $result->execute([6]);
      // $result->execute([6, 'Soni']);

      
      // Execute Prepared statement (Named Paramter)
      // $result->execute(array(':id' => 6));
      // $result->execute(array(':id' => 6, ':name' => 'Soni'));


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