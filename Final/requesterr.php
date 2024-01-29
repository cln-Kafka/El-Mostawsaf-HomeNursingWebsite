<?php
// Assuming $errors is the array containing the error messages

foreach ($errors as $nameNurse => $nurseErrors) {
    echo "Errors for Nurse Name: $nameNurse<br>";
    foreach ($nurseErrors as $error) {
        echo "- $error<br>";
    }
    echo "<br>";
}
?>