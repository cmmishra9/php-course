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

// Update SQL statement
$sql = "UPDATE student SET name = ?, roll = ?, address = ? WHERE id= ?";

// Prepared Statement
$result = $conn->prepare($sql);

if($result) {

    // Bind Variables to Prepared Statement as Parameters
    $result->bind_param('sisi', $name, $roll, $address, $id);

    // Variables and values
    $name = "Redmi";
    $roll = 200;
    $address = "kolkata";
    $id = 1;

    // Execute Prepared statement
    $result->execute();

    // Number of row affected
    echo $result->affected_rows . " Row Updated <br>" ;
}

  // close prepared statement
  $result->close();

  // Close Connection
  $conn->close();

?>