<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "burgerkitten";

// Create connection
$conn = new mysqli( $servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$u0=$_POST["j"];
$u1=$_POST["www"];
$u2=$_POST["l"];
// $u3=$_POST["m"];
// $u4=$_POST["n"];
// $u5=$_POST["o"];
// $u6=$_POST["p"];

$sql = "UPDATE traval SET Destination='$u0' , Airport='$u2' WHERE NIC ='$u1'";



if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


?>