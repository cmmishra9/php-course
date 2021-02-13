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

  // Bind Parameter to Prepared Statement
  $result->bindParam(':name', $name, PDO::PARAM_STR);
  $result->bindParam(':roll', $roll, PDO::PARAM_INT);
  $result->bindParam(':address', $address, PDO::PARAM_STR);
  $result->bindParam(':id', $id, PDO::PARAM_INT);

  // Variables and values
  $name = "Redmi";
  $roll = 200;
  $address = "kolkata";
  $id = 11;

  // Execute Prepared Statement
  $result->execute();

  echo $result->rowCount() . " Row Updated <br>";

  // Close Prepared Statement
  unset($result);

  // Close Connection
  $conn = null

?>