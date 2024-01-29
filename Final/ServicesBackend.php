<?php
include('server.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // Redirect to the login page or display an error message
  header('Location: Login-signup.php');
  exit();
}

$errors = array();

// Process the contact message form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['request'])) {
        // Handle the request form submission
        $startTime = mysqli_real_escape_string($db, $_POST['start-time']);
        $endTime = mysqli_real_escape_string($db, $_POST['end-time']);
        $day = mysqli_real_escape_string($db, $_POST['day']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        if (isset($_POST['nurse-ssn'])) {
        $nurseSsn = mysqli_real_escape_string($db, $_POST['nurse-ssn']);
        }
        if (isset($_POST['nurse-name'])) {
            $nameNurse = mysqli_real_escape_string($db, $_POST['nurse-name']);
        }
        
        // Form validation: ensure that the fields are not empty
        if (empty($startTime)) {
            $errors[$nameNurse][] = "Start Time is required";
        }
        
        if (empty($endTime)) {
            $errors[$nameNurse][] = "End Time is required";
        }
        
        if (empty($day)) {
            $errors[$nameNurse][] = "Day is required";
        }
        
        if ($startTime === $endTime) {
            $errors[$nameNurse][] = "Start Time and End Time cannot be the same";
        }
        
        if (empty($date)) {
            $errors[$nameNurse][] = "Date is required";
        } else {
            // Extract the day from the date
            $dayFromDateFormat = date('l', strtotime($date));
        
            // Compare the extracted day with the provided day
            if ($day !== $dayFromDateFormat) {
                $errors[$nameNurse][] = "Day must match the day in the date";
            }
        
            // Check if the start time falls within the range of start time and end time + 1 hour for the same date
            $query = "SELECT * FROM request WHERE date = '$date' AND nurse_ssn = '$nurseSsn'";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $existingStartTime = $row['start_time'];
                $existingEndTime = strtotime($row['end_time']) + 3600; // Adding 1 hour (3600 seconds) to the end time
                $requestedStartTime = strtotime($startTime);
        
                if ($requestedStartTime >= strtotime($existingStartTime) && $requestedStartTime < $existingEndTime) {
                    $errors[$nameNurse][] = "Start Time conflicts with an existing request";
                    break;
                }
            }
        }
        
        // If there are no errors, save the request in the database
        if (empty($errors)) {
            // Check if the user is logged in
            if (!isset($_SESSION['email'])) {
                echo "You must be logged in to make a request.";
                exit();
            }
            
            $user_email = $_SESSION['email'];
            
            // Get the user ID based on the email
            $user_query = "SELECT * FROM users WHERE email='$user_email' LIMIT 1";
            $user_result = mysqli_query($db, $user_query);
            $user = mysqli_fetch_assoc($user_result);
            $user_id = $user['id'];
            
            // Get the nurse SSN, name, and service ID from the database
            $nurse_query = "SELECT * FROM nurse WHERE ssn ='$nurseSsn' "; // Change the condition to match your requirement
            $nurse_result = mysqli_query($db, $nurse_query);
            $nurse = mysqli_fetch_assoc($nurse_result);
            
            $nurseName = $nurse['first_name'] . ' ' . $nurse['last_name']; // Replace with the actual code to retrieve the nurse name
            $serviceID = $nurse['service_id']; // Replace with the actual code to retrieve the service ID
            
            // Concatenate the first name and last name as the nurse name
            $name = $nurseName; // Replace with the actual code to concatenate the names
            
            // Insert the request into the database
            $query = "INSERT INTO request (user_id, nurse_ssn, nurse_name, start_time, end_time, day, date, service_id)
                      VALUES ('$user_id', '$nurseSsn', '$name', '$startTime', '$endTime', '$day', '$date', '$serviceID')";
            
            if (mysqli_query($db, $query)) {
                header('Location: services.php');
                exit();
            } else {
                $errors[] = "Failed to insert the request into the database.";
            }
        }
    } elseif (isset($_POST['rate_btn'])) {
        // Handle the rating form submission
        $rate = mysqli_real_escape_string($db, $_POST['rating']);
        if (isset($_POST['nurse-ssn'])) {
            $nurseSsn = mysqli_real_escape_string($db, $_POST['nurse-ssn']);
        }
        if (empty($rate)) {
            $errors[] = "Rating is required";
        }
        if (empty($errors)) {
            // Check if the user is logged in
            if (!isset($_SESSION['email'])) {
                echo "You must be logged in to rate.";
                exit();
            }
            
            $user_email = $_SESSION['email'];
            
            // Get the user ID based on the email
            $user_query = "SELECT * FROM users WHERE email='$user_email' LIMIT 1";
            $user_result = mysqli_query($db, $user_query);
            $user = mysqli_fetch_assoc($user_result);
            $user_id = $user['id'];
            
            // Get the nurse SSN, name from the database
            $nurse_query = "SELECT * FROM nurse WHERE ssn ='$nurseSsn' "; // Change the condition to match your requirement
            $nurse_result = mysqli_query($db, $nurse_query);
            $nurse = mysqli_fetch_assoc($nurse_result);
            
            $nurseName = $nurse['first_name'] . ' ' . $nurse['last_name']; // Replace with the actual code to retrieve the nurse name
            
            // Concatenate the first name and last name as the nurse name
            $name = $nurseName; // Replace with the actual code to concatenate the names
            
            // Insert the rating into the database
            $query = "INSERT INTO rating (user_id, nurse_ssn, nurse_name, rating)
                      VALUES ('$user_id', '$nurseSsn', '$name' ,'$rate')";
            
            if (mysqli_query($db, $query)) {
                // Calculate and update the average rating for the nurse
                $averageRatingQuery = "UPDATE nurse SET rating = (
                    SELECT AVG(rating) FROM rating WHERE nurse_ssn = '$nurseSsn'
                ) WHERE ssn = '$nurseSsn'";
                mysqli_query($db, $averageRatingQuery);
                header('Location: services.php');
                exit();
            } else {
                $errors[] = "Failed to insert the rating into the database.";
            }
        }
    }
}
?>
