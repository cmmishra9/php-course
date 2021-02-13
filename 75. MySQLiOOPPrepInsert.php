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

// INSERT SQL statement
$sql = "INSERT INTO student (name, roll, address) VALUES (?, ?, ?)";

// Prepared Statement
$result = $conn->prepare($sql);

if($result) {

    // Bind Variables to Prepared Statement as Parameters
    $result->bind_param('sis', $name, $roll, $address);

    // Variables and values
    $name = "Soni";
    $roll = 108;
    $address = "Kolkata";

    // Execute Prepared statement
    $result->execute();


    // We can write another variable and value set then execute statement.
    // It will insert another row with new value for example: -
    /*
        // Another Variables and values set
            $name = "Veeru";
			      $roll = 109;
			      $address = "Ranchi";
    
        // Execute Prepared Statement
        $result->execute();
    */


    // Number of row affected
    echo $result->affected_rows . " Row Inserted <br>" ;
}

// close prepared statement
$result->close();

// Close Connection
$conn->close();

?>