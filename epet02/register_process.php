<?php
include 'db.php';

$conn = $GLOBALS['conn']; // Access the database connection from db.php

$fname = $_POST['registerFirstname'];
$mname = $_POST['registerMiddlename'];
$lname = $_POST['registerLastname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$u_status = $_POST['u_status'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$hno = $_POST['hno'];
$st = $_POST['st'];
$brgy = $_POST['brgy'];


$username = $_POST['registerUsername'];
$password = $_POST['registerPassword'];
$userType = $_POST['registerUserType'];

$query = "INSERT INTO users (first_name,middle_name,last_name,age,gender,u_status,email,phone,hno,st,brgy,username, password, usertype)
 VALUES ('$fname','$mname','$lname','$age','$gender','$u_status','$email','$phone','$hno','$st','$brgy','$username', '$password', '$userType')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Registration successful');</script>";
    echo "<script>window.location.href='login.php';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
