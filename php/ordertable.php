<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "burgerkitten";

$conn = new mysqli( $servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$a=$_POST["Full_Name"];
$b=$_POST["Email"];
$c=$_POST["Password"];
$d=$_POST["Telephone_No"];
$e=$_POST["Your_Message"];

// insert data

$sql = "INSERT INTO `ordertable`(Full_Name,Email,Password,Telephone_No,Your_Message)
VALUES ('$a','$b', '$c','$d','$e')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";


  header("location:ordertaken.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // $sql = "SELECT Full_Name,Email,Password,Telephone_No,Your_Message FROM ordertable";
  // $result = $conn->query($sql);
   
  // if ($result->num_rows > 0) {
   
  //   while($row = $result->fetch_assoc()) {
  //       echo "Record enterd successfully!" ."<br>";
        // echo "Email,:" .$row["Email,"]."<br>";
        // echo "Password:" .$row["Password"]."<br>";
        // echo "Telephone_No:" .$row["Telephone_NO"]."<br>";
        // echo "Your_Message:" .$row["Your_Message"]."<br>";

    
//     else {
//   echo "0 results";
// }
$conn->close();
?>
       
    