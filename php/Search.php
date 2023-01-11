<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "burgerkitten";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Search Data
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['bt-search'])) {
      $result = searchData($conn);

  ?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Full_Name:</label> <input type='text' name="Full_Name" value='<?php echo "$result[0]" ?>'><br><br>
        <label>Email:</label> <input type='text' name="Email" value='<?php echo "$result[1]" ?>'><br><br>
        <label>Password:</label> <input type='text' name="Password" value='<?php echo "$result[2]" ?>'><br><br>
        <label>Telephone_No:</label> <input type='number' name="Telephone_No" value='<?php echo "$result[3]" ?>'><br><br>
        <label>Your_Message:</label> <input type='text' name="Your_Message" value='<?php echo "$result[4]" ?>'><br><br>

        <button type="submit" name="bt-update">Update</button>
        <button type="submit" name="bt-delete">Delete</button>

      </form>

  <?php
    }
  }
?>


<?php
  if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Update Data
    if (isset($_POST['bt-update'])) {
      $a = $_POST["Full_Name"];
      $b = $_POST["Email"];
      $c = $_POST["Password"];
      $d = $_POST["Telephone_No"];
      $e = $_POST["Your_Message"];

      updateData($a, $b, $c, $d, $e, $conn);
    }

    // Delete Data
    if (isset($_POST['bt-delete'])) {
      $a = $_POST["Full_Name"];

      DeleteData($a, $conn);
    }

    $conn->close();
  }


  // Search Data - Function
  function searchData($conn)
  {
    $searchData = array();
    $z = $_POST['seh'];

    $sql = "SELECT `Full_Name`,`Email`,`Password`,`Telephone_No`,`Your_Message` FROM `ordertable` where `Full_Name` LIKE '%$z%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        $a = $row["Full_Name"];
        $b = $row["Email"];
        $c = $row["Password"];
        $d = $row["Telephone_No"];
        $e = $row["Your_Message"];

        $searchData[0] = "$a";
        $searchData[1] = "$b";
        $searchData[2] = "$c";
        $searchData[3] = "$d";
        $searchData[4] = "$e";
      }
    } else {
      echo "<h1>0 results</h1>";
      exit();
    }
    return $searchData;
  }

  function updateData($a, $b, $c, $d, $e, $conn)
  {
    $sql = "UPDATE `ordertable` SET `Email`='$b',`Password`='$c',`Telephone_No`='$d',`Your_Message`='$e' WHERE `Full_Name` LIKE '$a'";

    if ($conn->query($sql) == TRUE) {
      echo "Record Updated Successfully";
    } else {
      echo "Error Updating Record : " . $conn->error;
      exit();
    }
  }

  function DeleteData($a, $conn)
  {
    $sql = "DELETE FROM `ordertable` WHERE `Full_Name`='$a'";
    if ($conn->query($sql) == TRUE) {
      echo "Record Deleted Successfully";
    } else {
      echo "Error Deleting Record : " . $conn->error;
      exit();
    }
  }
  ?>

</body>

</html>