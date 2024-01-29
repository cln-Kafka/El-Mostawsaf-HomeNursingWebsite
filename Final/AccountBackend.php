<?php
include('server.php');

// Assuming you have established a database connection
$db = mysqli_connect('localhost', 'root', '', 'final_p');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have retrieved the user ID after the login process
$email = $_SESSION['email'];

// Retrieve user data from the database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Assign the retrieved data to variables
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $email = $row['email'];
    $address = $row['address'];
    $password = $row['password'];
    $phone = $row['phone_no'];
    $birthday = $row['birthday'];
}

// Handle form submission and updates
if (isset($_POST['save'])) {
    // Retrieve the updated form data
    $newFirstName = mysqli_real_escape_string($db, $_POST['first_name']);
    $newLastName = mysqli_real_escape_string($db, $_POST['last_name']);
    $newEmail = mysqli_real_escape_string($db, $_POST['email']);
    $newAddress = mysqli_real_escape_string($db, $_POST['address']);
    $newPassword = mysqli_real_escape_string($db, $_POST['password']);
    $newPhone = mysqli_real_escape_string($db, $_POST['phone_no']);
    $newBirthDate = mysqli_real_escape_string($db, $_POST['birthday']);

    
    // Update the user data in the database
    $updateSql = "UPDATE users SET first_name = '$newFirstName', last_name = '$newLastName', email = '$newEmail', address = '$newAddress', password = '$newPassword', phone_no = '$newPhone', birthday = '$newBirthDate' WHERE email = '$email'";
    mysqli_query($db, $updateSql);

    header('Location: Account.php');
    exit; // Add exit after header to stop further execution
}
if (isset($_POST['delete'])) {
    $deleteSql = "DELETE FROM users WHERE email = '$email'";
    header('Location: Login-signup.php');
    if (mysqli_query($db, $deleteSql)) 
mysqli_close($db);
}
?>
