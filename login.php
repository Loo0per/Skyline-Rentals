<!-- Sakindu -->
<!DOCTYPE html>

<html>
	<head>
		<title>Skyline Rentals</title>
		<link rel="stylesheet" type="text/css" href="css/headerfooter.css">
        <link rel="stylesheet" type="text/css" href="css/Register.css">
        <script src="js/login.js"></script>
		
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
                <li><a href="home.html" class="list2">Home</a></li>
                <li><a href="Reservation.php" class="list2">Resevartion</a></li>
                <li><a href="vehicle.html" class="list2">Vehicles</a></li>
                <li><a href="location.html" class="list2">Locations</a></li>
            </ul><br>
            <hr class="hr3"><br><br>
        </header>
        <main>
          <div>
             <button class="button1" type="button" id="btn1" onclick="loadData('btn1')">User Login</button> <!-- Change login form-->
             <button class="button1" type="button" id="btn2" onclick="loadData('btn2')">Admin Login</button> <!-- Change login form-->
</div>   
          <div class="blur-bg-overlay"></div>
          <div class="form-popup"  id="getform">
          
              <div class="form-box login">
                  <div class="form-details">
                      <h2>Welcome Back</h2>
                      <p align="center"><b>Please log in using your personal information to stay connected with us.</b></p>
                  </div>
                  <div class="form-content">
                      <h2 style="margin-right: 280px;">USER LOGIN</h2>
                      <form method="POST" action="userlogin.php">
                          <div class="input-field">
                              <input type="text" name="email" required>
                              <label>Email</label>
                          </div>
                          <div class="input-field">
                              <input type="password" name="password" required>
                              <label>Password</label>
                          </div>
                          <a href="#" class="forgot-pass-link">Forgot password?</a>
                          <br>
                          <button type="submit" name="submit">Log In</button>
                      </form>
                      <div class="bottom-link">
                          Don't have an account?
                          <a href="Register.php" id="signup-link">Signup</a>
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