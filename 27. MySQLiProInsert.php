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
echo "Connected successfully <hr>";

$sql = "INSERT INTO student (name, roll, address) VALUES ('Sonam', '103', 'Kolkata')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Unable to Insert Data";
}

mysqli_close($conn);
?>