<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "test_db";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if($conn->connect_error){
  die("Connection Failed");
}
echo "Connected Successfully <hr>";

// SELECT All Data
$sql = "SELECT * FROM student";

// Prepared Statement
$result = $conn->prepare($sql);

// Execute Prepared statement
$result->execute();

// Store Result 
$result->store_result();

// Number of Rows
echo $result->num_rows;

// Free Result
$result->free_result();

// Close prepared statement
$result->close();

// Close Connection
$conn->close();

?>