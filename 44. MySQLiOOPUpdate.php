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
  $sql = "UPDATE student SET name = 'Sameer', roll = '1001', address = 'Chennai' WHERE id = 7";
  if($conn->query($sql) === TRUE){
    echo "Record Updated Successfully";
    } else {
      echo "Unable to Update Data";
    }
$conn->close();
?>