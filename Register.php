<!-- Sakindu -->
<?php 
    require 'config.php'; //including config.php
?>
<?php
 // getting data from form
if(isset($_POST["submit"])){
    $Fname = $_POST["First_Name"];
    $Lname = $_POST["Last_Name"];
    $email = $_POST["Email"];
    $pass = $_POST["Password"];
  
    $sql= "INSERT INTO user(user_id,firstName,lastName,email,password) VALUES('','$Fname','$Lname','$email','$pass')" ;
    if($conn->query($sql)){
      echo "<script>alert('User account successfully created');</script>";
      echo '<script>window.location.href = "login.php";</script>';
    }
  
    else{
      echo "Error: ". $conn->error;
    }
  }
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Skyline Rentals</title>
		<link rel="stylesheet" type="text/css" href="css/headerfooter.css">
    <link rel="stylesheet" type="text/css" href="css/Register.css">
    <script src="js/register.js"></script>
		
	</head>
	<body>
        <header>	
            <h1 class="head1">Skyline Rentals</h1>
            <hr id="top">
            <img src="images/logo.jpg" alt="skyline logo" class="logo">
            <ul class="menu1">
                <li><a href="" class="list1">Language</a></li>
                <li><a href="Feedback.html" class="list1">Feedbacks</a></li>
                <li><a href="Contact us.html" class="list1">Contact us</a></li>
                <li><a href="aboutus.html" class="list1">About us</a></li>
            </ul>
            
            <a href="login.php"><button class="loginbuttn">Sign in/Register</button></a>
            <hr id="bot"><br>
            <ul class="menu2">
                <li><a href="home.php" class="list2">Home</a></li>
                <li><a href="Reservation.php" class="list2">Resevartion</a></li>
                <li><a href="vehicle.html" class="list2">Vehicles</a></li>
                <li><a href="location.html" class="list2">Locations</a></li>
            </ul><br>
            <hr class="hr3"><br><br>
        </header>
        <main>

              <div class="form-box signup">
                  <div class="form-details">
                      <h2>Create Account</h2>
                      <p align="center"><b>To become a part of our community, please sign up using your personal information.</b></p>
                  </div>
                  <div class="form-content">
                      <h2 style="margin-right: 280px;">SIGNUP</h2>
                      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"  onsubmit="return checkPwd()">
                        <div class="name">
                        <div class="input-field1">
                          <input type="text"  name="First_Name" required>
                          <label>First Name</label>
                        </div>
                        <div class="input-field1 field1">
                          <input type="text"  name="Last_Name" required>
                          <label>Last Name</label>
                        </div>
                      </div>
                          <div class="input-field">
                              <input type="text" name="Email" pattern="[a-z0-9]+@[a-z0-9]+\" required>
                              <label>Enter your email</label>
                          </div>
                          <div class="input-field">
                              <input type="password" id="Password" name="Password" required>
                              <label>Create password</label>
                          </div>
                          <div class="input-field">
                            <input type="password" id="confirmpwd" required>
                            <label>Confirm password</label>
                          </div>
                          <div class="policy-text">
                              <input type="checkbox" id="checkbox" onclick="enableButton()">
                              <label for="policy">
                                  I agree the
                                  <a href="#" class="option">Terms & Conditions</a>
                              </label>
                          </div>
                          <input type="submit" value="Sign up" name="submit" id="submitbtn" disabled class="sub">
                      </form>
                      <div class="bottom-link">
                          Already have an account? 
                          <a href="login.php" id="login-link">Login</a>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </main>    
			
		<footer style="margin-top: 200px;">
			<hr class="hr3">
			<h2 style="font-family: cursive; font-size: 30px; margin-left: 30px; color:midnightblue ;">Skyline Rentals</h2>
			<div class="footerimg">
				<img src="Images/facebook.png" style="margin-right: 30px;">
				<img src="Images/twitter.png">
				<img src="Images/youtube.png" style="margin-left: 30px;">
			</div>
			<div class="footercontact">
				<p>+44 20 7946 0156 – Michel</p>
				<p>+44 20 7946 0142 – Jhon</p>
				<p>admin@skyline.com</p>
				<p>Addres:9503, New Street,
						  London,
						  SE69 5XE</p>
			</div>
			<div class="copyright">
				<p>​© 2023 The Skyline Rentals Corporation. </p>
			</div>
			
			<div class="footerlist">
				<ul>
					<li class="flitems"><a href="" class="list1">Terms of use</a></li>
					<li class="flitems"><a href="" class="list1">Privacy policy</a></li>
					<li class="flitems"><a href="sitemap.html" class="list1">Site Map</a></li>
				</ul>
			</div>
			
		</footer>
		
	</body>	
</html>