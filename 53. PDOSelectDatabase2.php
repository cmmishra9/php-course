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
  // foreach($result as $row) {
  //  echo "<pre>" , print_r($row) , "</pre>";
  //  }

   // foreach($result as $row) {
   //  echo " ID: " . $row['id'] . " Name: " . $row['name'] . " Roll: " . $row['roll'] . " Address " . $row['address'] . "<br> <br>";
   // }

  //  foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row){
  //   echo "<pre>" , print_r($row) , "</pre>";
  // }

  foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row){
    echo " ID: " . $row['id'] . " Name: " . $row['name'] . " Roll: " . $row['roll'] . " Address " . $row['address'] . "<br> <br>";
  }


 
?>