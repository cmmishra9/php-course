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
$sql = "INSERT INTO student (name, roll, address) VALUES('Aam', '120', 'Mumbai')";
if($conn->query($sql) === TRUE){
  echo "Record Inserted Successfully";
} else {
  echo "Unable to Insert Data";
}
$conn->close();
?>