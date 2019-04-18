<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Homework 2</title>
    <?php
$servername = "localhost";
$username = "schupp";
$password = "W53ZoOVSXmQk";
$dbname = "myguest";
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
  </head>
  <body>
    <div class="jumbotron" style="background-color: black;">
      <h1 style="font-family: 'Cinzel', serif; color:lightblue; text-align: center;">JaxCode Camp - Homework 2</h1>
      <p style="font-family: 'Cinzel', serif; color:lightblue; text-align: center;">Lesson 8 - section 1.</p>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-12">


    <?php
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>

    <form class="form-group" action="index.php" method="post">
      First Name: <input type="text" name="firstname" required><br>
      Last Name: <input type="text" name="lastname" required><br>
      Email Address: <input type="email" name="email" required><br>
      <input type="submit" name="newrecord">
    </form>

    <?php
      if(isset($_POST['newrecord'])){
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "INSERT INTO guest (firstname, lastname, email) VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}','{$_POST['email']}')";

        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
          ?><div class="alert alert-success">
  <strong>Success!</strong> Indicates a successful entry.
</div><?
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }



      // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM guest";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Reg Date</th>
        </tr>
          <?
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'.$row['id']. '</td>';
                echo '<td>'.$row['firstname']. '</td>';
                echo '<td>'.$row['lastname']. '</td>';
                echo '<td>'.$row['email']. '</td>';
                echo '<td>'.$row['reg_date']. '</td>';
                echo '</tr>';

            }

            ?>
          </table>
    </div>
          <?
      } else {
          echo "0 results";
      }


      mysqli_close($conn);
      ?>
          <br><br>
        </div>
      </div>
    </div>
        </body>
      </html>
