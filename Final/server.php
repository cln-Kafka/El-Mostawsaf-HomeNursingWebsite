<?php
session_start();

// Function to validate a password
function validatePassword($password) {
    // Check for at least one uppercase letter, one lowercase letter, and one number
    return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/', $password);
}

// Initializing variables
$fname = "";
$lname = "";
$email = "";
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
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $bd = mysqli_real_escape_string($db, $_POST['birthday']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);

    // Form validation: ensure that the form is correctly filled
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($fname)) {
        array_push($errors, "First Name is required");
    }
    if (empty($lname)) {
        array_push($errors, "Last Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone Number is required");
   
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }
    if (empty($gender)) {
        array_push($errors, "Gender is required");
    }
    if (empty($pass)) {
        array_push($errors, "Password is required");
    }
    if (empty($bd)) {
        array_push($errors, "Birthday is required");
   
    }

    if (strlen($pass) < 8) {
        array_push($errors, "Password must be at least 8 characters");
    }
    if (!validatePassword($pass)) {
        array_push($errors, "Password must contain upper and lower case letters and numbers");
    }

    // First, check the database to make sure a user does not already exist with the same email
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user && $user['email'] === $email) {
        array_push($errors, "Email already exists");
    }

    // Finally, register the user if there are no errors in the form
    if (count($errors) == 0) {
        // Hash the password using bcrypt or Argon2 instead of MD5
        $password = md5($pass);

        $query = "INSERT INTO users (first_name, last_name, email, password, address, phone_no, birthday, gender)
                  VALUES ('$fname', '$lname', '$email', '$password', '$address', '$phone', '$bd', '$gender')";
        mysqli_query($db, $query);

        $_SESSION['email'] = $email;
        header('location: Homepage.php');
        exit();
    }
}

if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);

        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
            header('location: Homepage.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  foreach ($errors as $error) {
    echo $error . "<br>";
}
?>