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

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    echo " id: " . $row["id"]. " Name: " . $row["name"]. " Roll: " . $row["roll"]. " Address: " . $row["address"]. "<br>";
  }
} else {
  echo "0 Results";
}

mysqli_close($conn);
?>