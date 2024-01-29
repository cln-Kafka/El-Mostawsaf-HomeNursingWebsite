<?php include('ServicesBackend.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/logo-small.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Main website CSS file -->
    <link rel="stylesheet" href="CSS/Service.css">
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
    <title>End of Life Care</title>
</head>
<body>
    <!-- Start Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a href="Homepage.php"><img class="logo" src="Images/logo-small.png" alt="logo" height="80" width="180"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="Homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Account.php">Account</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Services.php">Services  <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Feedback.php">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contact-Us.php">Contact Us</a>
            </li>
          </ul>
        </div>

        <?php
  
          $isLoggedIn = isset($_SESSION['email']);
          ?>

          <a class="cta" href="<?php echo $isLoggedIn ? 'logout.php' : 'Login-signup.php'; ?>">
            <button class="btn login">
              <?php echo $isLoggedIn ? 'Logout' : 'Login/Sign Up'; ?>
            </button>
          </a>
      </div>
    </nav>
    <!-- End Nav Bar-->

    <!-- Start Slider -->
    <div class="slider">
      <div id="main-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="overlay"></div>
          <div class="carousel-item carousel-one active">
            <div class="text-box">
              <h2>End of Life Care</h2>
              <p>•	Comfort care and symptom management <br>
                •	Emotional and spiritual support <br>
                •	Assistance with advanced directives <br>
                •	Grief support for families <br>
                •	Coordination with hospice services
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Slider -->

    <!-- Start Highest Rated Nurses -->
    <div class="highest">
      <div class="container">
        <h2>Specialized Nurses</h2>
        <div class="row">
        <?php
// Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve nurses from the database
        $query = "SELECT * FROM nurse WHERE service_id = 9" ;
        $result = mysqli_query($db, $query);

        // Loop through each nurse and generate the nurse card HTML
        while ($row = mysqli_fetch_assoc($result)) {
          $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $service = $row['service_id'];
            $rate = $row['rating'];
            // You can retrieve other nurse data from the database here

            // Concatenate the first name and last name
            $name = $firstName . ' ' . $lastName;

            // Generate the nurse card HTML dynamically
            ?>
          <div class="col-sm-6 col-md-4">
            <div class="nurse-card" style="width: 18rem;">
              <img class="card-img-top" src="Images/nurse.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <h6 style="margin-left: -30%; margin-bottom: 10px; padding: 0;">Service ID: <?php echo $service; ?></h6>
                <h6 style="margin-left: -30%; margin-bottom: 60%; margin-top: 0; padding: 0;">Rating: <?php echo $rate; ?></h6>
                <div class="row">
                  <div class="col">
                    <a class="btn custom-request-btn" style="color: #fff; margin-left: -70%; width: fit-content;">REQUEST</a>
                  </div>
                  <div class="col">
                    <a class="btn custom-rate-btn" style="color: #fff; margin-left: 15%; width: 95px;">RATE</a> <!-- New Rate button -->
                  </div>
                </div>
              </div>
              
              <div class="popup request-popup">
                <div class="popup-content">
                  <h2 id="PopUp_h2">Fill Request Info</h2>
                  <form method="post" action="Service1.php">
                    <?php include ('requesterr.php'); ?> 
                    <input type="hidden" name="nurse-name" value="<?php echo $name; ?>">
                    <input type="hidden" name="nurse-ssn" value="<?php echo $row['ssn']; ?>">
                     
                    <div class="row">
                      <div class="col">
                        <label for="start-time">Start Time:</label>
                      </div>
                      <div class="col">
                      <select id="start-time" name = "start-time">
                        <?php
                        // Generate options for all 24 hours
                        for ($hour = 0; $hour < 24; $hour++) {
                            $time = sprintf("%02d:00", $hour); // Format the hour as two digits
                            echo '<option value="' . $time . '">' . $time . '</option>';
                        }
                        ?>
                      </select>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="end-time">End Time:</label>
                      </div>
                      <div class="col">
                      <select id="end-time" name = "end-time">
                        <?php
                        // Generate options for all 24 hours
                        for ($hour = 0; $hour < 24; $hour++) {
                            $time = sprintf("%02d:00", $hour); // Format the hour as two digits
                            echo '<option value="' . $time . '">' . $time . '</option>';
                        }
                        ?>
                      </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="day">Day:</label>
                      </div>
                      <div class="col">
                        <select id="day" name = "day">
                          <option value="Saturday">Saturday</option>
                          <option value="Sunday">Sunday</option>
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thursday">Thursday</option>
                          <option value="Friday">Friday</option>
                          <!-- Add more options for other days of the week -->
                        </select>
                      </div>
                    </div>
                    <div class="row">
                <div class="col">
                    <label for="date">Date:</label>
                </div>
                <div class="col">
                    <input type="date" id="date" name="date">
                </div>
            </div>
            
                    <div class="row">
                      <button name= "request" class="submit-btn">SUBMIT</button>
                    </div>
                  </form>
                  <button class="close-btn">&times;</button>
                </div>
              </div>
              <div class="popup rate-popup">
                <div class="popup-content">
                  <h2 id="PopUp_h2">Rate Nurse</h2>
                  <form method="post" action="Service1.php">
                    
                    <input type="hidden" name="nurse-ssn" value="<?php echo $row['ssn']; ?>">   
                     
                    <div class="row">
                      <div class="col">
                        <label for="rating">Rating:</label>
                      </div>
                      <div class="col">
                        <select id="rating" name = "rating">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <button name = "rate_btn" class="submit-btn">SUBMIT</button>
                    </div>
                  </form>
                  <button class="close-btn">&times;</button>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Highest Rated Nurses -->

    <!-- Start Footer -->
    <div class="footer">
      <div class="container">
        <div class="row">

          <!-- Contact us form -->
          <div class="col-sm-6 col-md-4">
            <div class="contact-us">
              <h2>Contact Us</h2>
              <p>Send us a message!</p>
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="5" id="comment" placeholder="Your message here."></textarea>
                </div>
                <button type="submit" class="btn custom-submit-btn">Submit</button>
              </form>
            </div>
          </div>

          <!-- Sitemap Section -->
          <div class="col-sm-6 col-md-4">
            <div class="sitemap">
              <h2>Sitemap</h2>
              <p>All our website sections</p>
              <ul class="list-unstyled">
                <li class="sitemap-item">
                  <a class="sitemap-link" href="Homepage.php">Home</a>
                </li>
                <li class="sitemap-item">
                  <a class="sitemap-link" href="Services.php">Services</a>
                </li>
                <li class="sitemap-item">
                  <a class="sitemap-link" href="Feedback.php">Feedback</a>
                </li>
                <li class="sitemap-item">
                  <a class="sitemap-link" href="Contact-Us.php">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>

          <!-- logo and contact information -->
          <div class="col-sm-6 col-md-4">
            <div class="conatct-info">
              <a href="Homepage.php"><img class="logofooter" src="Images/logo-small.png" alt="logo" height="80" width="180"></a>
              <p style="font-size: 20px; color: #fff; font-weight: 400;">You can reach out to us via</p>
              <div class="phone">
                <p style="font-size: 20px; color: #fff;"><span id="phone"><i class="fa-solid fa-phone-flip"></i></span> (+2) 010604918169</p>
              </div>
              
              <div class="mail">
                <p style="font-size: 20px; color: #fff;"><span id="mail"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:email@address.com?subject=Contact"> email@address.com</a></p>
              </div>

              <div class="fax">
                <p style="font-size: 20px; color: #fff;"><span id="fax"><i class="fa-solid fa-fax"></i></span> +44 161 999 8888</p>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
    <!-- End Footer -->

    <!-- Copyright row -->
    <div class="lower-bar">
      <div class="container">
        <div class="copyright">
          <p><span id="copyrights"><i class="fa-solid fa-copyright"></i></span> 2023 elMostawsaf. All rights reserved.</p>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/RequestPop.js"></script>
</body>
</html>