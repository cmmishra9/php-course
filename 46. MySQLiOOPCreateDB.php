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
$sql = "CREATE DATABASE newoop_db";
if($conn->query($sql) === TRUE){
echo "DataBase Created Successfully";
} else {
  echo "Unable to Create Database";
}
$conn->close();
?>