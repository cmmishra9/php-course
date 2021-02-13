<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";

// Create Connection
// When you create database do not specify database name here
$conn = mysqli_connect($db_host, $db_user, $db_password);

// Check Connection
if(!$conn){
  die("Connection Failed");
}
echo "Connected Succefully <hr>";

  $sql = "CREATE DATABASE new_db";
  if(mysqli_query($conn, $sql)){
    echo "Database Created Successfully";
  } else { 
	echo "Unable to Create Database"; 
  }
?>