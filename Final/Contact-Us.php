<?php include('ContactBackend.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/logo-small.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Main website CSS file -->
    <link rel="stylesheet" href="CSS/Contact-Us.css">
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
    <title>Mostawsaf</title>
</head>
<body>
    <!-- Start Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f1f7ff;">
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
            <li class="nav-item">
              <a class="nav-link" href="Feedback.php">Feedback</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Contact-Us.php">Contact Us <span class="sr-only">(current)</span></a>
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
              <h2>Want to tell us something?</h2>
            </div>
            <div class="contact-form">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-sm-6 col-md-4">
                    <div class="contact-us">
                      <div class="card">
                        <div class="card-body">
                        <form method="post" action="Contact-Us.php">
                        <?php include('errors.php'); ?>     
                            <div class="form-group">
                              <textarea class="form-control" rows="5" id="message" name="message" placeholder="Tell us what you need and you shall receive."></textarea>
                            </div>
                            <button type="submit" name="user_message" class="btn custom-submit-btn">Submit</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="lower-bar">
              <div class="container">
                <div class="copyright">
                  <p><span id="copyrights"><i class="fa-solid fa-copyright"></i></span> 2023 elMostawsaf. All rights reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Slider -->

    <!-- Contact us form -->
    
    <!-- End of Contact form -->

    <!-- Copyright row -->

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>