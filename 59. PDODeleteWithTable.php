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

  // Delete Data
  if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM student WHERE id = {$_REQUEST['id']}";
  $affected_row = $conn->exec($sql);
  echo $affected_row . " Row Deleted Successfully <br>";
    }
}
 
 catch(PDOException $e) {
  echo "Connection Failed " . $e->getMessage();
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
            $sql = "SELECT * FROM student";
            $result = $conn->query($sql);
            if($result->rowCount() > 0){
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
              while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  echo "<tr>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["name"] . "</td>";
                  echo "<td>" . $row["roll"] . "</td>";
                  echo "<td>" . $row["address"] . "</td>";
                  echo '<td><form action="" method="POST"><input type="hidden" name="id" value=' . $row["id"] . '><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></form></td>';
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

</html>

<?php  $conn = null; ?>