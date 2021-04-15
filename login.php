<?php

$email = $_POST['email'];
$password = $_POST['password'];

if (!$email){

  
  include ('login.html');
  exit;
}


$dbservername = "127.0.0.1";
$dbuser = "reyhan";
$dbpassword = "Reyhan-2021#";
$dbname = "reyhan";

// Create connection
$conn = new mysqli($dbservername, $dbuser, $dbpassword, $dbname, 3307);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login where email='$email' and password='$password'";
$result = $conn->query($sql);
$dataReturn = [];
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
    $dataReturn['status'] = 1;
    $dataReturn['message'] = "Selamat datang ".$row["name"];
    break;
  }
} else {
  $dataReturn['status'] = 0;
  $dataReturn['message'] = "Wrong email or password!";
}


//echo "Connected successfully";

$conn->close();
echo json_encode($dataReturn);
?>




