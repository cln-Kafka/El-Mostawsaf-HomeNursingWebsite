<?php
session_start();


// Initializing variables
$sname = "" ;
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
    $sname = mysqli_real_escape_string($db, $_POST['service']);
    

    // Form validation: ensure that the form is correctly filled
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($sname)) {
        array_push($errors, "Service Name is required");
    }
    


    // First, check the database to make sure a user does not already exist with the same ssn
    // $nurse_check_query = "SELECT * FROM nurse WHERE ssn='$ssn' LIMIT 1";
    // $result = mysqli_query($db, $nurse_check_query);
    // $nurse = mysqli_fetch_assoc($result);

    // if ($nurse && $nurse['ssn'] === $ssn) {
    //     array_push($errors, "Nurse already exists");
    // }

    // Finally, register the user if there are no errors in the form
    if (count($errors) == 0) {
        

        $query = "INSERT INTO services ( S_name )
                  VALUES ('$sname')";
        mysqli_query($db, $query);

        header('location: Addservice.php');
        exit();
    }
}