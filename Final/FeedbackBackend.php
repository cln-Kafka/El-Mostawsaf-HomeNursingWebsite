<?php
include('server.php');

// // Check if the user is logged in
// if (!isset($_SESSION['email'])) {
//   // Redirect to the login page or display an error message
//   header('Location: Login-signup.php');
//   exit();
// }

// Initialize the errors array
$errors = array();

// Process the contact message form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $comment = mysqli_real_escape_string($db, $_POST['comment']);
  $rating = mysqli_real_escape_string($db, $_POST['rating']);

  // Form validation: ensure that the message is not empty
  if (empty($comment)) {
    $errors[] = "Comment is required";
  }
  if (empty($rating)) {
    $errors[] = "Rating is required";
  }

  // If there are no errors, save the message in the database
  if (empty($errors)) {
    $user_email = $_SESSION['email'];

    // Get the user ID based on the email
    $user_query = "SELECT * FROM users WHERE email='$user_email' LIMIT 1";
    $user_result = mysqli_query($db, $user_query);
    $user = mysqli_fetch_assoc($user_result);
    $user_id = $user['id'];

    // Concatenate first_name and last_name into a single attribute called name
    $name = $user['first_name'] . ' ' . $user['last_name'];

    // Save the message in the database
    $query = "INSERT INTO feedback (user_id, name, comment, rating) VALUES ('$user_id', '$name', '$comment', '$rating')";
    mysqli_query($db, $query);

    // Redirect to a success page or display a success message
    header('Location: Feedback.php');
    exit();
  }
}

// Retrieve all feedback from the database
$feedback_query = "SELECT * FROM feedback";
$feedback_result = mysqli_query($db, $feedback_query);
$feedback_data = array();

while ($row = mysqli_fetch_assoc($feedback_result)) {
  $feedback_data[] = $row;
}

// Convert the feedback data to JSON format
$feedback_json = json_encode($feedback_data);

// Save the feedback JSON to a file (optional)
$file_path = 'feedback.json';
file_put_contents($file_path, $feedback_json);
?>
