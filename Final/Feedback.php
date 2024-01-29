<?php include('FeedbackBackend.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/logo-small.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Main website CSS file -->
    <link rel="stylesheet" href="CSS/Feedback.css">
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
    <title>Feedback</title>
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
            <li class="nav-item">
              <a class="nav-link" href="Services.php">Services</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Feedback.php">Feedback <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contact-Us.php">Contact Us</a>
            </li>
          </ul>
        </div>

        <?php

          $isLoggedIn = isset($_SESSION['email']);
          ?>

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
    <header class="header">
        <div class="header-content">
          <h1>Feedback</h1>
          <p>Your Opinion Matters</p>
        </div>
      </header>

      <div class="FeedBtn">
        <a class="btn custom-request-btn" onclick="openFeedbackPopup()">Tell Us What You Think</a>
      </div>
      <!-- Popup Window -->
      <form method="post" action="Feedback.php">
          <?php include ('errors.php'); ?>   
      <div class="popup" id="feedbackPopup">
        <div class="popup-content">
          <span class="close" onclick="closeFeedbackPopup()">&times;</span>
          <textarea class="feedback-input" placeholder="Message" name ="comment" ></textarea>
          <div class="row">
            <div class="col">
              <label for="rating" style="width:90px; margin-bottom: 20px; ">Rating (1-5):</label>
            </div>
            <div class="col">
              <input class = "feedback.rating" type="number" id="rating" name="rating" min="1" max="5" placeholder="Enter rating">
            </div>
          </div> 
          <button type="submit" name="user_message" class="btn custom-submit-btn">Submit</button>
        </div>
      </div>
      
      <hr>
    <!-- End Slider -->

    <div class="main">
      <h1 style="margin-top: 20px;">Feedbacks</h1>
        
        <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM feedback ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $comment = $row['comment'];
          
            ?>
                <div class="feed_container" style = "width: 800px ; height: 600 px">
                <p class="name"><?php echo $name; ?></p>
                <p><?php echo $comment; ?></p>
            
            </div>
            
        <?php } ?>

    </div>
    </div>

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
    <!-- <script src="js/main.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/PopUp.js"></script>
</body>
</html>