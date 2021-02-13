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

// Bind Result set in variables
$result->bind_result($id, $name, $roll, $address);

// Execute Prepared statement
$result->execute();

// Fetch Single row data
$result->fetch();
echo "ID: " . $id . " Name: " . $name . " Roll: " . $roll . " Address: " . $address . "<br><br>";

// Fetch all table data
while($result->fetch()){
  echo "ID: " . $id . " Name: " . $name . " Roll: " . $roll . " Address: " . $address . "<br><br>";
}



/*
// SELECT with WHERE
$sql = "SELECT * FROM student WHERE id = ?";

// Prepare Statement
$result = $conn->prepare($sql);

// Bind parameter
$result->bind_param('i', $id);

$id = 1;

// Bind Result set in variables
$result->bind_result($id, $name, $roll, $address);

// Execute statement
$result->execute();

// Fetch Single row data
$result->fetch();
echo "ID: " . $id . " Name: " . $name . " Roll: " . $roll . " Address: " . $address . "<br><br>";
*/

// close prepared statement
$result->close();

// Close Connection
$conn->close();

?>