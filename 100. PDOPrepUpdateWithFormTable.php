<?php
// create variable for connection
$dsn = "mysql:host=localhost; dbname=test_db";
$db_user = "root";
$db_password = "";

// Create Connection with exception handling
try {
 $conn = new PDO($dsn, $db_user, $db_password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "Connected <br><hr>";
}
catch(PDOException $e) {
 echo "Connection Failed " . $e->getMessage();
}

if(isset($_REQUEST['update'])){
  // checking for empty field
  if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == "")){
    echo"<small>Fill all fields..</small><hr>";
  }
  else {
  // Using Named Placeholder
  $sql = "UPDATE student SET name = :name, roll = :roll, address = :address WHERE id= :id";

  // Prepared Statement
  $result = $conn->prepare($sql);

  // Bind Parameter to Prepared Statement
  $result->bindParam(':name', $name, PDO::PARAM_STR);
  $result->bindParam(':roll', $roll, PDO::PARAM_INT);
  $result->bindParam(':address', $address, PDO::PARAM_STR);
  $result->bindParam(':id', $id, PDO::PARAM_INT);

  // Variables and values
  $name = $_REQUEST['name'];
  $roll = $_REQUEST['roll'];
  $address = $_REQUEST['address'];
  $id = $_REQUEST['id'];

  // Execute Prepared Statement
  $result->execute();

  echo $result->rowCount() . " Row Updated <br>";

  // Close Prepared Statement
  unset($result);
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
  <title>SIPL</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <?php 
            if(isset($_REQUEST['edit'])){
                // SELECT with WHERE
                $sql = "SELECT * FROM student WHERE id = :id";

                // Prepare Statement
                $result = $conn->prepare($sql);

                // Bind parameter
                $result->bindParam(':id', $id);

                $id = $_REQUEST['id'];

                // Execute statement
                $result->execute();

                // Fetch Single row data
                $row = $result->fetch(PDO::FETCH_ASSOC);

                // Close Prepared Statement
                unset($result);
               
            }
        ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($row['name'])){ echo $row['name'];} ?>">
          </div>
          <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" class="form-control" name="roll" id="roll" value="<?php if(isset($row['roll'])){echo $row['roll'];} ?>">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php if(isset($row['address'])){ echo $row['address'];} ?>">
          </div>
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <button type="submit" class="btn btn-success" name="update">Update</button>
        </form>

      </div>
      <div class="col-sm-6 offset-sm-2">
        <?php
                // SELECT All Data
                $sql = "SELECT * FROM student";

                // Prepared Statement
                $result = $conn->prepare($sql);

                // Execute Prepared statement
                $result->execute();

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
                        // Fetch all table data
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['roll'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo '<td><form action="" method="POST"><input type="hidden" name="id" value=' . $row["id"] . '><input type="submit" class="btn btn-sm btn-warning" name="edit" value="Edit"></form></td>';
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "0 Results";
                    }
          ?>
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

  // Close Prepared Statement
  unset($result);

  // Close Connection
  $conn = null
?>

</html>