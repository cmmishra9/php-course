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

  // Using Named Placeholder
  $sql = "UPDATE student SET name = :name, roll = :roll, address = :address WHERE id= :id";

  // Prepared Statement
  $result = $conn->prepare($sql);

  // Variables and values
  $name = "Redmi";
  $roll = 200;
  $address = "kolkata";
  $id = 5;

  // Execute Prepared Statement
  $result->execute(array(':name' => $name, ':roll' => $roll, ':address' => $address,':id' => $id));

  echo $result->rowCount() . " Row Updated <br>";

  // Close Prepared Statement
  unset($result);

  // Close Connection
  $conn = null

?>