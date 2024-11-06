<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form submission to register owner and pets

    // Owner details
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $middlename = $_POST['middle_name'];
    $o_gender = $_POST['o_gender'];
    $o_age = $_POST['o_age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];

    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $breed = $_POST['breed'];
    $desc_breed = $_POST['desc_breed'];
    $color = $_POST['color'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $yr_mnth = $_POST['yr_mnth'];
    $status_pet = $_POST['status_pet'];
    $description = $_POST['description'];
    

    // Insert owner details into the owners table
    $insertOwnerQuery = "INSERT INTO vac_reservations (first_name,last_name,middle_name,o_gender,o_age,phone,email,house_no,street,
    barangay,pet_name,pet_type,breed,desc_breed,color,gender,age,yr_mnth,status_pet,description)
    VALUES ('$firstname','$lastname','$middlename','$o_gender','$o_age','$phone','$email','$house_no','$street','$barangay',
    '$pet_name','$pet_type','$breed','$desc_breed','$color','$gender','$age','$yr_mnth','$status_pet','$description')";
    mysqli_query($conn, $insertOwnerQuery);

    // Redirect to registration success page
    header("Location: report_lost_success.php");
    exit();
} else {
    // Redirect to registration page if accessed directly without form submission
    header("Location: report_lost_success.php");
    exit();
}
?>
