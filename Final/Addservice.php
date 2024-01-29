<?php include('AddserviceBackend.php') ?>
<!DOCTYPE html>
<html>
<head>
    
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Sign Up</h2>
  </div>
	
  <form method="post" action="Addservice.php">
                                <?php include('errors.php'); ?>
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <input type="text" class="form-control" name="service" style="margin-top: 10px; width: 400px;">
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-light" style="margin-top: 20px; width: 100px;" name="signup">submit</button>
                                </div>
                            </form>
</body>
</html>

