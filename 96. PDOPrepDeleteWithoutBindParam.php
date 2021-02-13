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
$sql = "DELETE FROM student WHERE id= :id";

// Prepared Statement
$result = $conn->prepare($sql);

// Variables and Values
$id = 6;

// Execute Prepared Statement
$result->execute(array(':id' => $id));

echo $result->rowCount() . " Row Deleted <br>";

// Close Prepared Statement
unset($result);

// Close Connection
$conn = null

?>