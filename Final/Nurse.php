<?php include('NurseBackend.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 400px;
      text-align: center;
    }

    .form-control {
      height: 40px; /* Updated height */
      margin-top: 10px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header" style="width: 400px">
      <h2>Sign Up</h2>
    </div>
    
    <form method="post" action="Nurse.php">
      <?php include('errors.php'); ?>
      <div class="form-group">
        <label>Social Security Number</label>
        <input type="int" class="form-control" name="ssn">
      </div>
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="fname">
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lname">
      </div>
      <div class="form-group">
        <label for="input address">Address</label>
        <input type="text" class="form-control" name="address">
      </div>
      <div class="form-group">
        <label>Birth Date</label>
        <input type="text" class="form-control" name="birthday">
      </div>
      <div class="form-group">
        <label for="input Phone">Phone</label>
        <input type="text" class="form-control" name="phone">
      </div>
      <div class="form-group">
        <label>Gender</label>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
      </div>
      <div class="form-group">
        <label for="service">Service:</label>
        <select id="service" name="service">
          <?php
          // Connect to the database
          $db = mysqli_connect('localhost', 'root', '', 'final_p');
          // Check if the connection was successful
          if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
          }
          
          // Retrieve service names and IDs from the services table
          $query = "SELECT * FROM services";
          $result = mysqli_query($db, $query);
          
          // Loop through each service and generate the selection options
          while ($row = mysqli_fetch_assoc($result)) {
            $serviceID = $row['S_id'];
            $serviceName = $row['S_name'];
            ?>
            <option value="<?php echo $serviceID; ?>"><?php echo $serviceName; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-light" style="margin-top: 20px; width: 100px;" name="signup">Sign up</button>
      </div>
    </form>
