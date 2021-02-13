<?php

 // Create Connection
 $conn = new PDO("mysql:host=localhost; dbname=test_db", "root", "");

 // check connection
 if($conn){
  echo "Connected";
 }
?>