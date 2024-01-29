<?php include('AddserviceBackend.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/logo-small.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Main website CSS file -->
    <link rel="stylesheet" href="CSS/services.css">
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
    <title>Services</title>
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
              <a class="nav-link" href="Homepage.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Account.php">Account</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Services.php">Services <span class="sr-only">(current)</span></a>
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
        </div>
      </div>
    </div>
    <!-- End Slider -->

    <!-- Start Services Section -->
    <div class="card-container">
      <div class="service-section"> <!-- section1 (fe mlaf sami) -->
        <div class="service-card"> <!-- card-1 (fe mlaf sami) -->
            <div class="card-1-Img">
                <img src="Images/Palliative care.jpg" alt="Nurse and Wound care">
            </div>
            <div class="card-1-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>1. <?php echo $name; ?></h2>
                <p>We provide exceptional skilled nursing care to meet your specific needs.
                  Our dedicated team of skilled nurses is highly trained in a wide range of specialized services.
                    Whether you require wound care management, medication administration, post-operative care, disease management
                    for conditions such as diabetes or hypertension, or compassionate palliative care, we are here to provide you with
                    the utmost care and support. With our skilled nursing care services,
                   you can trust that your health and well-being are in expert hands, right in the comfort of your own home.</p>
                  <a class="read-more" href="Service1.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="about-us-section"> <!-- section1 (fe mlaf sami) -->
        <div class="about-us-card"> <!-- card-2 (fe mlaf sami) -->
            <div class="card-2-Img">
                <img src="Images/personal-care-assistance.jpeg" alt="Nurse and old patient">
            </div>
            <div class="card-2-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 1 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>2. <?php echo $name; ?></h2>
                <p>We provide personalized care assistance to support your daily living activities.
                   Our dedicated team offers a wide range of services tailored to your individual needs. 
                   From bathing and grooming assistance to dressing and toileting support, we are here to help you maintain your personal hygiene and dignity.
                    Our caregivers also provide mobility and transfer assistance to ensure your safety and comfort. 
                    Additionally, we offer feeding assistance and support for exercise and physical therapy to promote your overall well-being.
                   With our personal care assistance services, you can rely on our compassionate caregivers to help you maintain an independent and fulfilling lifestyle.</p>
                  <a class="read-more" href="Service2.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="service-section"> <!-- section1 (fe mlaf sami) -->
        <div class="service-card"> <!-- card-1 (fe mlaf sami) -->
            <div class="card-1-Img">
                <img src="Images/emotional-support.jpg" alt="Nurse and Wound care">
            </div>
            <div class="card-1-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 2 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>3. <?php echo $name; ?></h2>
                <p>We provide companion and emotional support services to enhance your overall well-being.
                   Our caregivers are not just there to assist you physically but also to offer companionship and engage in meaningful conversations.
                    We encourage social engagement and plan activities that align with your interests. Additionally,
                     we provide cognitive stimulation to keep your mind sharp and active. Our caregivers offer emotional support and reassurance, 
                     creating a comforting environment for you. They also assist with medication reminders to ensure you stay on track with your medication schedule.
                   With our companion and emotional support services, you can expect compassionate care that addresses your social, cognitive, and emotional needs.</p>
                <a class="read-more" href="Service3.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="about-us-section"> <!-- section1 (fe mlaf sami) -->
        <div class="about-us-card"> <!-- card-2 (fe mlaf sami) -->
            <div class="card-2-Img">
                <img src="Images/Pediatric.png" alt="Nurse and old patient">
            </div>
            <div class="card-2-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 3 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>4. <?php echo $name; ?></h2>
                <p>We provide comprehensive services for children.
                   Our skilled nurses are experienced in newborn care and offer support to ensure the well-being of your newborn.
                    We also provide pediatric nursing for children with chronic conditions, delivering personalized care tailored to their specific needs. 
                    Our team offers feeding and nutrition assistance, ensuring that your child receives proper nourishment. Additionally, 
                    we conduct developmental assessments to monitor your child's growth and milestones. We are also equipped to provide special needs care, 
                    ensuring the comfort and safety of children with unique requirements.
                   With our pediatric care services, you can trust that your child's health and development are in caring and capable hands.</p>
                  <a class="read-more" href="Service4.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="service-section"> <!-- section1 (fe mlaf sami) -->
        <div class="service-card"> <!-- card-1 (fe mlaf sami) -->
            <div class="card-1-Img">
                <img src="Images/respite-care.jpg" alt="Nurse and Wound care">
            </div>
            <div class="card-1-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 4 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>5. <?php echo $name; ?></h2>
                <p>We offer respite care services to provide temporary relief for family caregivers.
                   We understand the demanding nature of caregiving responsibilities, which is why we offer in-home respite care services.
                    Whether you need assistance during vacations or personal time off, our trained caregivers are here to support you and ensure continuity of care for your loved one.
                     Additionally, we provide caregiver education and support to equip you with the necessary tools and resources to navigate your caregiving journey effectively.
                   With our respite care services, you can take a break knowing that your loved one is in capable and compassionate hands.</p>
                <a class="read-more" href="Service5.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="about-us-section"> <!-- section1 (fe mlaf sami) -->
        <div class="about-us-card"> <!-- card-2 (fe mlaf sami) -->
            <div class="card-2-Img">
                <img src="Images/rehab (1).jpg" alt="Nurse and old patient">
            </div>
            <div class="card-2-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 5 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>6. <?php echo $name; ?></h2>
                <p>We offer comprehensive rehabilitation support to aid in your recovery journey. 
                  Our dedicated team provides specialized services to help you regain your physical, cognitive, and speech abilities.
                   We offer personalized physical therapy exercises to enhance your mobility and strength. Our caregivers provide assistance with occupational therapy,
                    helping you regain independence in daily activities. We also offer speech therapy support to address communication and swallowing difficulties.
                     Whether you're recovering from a stroke, injury, or surgery,
                   our rehabilitation care is tailored to your specific needs. We are committed to supporting your recovery and helping you achieve your rehabilitation goals.</p>
                  <a class="read-more" href="Service6.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="service-section"> <!-- section1 (fe mlaf sami) -->
        <div class="service-card"> <!-- card-1 (fe mlaf sami) -->
            <div class="card-1-Img">
                <img src="Images/Dementia-care.jpg" alt="Nurse and Wound care">
            </div>
            <div class="card-1-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 6 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>7. <?php echo $name; ?></h2>
                <p>We specialize in dementia and Alzheimer's care, providing compassionate support for individuals living with these conditions. 
                  Our caregivers are trained to offer memory care and cognitive stimulation, helping to maintain and improve cognitive function. 
                  We also specialize in behavioral management, ensuring a calm and safe environment for individuals with dementia and Alzheimer's. 
                  Our team provides diligent safety monitoring to prevent accidents and promote well-being. We assist with medication management to ensure proper
                   adherence to prescribed treatments. Moreover, we offer valuable support and education for family caregivers, providing guidance and resources to navigate
                    the challenges of caring for a loved one with dementia or Alzheimer's.
                   With our specialized care, we strive to enhance the quality of life for both individuals and their families.</p>
                <a class="read-more" href="Service7.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="about-us-section"> <!-- section1 (fe mlaf sami) -->
        <div class="about-us-card"> <!-- card-2 (fe mlaf sami) -->
            <div class="card-2-Img">
                <img src="Images/chronic.jpeg" alt="Nurse and old patient">
            </div>
            <div class="card-2-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 7 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>8. <?php echo $name; ?></h2>
                <p>We specialize in chronic disease management, offering comprehensive care and support for various conditions.
                   Our skilled team is experienced in diabetes management and provides education to empower individuals in effectively managing their condition.
                    We also offer heart disease care and support, ensuring optimal heart health. For individuals with respiratory conditions, we provide specialized management 
                    and assistance to improve breathing and overall respiratory function. Our caregivers are trained in pain management techniques to alleviate discomfort and enhance quality of life.
                     Additionally, we offer medication monitoring and assistance to ensure proper adherence to prescribed treatments.
                   With our chronic disease management services, we aim to help individuals lead healthier and more fulfilling lives while effectively managing their conditions.</p>
                  <a class="read-more" href="Service8.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <div class="card-container">
      <div class="service-section"> <!-- section1 (fe mlaf sami) -->
        <div class="service-card"> <!-- card-1 (fe mlaf sami) -->
            <div class="card-1-Img">
                <img src="Images/End-of-life-care.jpeg" alt="Nurse and Wound care">
            </div>
            <div class="card-1-text">
            <?php
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'final_p');
        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Retrieve the last 3 feedback entries from the database
        $query = "SELECT * FROM services ORDER BY S_id ASC LIMIT 1 OFFSET 8 ";
        $result = mysqli_query($db, $query);

        // Display each feedback entry
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['S_name'];
            
        }
            ?>
                
                <h2>9. <?php echo $name; ?></h2>
                <p>We offer compassionate end-of-life care, providing support and comfort during this sensitive time.
                   Our dedicated team focuses on ensuring the comfort of individuals and managing symptoms effectively. We offer emotional and spiritual support,
                    understanding the importance of addressing the psychological and existential needs of patients and their families. Our caregivers can also assist with advanced directives,
                     helping individuals express their wishes for medical treatment and end-of-life care. We provide grief support to families,
                      offering guidance and empathy throughout the grieving process. In coordination with hospice services, we work collaboratively to provide comprehensive 
                      care and support for individuals and their loved ones during this transitional phase.
                   Our end-of-life care aims to provide dignity, compassion, and peace to those in need.</p>
                  <a class="read-more" href="Service9.php"><button class="read-btn">Go to Service</button></a> <!-- show-btn (fe mlaf sami) -->
            </div>
        </div> 
      </div>
    </div>
    <!-- End Services Section -->

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
</body>
</html>