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

    // DELETE SQL statement
    $sql = "DELETE FROM student WHERE id= ?";

    // Prepare Statement
    $result = mysqli_prepare($conn, $sql);

    if($result) {
        // Bind Variables to Prepare Statement as Parameters
        mysqli_stmt_bind_param($result, 'i', $id);

        // Variables and values
        $id = 21;

        // Execute Prepared Statement
        mysqli_stmt_execute($result);

        echo mysqli_stmt_affected_rows($result) . "Row Deleted <br>" ;
    }

	// close prepared statement
	mysqli_stmt_close($result);

	// Close Connection
	mysqli_close($conn);
 
?>