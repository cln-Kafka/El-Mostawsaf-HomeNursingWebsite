<?php include ('AccountBackend.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Render all elements normally -->
    <link rel="stylesheet" href="CSS/Normalize.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400&display=swap" rel="stylesheet">
    <title>Responsive Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #079196, #61b29e);
            /* background-image: url(../images); */
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh; /* Set minimum height to fill the viewport */
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 226px;
            height: 100px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .container-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust height to fill the viewport */
            padding: 5%;
            box-sizing: border-box; /* Add this to include padding in the height calculation */
        }

        .container {
            max-width: 600px;
            width: 100%; /* Add width to fill the available space */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Add background color for the container */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button-container .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .button-container .row .col {
            flex: 0 0 calc(50% - 5px); /* Adjust the width to control the button size and margin */
            margin-right: 5px; /* Reduce the margin between buttons to 5px */
        }

        .button-container button {
            font-size: 15px;
            width: 100%;
            padding: 10px 20px;
            font-weight: 600;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button-container button.delete,
        .button-container button.cancel {
            background-color: #f5f5f5;
            color: #f52f2f;
            border: 1px solid #f52f2f;
        }

        .button-container button.delete:last-child,
        .button-container button.cancel:last-child {
            margin-right: 0; /* Remove margin from the last button in each row */
        }

        .button-container button.delete:hover,
        .button-container button.cancel:hover {
            background-color: red;
            color: white;
        }

        @media screen and (max-width: 480px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
     <a href="Homepage.php"><img src="Images/logo-small.png" alt="Logo" class="logo"></a>
    <div class="container-wrapper">
        <div class="container">
            <h2>Name</h2>
            <form method="post" action="Account.php">
            <?php include('errors.php'); ?> 
            <label for="firstName">First Name</label>
                <input type="text" name = "first_name" id="firstName" placeholder="First Name" value="<?php echo $firstName; ?>" disabled required>

                <label for="lastName">Last Name</label>
                <input type="text" name = "last_name" id="lastName" placeholder="Last Name" value="<?php echo $lastName; ?>" disabled required>

                <label for="email">Email</label>
                <input type="email" name = "email" id="email" placeholder="Email" value="<?php echo $email; ?>" disabled required>

                <label for="address">Address</label>
                <input type="text" name = "address" id="address" placeholder="Address" value="<?php echo $address; ?>" disabled required>

                <label for="password">Password</label>
                <input type="password" name = "password" id="password" placeholder="Password" value="<?php echo $password; ?>" disabled required>

                <label for="phone">Phone</label>
                <input type="text" id="phone" name = "phone_no" placeholder="Phone" value="<?php echo $phone; ?> "disabled required>

                <label for="birthday">Birth Date</label>
                <input type="text" name = "birthday" id="birthday" value="<?php echo $birthday; ?>" disabled required>
                <div class="button-container">
                    <div class="primary-options">
                        <div class="row">
                            <div class="col">
                                <button name = "delete" class="delete">Delete Account</button>
                            </div>
                            <div class="col">
                                <button class="edit">Edit</button>
                            </div>
                        </div>
                    </div>
                    <div class="secondary-options">
                        <div class="row">
                            <div class="col">
                                <button class="cancel">Cancel</button>
                            </div>
                            <div class="col">
                                <button type = "submit" name = "save" class="save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </form>
        </div>
    </div>

    <script>
        // JavaScript code
        const editButton = document.querySelector('.edit');
        const saveButton = document.querySelector('.save');
        const deleteButton = document.querySelector('.delete');
        const cancelButton = document.querySelector('.cancel');
        const inputFields = document.querySelectorAll('input');

        let originalValues = {}; // Store the original values for canceling

        editButton.addEventListener('click', () => {
            inputFields.forEach((input) => {
                input.disabled = false;
                originalValues[input.id] = input.value; // Store the original values
            });

            editButton.disabled = true; // Disable the edit button
            saveButton.disabled = false; // Enable the save button
            cancelButton.disabled = false; // Enable the cancel button
        });

        cancelButton.addEventListener('click', () => {
            inputFields.forEach((input) => {
                input.value = originalValues[input.id]; // Reset the input value to the original value
                input.disabled = true;
            });

            editButton.disabled = false; // Enable the edit button
            saveButton.disabled = true; // Disable the save button
            cancelButton.disabled = true; // Disable the cancel button
        });

        

        
    </script>

</body>
</html>