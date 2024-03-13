<!-- Sakindu -->

<?php
    session_start();
    $user = $_SESSION["loggedUser"];
    

    require 'config.php';

    $sql = "SELECT user_id,firstName,lastName,email,password FROM user WHERE email = '$user'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

    }
    else{
        echo "ERROR";
    }
    
    

?>

<?php
    if(isset($_POST["submit"])){
        $savedPwd = $row["password"];
        $savedEmail = $row["email"];
        $enteredPWD = $_POST["currentpwd"];
        $newPwd = $_POST["newpwd"];


        if($savedPwd === $enteredPWD){
            

            $sql2 = "UPDATE user SET Password = '$newPwd' WHERE Email = '$savedEmail'"; // updating  logging user's password 
           
            
            if($conn->query($sql2)){
                echo "<script>alert('Password changed successfully');</script>";
            }
            else{
                echo "<script>alert('Error when updating password');</script>";
            }

        }
        else{
            echo "<script>alert('Invalid Password');</script>";
        }
    }
    
    $conn->close();
?>


<!DOCTYPE html>

<html>
	<head>
		<title>Skyline Rentals</title>
		<link rel="stylesheet" type="text/css" href="css/headerfooter.css">
        <link rel="stylesheet" type="text/css" href="css/userprofile.css">
		<script src="js/changepwd.js"></script>
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
            <button class="loginbuttn">LOGGED</button>

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
    <div class="change-password-form-div" >
        <p class="form-header">Change Userdata</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return checkPwd()">  <!-- chehcking new and confirmed password are the same ones -->
            <div class="form-content">
                <label for="currentpwd" class="label">Current Password</label>
                <input type="password" class="input" id="currentpwd" name="currentpwd" required>
                <label for="newpwd" class="label">New Password</label>
                <input type="password" class="input" id="newpwd" name="newpwd" required>
                <label for="confirmpwd" class="label">Confirm Password</label>
                <input type="password" class="input" id="confirmpwd" name="confirmpwd" required>
        </div>
        <div class="submit-btn">
            <input type="reset" class="input1" name="reset" id="reset" value="Clear">
            <input type="submit" class="input1" name="submit" id="submit2" value="Change">
        </div>
        
    </form>
                    
</div>

<br>
<a href="login.php"><button class="logoutbuttn">LOGOUT</button></a>


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