<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/Normalize.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400&display=swap" rel="stylesheet">
    <title>Sign in</title>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="Logo">
                <a href="Homepage.php"><img src="Images/logo-small.png" alt=""></a>
            </div>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form method="post" action="Login-signup.php"
             
            id="login" class="input-group active">
                <input type="email" class="input-field" placeholder="Email" required name = "email" > 
                <input type="password" class="input-field" placeholder="Password" required name = "password" >
                <button type="submit" name = "login_user" class="submit-btn">Log in</button>
            </form>
            <form method="post" action="Login-signup.php"
             
             id="register" class="input-group">
                <input type="text" class="input-field" placeholder="First Name" required  name = "fname">
                <input type="text" class="input-field" placeholder="Last Name" required name = "lname" >
                <input type="email" class="input-field" placeholder="Email" required name = "email" >
                <input type="password" class="input-field" placeholder="Password" required name = "password" >
                <input type="tel" class="input-field" placeholder="Phone" required name = "phone" >
                <input type="text" class="input-field" placeholder="Address" required name = "address" >
                <input type="date" class="input-field" placeholder="Birth Date" required name = "birthday" >
                <div>
                    <label for="gender">Gender:</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
                <button type="submit" name="signup" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <div>

        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");

            function register() {
                x.style.left = "-380px";
                y.style.left = "55%";
                z.style.left = "110px";
                x.classList.remove("active");
                y.classList.add("active");
            }

            function login() {
                x.style.left = "54%";
                y.style.left = "450%";
                z.style.left = "0px";
                x.classList.add("active");
                y.classList.remove("active");
            }
    //         function resizeBox() {
    //   var box = document.getElementById("form-box");
    //   var currentWidth = 400;
    //   var currentHeight = 600;
    //   var newWidth = currentWidth + 50; // Increase width by 50 pixels
    //   var newHeight = currentHeight + 50; // Increase height by 50 pixels
    //   box.style.width = newWidth + "px";
    //   box.style.height = newHeight + "px";
    //         }
        </script>
    </div>
</body>
</html>
