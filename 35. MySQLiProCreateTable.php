<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "new_db";

// Create Connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check Connection
if(!$conn){
  die("Connection Failed");
}
echo "Connected Successfully <hr>";

  $sql = "CREATE TABLE new_tab (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255),
          roll INT,
          address TEXT
  )";
  if(mysqli_query($conn, $sql)){
    echo "Table Created Successfully";
  } else { 
    echo "Unable to Create Table"; 
  }
?>