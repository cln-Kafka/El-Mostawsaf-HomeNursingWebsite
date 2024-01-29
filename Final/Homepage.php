<?php
    include('ContactBackend.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/logo-small.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Main website CSS file -->
    <link rel="stylesheet" href="CSS/Homepage.css">
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a href="Homepage.php"><img class="logo" src="Images/logo-small.png" alt="logo" height="80" width="180"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="Homepage.php">Home <span class="sr-only">(current)</span></a>
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
          <div class="carousel-item carousel-one active">
            <div class="text-box">
              <h2>Caring Hearts, Healing Hands</h2>
              <p>Providing Compassionate Home Nursing Services</p>
            </div>
            <div class="overlay"></div>
          </div>
          <div class="carousel-item carousel-two">
            <div class="text-box">
              <h2>Empowering Independence, Ensuring Comfort</h2>
              <p>Your Trusted Home Nursing Partner</p>
            </div>
            <div class="overlay"></div>
          </div>
          <div class="carousel-item carousel-three">
            <div class="text-box">
              <h2>Bringing Quality Care to Your Doorsteps</h2>
              <p>Personalized Home Nursing Solutions</p>
            </div>
            <div class="overlay"></div>
          </div>
        </div>

        <ol class="carousel-indicators">
          <li data-target="#main-slider" data-slide-to="0" class="active"></li>
          <li data-target="#main-slider" data-slide-to="1"></li>
          <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>

        <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-slider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- End Slider -->

    <!-- Start Services Summary Section -->
    <div class="card-container">
      <div class="service-section"> <!-- section1 (fe mlaf sami) -->
        <div class="service-card"> <!-- card-1 (fe mlaf sami) -->
            <div class="card-1-Img">
                <img src="Images/stock/06.jpg" alt="Nurse and Wound care">
            </div>
            <div class="card-1-text">
                <h2>Services Summary</h2>
                <p>Welcome to our home nursing services! We are dedicated to providing exceptional care and support for your loved ones in the comfort of their own homes.
                  From skilled medical assistance to compassionate companionship, our experienced team is here to ensure your peace of mind.
                  Discover a comprehensive range of services tailored to meet individual needs by exploring our services page.
                  Let us be your trusted partner in delivering the highest quality care for your cherished family members.</p>
                <a class="read-more" href="Services.php"><button class="read-btn">Read More</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <!-- End Services Summary Section -->

    <!-- Start about us Section -->
    <div class="card-container">
      <div class="about-us-section"> <!-- section1 (fe mlaf sami) -->
        <div class="about-us-card"> <!-- card-2 (fe mlaf sami) -->
            <div class="card-2-Img">
                <img src="Images/stock/01.jpg" alt="Nurse and old patient">
            </div>
            <div class="card-2-text">
                <h2>Who are We?</h2>
                <p>Welcome to elMostawsaf! We are a leading provider of professional nursing services catering to the unique needs of individuals across all age groups.
                  Whether you require compassionate care for elderly family members, reliable support for children,
                  or assistance for adults in need, we have a team of dedicated nurses ready to lend a helping hand. Our mission is to enhance the quality of life for those we serve by delivering personalized care in the comfort of their own homes.
                  With elMostawsaf, you can trust that your loved ones are in experienced and caring hands.</p>
            </div>
        </div> 
      </div>
    </div>
    <!-- End about us Section -->

<hr>
    <!-- Start Highest Rated Nurses -->
<div class="highest">
  <div class="container">
    <h2>Highest Rated Nurses</h2>
    <div class="row">
    <?php
    // Retrieve the highest-rated nurses for each service
    $query = "SELECT n.first_name, n.last_name, n.service_id, MAX(n.rating) AS max_rating
              FROM nurse n
              -- INNER JOIN rating r ON n.ssn = r.nurse_ssn
              GROUP BY n.service_id
              ORDER BY max_rating DESC
              ";
    $result = mysqli_query($db, $query);

    // Display the nurse cards
    while ($row = mysqli_fetch_assoc($result)) {
        $nurse_first_name = $row['first_name'];
        $nurse_last_name = $row['last_name'];
        $service_id = $row['service_id'];
        $rating = $row['max_rating'];

        // Retrieve service name
        $service_query = "SELECT S_name FROM services WHERE S_id = '$service_id'";
        $service_result = mysqli_query($db, $service_query);
        $service_row = mysqli_fetch_assoc($service_result);
        $service_name = $service_row['S_name'];

        echo '<div class="col-sm-6 col-md-4">
                <div class="nurse-card" style="width: 18rem;">
                  <img class="card-img-top" src="Images/nurse.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Nurse Name: ' . $nurse_first_name . ' ' . $nurse_last_name . '</h5>
                    <h6 style="margin-left: 0%; margin-bottom: 10px; padding: 0;">Service ID: ' . $service_id . '</h6>
                    <h6 style="margin-left: 0%; margin-bottom: 60%; margin-top: 0; padding: 0;">Rating: ' . $rating . '</h6>
                  </div>
                </div>
              </div>';
    }

    mysqli_close($db);
    ?>
    </div>
  </div>
</div>
<!-- End Highest Rated Nurses -->



          
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
              <form method="post" action="Homepage.php">
                        <?php include('errors.php'); ?>
                <div class="form-group">
                  <textarea class="form-control" rows="5" id="message" name="message" placeholder="Your message here."></textarea>
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
</body>
</html>