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

if(isset($_REQUEST['delete'])){
     // DELETE SQL statement
     $sql = "DELETE FROM student WHERE id= ?";

     // Prepare Statement
     $result = mysqli_prepare($conn, $sql);
 
     if($result) {
         // Bind Variables to Prepare Statement as Parameters
         mysqli_stmt_bind_param($result, 'i', $id);
 
         // Variables and values
         $id = $_REQUEST['id'];
 
         // Execute Prepared Statement
         mysqli_stmt_execute($result);
 
         echo mysqli_stmt_affected_rows($result) . " Row Deleted <br>" ;
     }
    // close prepared statement
    mysqli_stmt_close($result);
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>saminfratech</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <?php
         // SELECT All Data
         $sql = "SELECT * FROM student";

         // Prepare Statement
         $result = mysqli_prepare($conn, $sql);

         // Bind Result set in variables
         mysqli_stmt_bind_result($result, $id, $name, $roll, $address);

         // Execute statement
         mysqli_stmt_execute($result);
 
         // Store Result 
         mysqli_stmt_store_result($result);

         if(mysqli_stmt_num_rows($result) > 0){
            echo '<table class="table">';
              echo "<thead>";
                echo "<tr>";
                  echo "<th>ID</th>";
                  echo "<th>Name</th>";
                  echo "<th>Roll</th>";
                  echo "<th>Address</th>";
                  echo "<th>Action</th>";
                echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
                // Fetch all table data
                while(mysqli_stmt_fetch($result)){
                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $name . "</td>";
                    echo "<td>" . $roll . "</td>";
                    echo "<td>" . $address . "</td>";
                    echo '<td><form action="" method="POST"><input type="hidden" name="id" value='.$id.'  ><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></form></td>';
                    echo "</tr>";
                  
                }
            echo "</tbody>";
            echo "</table>";
          } else {
              echo "0 Results";
          }
          ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
<?php 
    // close prepared statement
    mysqli_stmt_close($result);

    // Close Connection
    mysqli_close($conn);
?>

</html>