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

// Prepared Statement
$result = mysqli_prepare($conn, $sql);

// Execute Prepared statement
mysqli_stmt_execute($result);

// Store Result 
mysqli_stmt_store_result($result);

// Number of rows
$total_row = mysqli_stmt_num_rows($result);

echo $total_row ;

// Free Result 
mysqli_stmt_free_result($result);

// close prepared statement
mysqli_stmt_close($result);

// Close Connection
mysqli_close($conn);

?>