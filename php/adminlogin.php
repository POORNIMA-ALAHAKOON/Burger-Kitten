<?php
$servername = "localhost";
$Name = "root";
$Password = "";
$dbname="burgerkitten";

$conn = new mysqli($servername,$Name, $Password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
     

    // include('loginform.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from admin where username = '$username' and password1 = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            // echo "<h1><center> Login successful </center></h1>"; 
            header("location:orderform.html"); // Redirecting to other page. 
            // return.false;
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  

            echo "Please Try Again.";
            // header("location:loginform.html");
        }     

$conn->close();
?>