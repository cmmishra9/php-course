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

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"] . " Name: " . $row["name"]. " Roll: " . $row["roll"]. " Addres: " . $row['address'] . "<br>";
  } 
}else {
  echo "0 Results";
}
$conn->close();
?>