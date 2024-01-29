<?php
session_start();


// Initializing variables
$ssn = "";
$fname = "";
$lname = "";
$bd = "";
$phone = "";
$address = "";
$gender = "";
$errors = array();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'final_p');
// Check if the connection was successful
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['signup'])) {
    // Receive all input values from the form
    $ssn = mysqli_real_escape_string($db, $_POST['ssn']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $bd = mysqli_real_escape_string($db, $_POST['birthday']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);

    // Form validation: ensure that the form is correctly filled
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($ssn)) {
        array_push($errors, "Social Security Number is required");
    }
    if (strlen($ssn) != 14) {
        array_push($errors, "Social Security Number must be 14 Number");
    }
    if (empty($fname)) {
        array_push($errors, "First Name is required");
    }
    if (empty($lname)) {
        array_push($errors, "Last Name is required");
    }
   
    if (empty($phone)) {
        array_push($errors, "Phone Number is required");
    } elseif (!preg_match('/^01[0-9]{9}$/', $phone)) {
        array_push($errors, "Phone Number is invalid. It should start with '01' and be 11 digits long.");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }

    if (empty($bd)) {
        array_push($errors, "Birthday is required");
    } elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $bd)) {
        array_push($errors, "Birthday is invalid. Please use the format 'dd/mm/yyyy'.");
    }



    // First, check the database to make sure a user does not already exist with the same ssn
    $nurse_check_query = "SELECT * FROM nurse WHERE ssn='$ssn' LIMIT 1";
    $result = mysqli_query($db, $nurse_check_query);
    $nurse = mysqli_fetch_assoc($result);

    if ($nurse && $nurse['ssn'] === $ssn) {
        array_push($errors, "Nurse already exists");
    }

    // Finally, register the user if there are no errors in the form
   // Finally, register the user if there are no errors in the form
if (count($errors) == 0) {
    // Get the selected service ID from the form
    $serviceID = mysqli_real_escape_string($db, $_POST['service']);

    $query = "INSERT INTO nurse (ssn, first_name, last_name, address, phone, birthday, gender, service_id)
              VALUES ('$ssn', '$fname', '$lname', '$address', '$phone', '$bd', '$gender', '$serviceID')";
    mysqli_query($db, $query);

    header('location: Nurse.php');
    exit();
    }

}