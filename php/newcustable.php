<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "burgerkitten";

$conn = new mysqli( $servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$p=$_POST["Full_Name"];
$q=$_POST["Email"];
$w=$_POST["Password"];
$r=$_POST["Telephone_No"];


// insert data

$sql = "INSERT INTO `newcustable`(Full_Name,Email,Password,Telephone_No)
VALUES ('$p','$q', '$w','$r')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location:newcusaccmadealert.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



  //  else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }

  // $sql = "SELECT Full_Name,Email,Password,Telephone_No FROM newcustable";
  // $result = $conn->query($sql);
   
//   if ($result->num_rows > 0) {
   
//     while($row = $result->fetch_assoc()) {
//         echo "Your account Made Successfully!" ."<br>";
//         // echo "Email,:" .$row["Email,"]."<br>";
//         // echo "Password:" .$row["Password"]."<br>";
//         // echo "Telephone_No:" .$row["Telephone_NO"]."<br>";
       

//     }
// } else {
//   echo "0 results";
// }
$conn->close();
?>
       
    