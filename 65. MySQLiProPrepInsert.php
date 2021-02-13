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

// INSERT SQL statement
$sql = "INSERT INTO student (name, roll, address) VALUES (?, ?, ?)";

// Prepared Statement
$result = mysqli_prepare($conn, $sql);

if($result) {
    // Bind Variables to Prepared Statement as Parameters
    mysqli_stmt_bind_param($result, 'sis', $name, $roll, $address);

    // Variables and values
    $name = "Soni";
    $roll = 108;
    $address = "Kolkata";

    // Execute Prepared Statement
    mysqli_stmt_execute($result);

    // We can write another variable and value set then execute statement.
    // It will insert another row with new value for example: -
    /*
        // Another Variables and values set
            $name = "Veeru";
			$roll = 109;
			$address = "Ranchi";
    
        // Execute Prepared Statement
        mysqli_stmt_execute($result);
    */

    echo mysqli_stmt_affected_rows($result) . "Row Inserted <br>" ;
}

   // close prepared statement
   mysqli_stmt_close($result);

   // Close Connection
   mysqli_close($conn);
?>