<?php
// Check Available Driver
print_r(PDO::getAvailableDrivers());

/**
 *  Array (
 *      [0] => mysql
 *      [1] => sqlite 
 * )
 */

  try {
      if(!in_array("mysql", PDO::getAvailableDrivers(), true)){
         throw new PDOException("Cannot connect to mysql db"); 
      }
}catch (PDOException $e){
    echo "Database Error .. Details: <br>";
}
?>