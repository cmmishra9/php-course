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

    // Update SQL statement
    $sql = "UPDATE student SET name = ?, roll = ?, address = ? WHERE id= ?";
    
    // Prepare Statement
    $result = mysqli_prepare($conn, $sql);

    if($result) {
        // Bind Variables to Prepare Statement as Parameters
        mysqli_stmt_bind_param($result, 'sisi', $name, $roll, $address, $id);

        // Variables and values
        $name = "Redmi";
        $roll = 200;
        $address = "Mumbai";
        $id = 1;

        // Execute Prepared Statement
        mysqli_stmt_execute($result);

        echo mysqli_stmt_affected_rows($result) . "Row Updated <br>" ;
    }

    // close prepared statement
    mysqli_stmt_close($result);

    // Close Connection
    mysqli_close($conn);

?>