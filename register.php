<?php

session_start();

$con = mysqli_connect('127.0.0.1','reyhan','Reyhan-2021#', 'reyhan', 3307);



$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$date = date('Y-m-d h:i:s');

// pengecekan email sudah ada atau belon
$s = "SELECT * FROM login where email='$email'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

$dataReturn = [];
if($num == 1){ // jika sudah ada email maka rubah data display name
    $dataReturn['status'] = 0;
    //$dataReturn['message'] = "Email ALready Taken!";

    $reg = "UPDATE login SET name = '$name' WHERE email = '$email'; ";
    
    $result = mysqli_query($con, $req);
    $dataReturn['message'] = "Name updated!v";
}else{ // tambah ke table
    $dataReturn['status'] = 1;
    $reg= "INSERT INTO login (email , password, name, createdAt) VALUES  ('$email' , '$password', '$name', '$date');";
    //die($reg);
    $result = mysqli_query($con, $reg);
    //var_dump($reg, $result, mysqli_error($con), $con); die();
    $dataReturn['message'] = "Registration Succesful";
}
echo json_encode($dataReturn);