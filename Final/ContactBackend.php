<?php
include('server.php');

// Check if the user is logged in
// if (!isset($_SESSION['email'])) {
//   // Redirect to the login page or display an error message
//   header('Location: Homepage.php');
//   exit();
// }

// Initialize the errors array
$errors = array();

// Process the contact message form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $message = mysqli_real_escape_string($db, $_POST['message']);

  // Form validation: ensure that the message is not empty
  if (empty($message)) {
    $errors[] = "Message is required";
  }

  // If there are no errors, save the message in the database
  if (empty($errors)) {
    $user_email = $_SESSION['email'];

    // Get the user ID based on the email
    $user_query = "SELECT * FROM users WHERE email='$user_email' LIMIT 1";
    $user_result = mysqli_query($db, $user_query);
    $user = mysqli_fetch_assoc($user_result);
    $user_id = $user['id'];
    $name = $user['first_name'] . ' ' . $user['last_name'];

    // Save the message in the database
    $query = "INSERT INTO contact (user_id, name , message) VALUES ('$user_id', '$name' ,'$message')";
    mysqli_query($db, $query);

    // Redirect to a success page or display a success message
    header('Location: Homepage.php');
    exit();
  }
}
?>
