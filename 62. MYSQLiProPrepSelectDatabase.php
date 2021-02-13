<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "test_db";

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    // die("Connection failed");
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <hr> <br>";


// SELECT All Data
$sql = "SELECT * FROM student";

// Prepare Statement
$result = mysqli_prepare($conn, $sql);

// Bind Result set in variables
mysqli_stmt_bind_result($result, $id, $name, $roll, $address);

// Execute statement
mysqli_stmt_execute($result);

// Fetch Single row data
mysqli_stmt_fetch($result);
echo "ID: " . $id . " Name: " . $name . " Roll: " . $roll . " Address: " . $address . "<br><br>";

// Fetch all table data
while(mysqli_stmt_fetch($result)){
  echo "ID: " . $id . " Name: " . $name . " Roll: " . $roll . " Address: " . $address . "<br><br>";
}


/*
// SELECT with WHERE
$sql = "SELECT * FROM student WHERE id = ?";

// Prepare Statement
$result = mysqli_prepare($conn, $sql);

// Bind parameter
mysqli_stmt_bind_param($result, 'i', $id);

$id = 5;

// Bind Result set in variables
mysqli_stmt_bind_result($result, $id, $name, $roll, $address);

// Execute statement
mysqli_stmt_execute($result);

// Fetch Single row data
mysqli_stmt_fetch($result);
echo "ID: " . $id . " Name: " . $name . " Roll: " . $roll . " Address: " . $address . "<br><br>";
*/

// close prepared statement
mysqli_stmt_close($result);

// Close Connection
mysqli_close($conn);

?>