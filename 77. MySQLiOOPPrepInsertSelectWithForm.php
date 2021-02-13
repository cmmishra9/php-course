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

if(isset($_REQUEST['submit'])){
  // checking for empty field
  if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == "")){
    echo"<small>Fill all fields..</small><hr>";
  }
  else {
      // INSERT SQL statement
      $sql = "INSERT INTO student (name, roll, address) VALUES (?, ?, ?)";

      // Prepared Statement
      $result = $conn->prepare($sql);

      if($result) {

          // Bind Variables to Prepared Statement as Parameters
          $result->bind_param('sis', $name, $roll, $address);

          // Variables and values
          $name = $_REQUEST['name'];
          $roll = $_REQUEST['roll'];
          $address = $_REQUEST['address'];

          // Execute Prepared statement
          $result->execute();

        // Number of row affected
        echo $result->affected_rows . " Row Inserted <br>" ;
      }
      // close prepared statement
      $result->close();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <title>saminfratech</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" class="form-control" name="roll" id="roll">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
      <div class="col-sm-6 offset-sm-2">
        <?php
         // SELECT All Data
         $sql = "SELECT * FROM student";

         // Prepared Statement
         $result = $conn->prepare($sql);

         // Bind Result set in variables
         $result->bind_result($id, $name, $roll, $address);

         // Execute Prepared statement
         $result->execute();
 
         // Store Result 
         $result->store_result();

         if($result->num_rows > 0){
           echo '<table class="table">';
             echo "<thead>";
               echo "<tr>";
                 echo "<th>ID</th>";
                 echo "<th>Name</th>";
                 echo "<th>Roll</th>";
                 echo "<th>Address</th>";
               echo "</tr>";
             echo "</thead>";
             echo "<tbody>";
              // Fetch all table data
              while($result->fetch()){
                 echo "<tr>";
                 echo "<td>" . $id . "</td>";
                 echo "<td>" . $name . "</td>";
                 echo "<td>" . $roll . "</td>";
                 echo "<td>" . $address . "</td>";
                 echo "</tr>";
               }
            echo "</tbody>";
            echo "</table>";
             } else {
               echo "0 Results";
         }
          ?>
        </tbody>
        </table>
      </div>
    </div>
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
  $result->close();

  // Close Connection
  $conn->close();
?>

</html>