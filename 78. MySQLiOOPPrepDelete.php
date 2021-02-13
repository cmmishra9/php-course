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

// DELETE SQL statement
$sql = "DELETE FROM student WHERE id= ?";

// Prepared Statement
$result = $conn->prepare($sql);

if($result) {

    // Bind Variables to Prepared Statement as Parameters
    $result->bind_param('i', $id);

    // Variables and values
    $id = 2;

    // Execute Prepared statement
    $result->execute();

  // Number of row affected
  echo $result->affected_rows . " Row Deleted <br>" ;
}

  // close prepared statement
  $result->close();

  // Close Connection
  $conn->close();

?>