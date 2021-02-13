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
$sql = "DELETE FROM student WHERE id = 5";
if($conn->query($sql) === TRUE){
  echo "Record Deleted Successfully";
  } else {
    echo "Unable to Delete Data";
  }
$conn->close();
?>