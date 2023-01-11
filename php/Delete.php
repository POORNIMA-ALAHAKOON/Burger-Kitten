<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";

// Create connection
$conn = new mysqli( $servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$z=$_POST['www'];
// sql to delete a record

$sql = "DELETE FROM traval WHERE NIC ='$z'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>