<?php
// create variable for connection
 $dsn = "mysql:host=localhost; dbname=test_db";
 $db_user = "root";
 $db_password = "";
 
 // Create Connection with exception handling
 try {
  $conn = new PDO($dsn, $db_user, $db_password);

  // Set Error Mode
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected <hr><br>";
 }
 catch(PDOException $e) {
  echo "Connection Failed " . $e->getMessage();
 }

 $sql = "SELECT * FROM student";
 $result = $conn->query($sql);
 // $row = $result->fetch();
 // echo "<pre>" , print_r($row) , "</pre>";
if($result->rowCount() > 0) {
 while($row = $result->fetch(PDO::FETCH_ASSOC)){
  echo " ID: " . $row['id'] . " Name: " . $row['name'] . " Roll: " . $row['roll'] . " Address " . $row['address'] . "<br> <br>";
 }
} else {
 echo "0 Records";
}

 
?>