<!-- Vimash -->

<?php
// Include the configuration file
require 'config.php';

// Handle form submission for making a reservation
if(isset($_POST["submit"])){
    $Firstname = $_POST["f_name"];
    $location = $_POST["location"];
    $class = $_POST["class"];
    $time = $_POST["time"];
    $pdate = $_POST["p_date"];
    $rdate = $_POST["r_date"];
 

// Create SQL query to insert reservation
    $sql= "INSERT INTO res(fullname,p_loc,v_class,r_age,p_date,r_date)
    VALUES('$Firstname','$location','$class','$time','$pdate','$rdate')" ;

// Execute the query
    if($conn->query($sql)){
        echo "<script>alert('Reservation successful');</script>";
    } else {
        echo "Error: ". $conn->error;
    }
}

// Handle form submission for deleting a reservation
if(isset($_POST["delete_submit"])){
    $delete_res_id = $_POST["delete_res_id"];
    $delete_sql = "DELETE FROM res WHERE res_id = '$delete_res_id'";

    if($conn->query($delete_sql)){
        echo "<script>alert('Reservation with ID $delete_res_id deleted successfully');</script>";
        
    } else{
        echo "Error: ". $conn->error;
    }
}

// Handle form submission for updating pickup location
if(isset($_POST["update_submit"])){
    $update_res_id = $_POST["update_res_id"];
    $new_location = $_POST["new_location"];
    $update_sql = "UPDATE res SET p_loc='$new_location' WHERE res_id='$update_res_id'";

    if($conn->query($update_sql)){
        echo "<script>alert('Pickup location for reservation ID $update_res_id updated successfully');</script>";
    } else{
        echo "Error: ". $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Head section with title, meta tags, and CSS links -->
    <title>Skyline Rentals</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/headerfooter.css">
    <link rel="stylesheet" type="text/css" href="css/Reservation.css">
    <link rel="stylesheet" type="text/css" href="css/Reservation2.css">
    <script>
        // Function to toggle the Delete Section visibility
        function toggleDeleteSection() {

            // Retrieve elements by their IDs
            var deleteSection = document.getElementById("deleteSection");
            var existingReservations = document.getElementById("existingReservations");
            var table = document.getElementById("reservationTable");
            
            // Toggle the display property of deleteSection
            if (deleteSection.style.display === "none") {
                deleteSection.style.display = "block";
            } 
            else {
                deleteSection.style.display = "none";
            }
            if (updateSection.style.display === "block") {
                updateSection.style.display = "none";
            }
            if(table.style.display === "none") {
                table.style.display === "block";
            }
        }
        
        // Function to load existing reservations
        function loadExistingReservations() {
            var reservationList = document.getElementById("reservationList");
            reservationList.innerHTML = "";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var reservations = JSON.parse(this.responseText);
                    reservations.forEach(function(reservation) {
                        var li = document.createElement("li");
                         
                        // Create a list item with reservation details
                        li.appendChild(document.createTextNode(`ID: ${reservation.res_id}, Name: ${reservation.fullname}, Location: ${reservation.p_loc}`));
                        reservationList.appendChild(li);
                    });
                }
            };
            xhttp.open("GET", "get_existing_reservations.php", true);
            xhttp.send();
        }
        
        // Load existing reservations on page load
        loadExistingReservations();

        // Load existing reservations for update section
        loadExistingReservationsForUpdate(); 

        // Function to toggle the Update Section visibility
        function toggleUpdateSection() {
        var updateSection = document.getElementById("updateSection");
        var existingReservations = document.getElementById("existingReservations");
        var table= document.getElementById("reservationTable");

        if (updateSection.style.display === "none") {
            updateSection.style.display = "block";
        } else {
            updateSection.style.display = "none";
        }
        if (deleteSection.style.display === "block"){
            deleteSection.style.display = "none";
        }
        if(table.style.display === "none") {
            table.style.display === "block";
            }
    }

     // Function to load existing reservations for update section
    function loadExistingReservationsForUpdate() {
    var reservationListUpdate = document.getElementById("reservationListUpdate");
    reservationListUpdate.innerHTML = "";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var reservations = JSON.parse(this.responseText);
            reservations.forEach(function(reservation) {
                var li = document.createElement("li");
                li.appendChild(document.createTextNode(`ID: ${reservation.res_id}, Location: ${reservation.p_loc}`));
                reservationListUpdate.appendChild(li);
            });
        }
    };
    xhttp.open("GET", "get_existing_reservations.php", true);
    xhttp.send();
}

    // Function to update location
    function updateLocation() {
        var update_res_id = document.getElementById("update_res_id").value;
    var new_location = document.getElementById("new_location").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("User with id " + update_res_id + " succssesfully updated ");
            loadExistingReservations(); // Reload the reservation list after update
            toggleUpdateSection(); // Hide the update section
        }
    };

    xhttp.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("update_submit=1&update_res_id=" + update_res_id + "&new_location=" + new_location);
    }
    </script>
</head>
<body onload = loadExistingReservations()>
     <!-- Header section -->
    <header>
    <!-- Skyline Rentals logo and navigation links -->
    <h1 class="head1">Skyline Rentals</h1>
            <hr id="top">
            <img src="images/logo.jpg" alt="skyline logo" class="logo">
            <ul class="menu1">
                <li><a href="" class="list1">Language</a></li>
                <li><a href="Feedback.html" class="list1">Feedbacks</a></li>
                <li><a href="Contact us.html" class="list1">Contact us</a></li>
                <li><a href="aboutus.html" class="list1">About us</a></li>
            </ul>
            <a href="userprofile.php"><button class="loginbuttn">Profile</button></a>
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
        <body class="main_bg">
            <!-- Reservation Form -->
            <div class="form">
            <div class="form-text">
                        <h1><span><img src="art-1.png" alt=""></span>Reserve Now <span><img src="art-1.png" alt=""></span></h1>
                        <p>Reserve your vehicle and embark on your next adventure with ease!</p>
                    </div>
                    <div class="main-form">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                         <!-- Input fields for reservation details -->
                            <div>
                                <span>Your full name ?</span>
                                <input type="text" name="f_name" id="name" placeholder="Your full name..." required>
                            </div>
                            <div>
                                <span>Pick-up location ?</span>
                                <input type="text" name="location" id="name" placeholder="Provide location..." required> 
                            </div>
                            <div>
                                <span>Vehicle class ?</span>
                                <input type="text" name="class" id="name" placeholder="car,van,suv.." required>
                                </select>
                            </div>
                            <div>
                                <span>Renter age ?</span>
                                <input type="age" name="time" id="time" placeholder="Your age" required>
                            </div>
                            <div>
                                <span>Pick-up date ?</span>
                                <input type="date" name="p_date" id="date" placeholder="date" required>
                            </div>
                            <div>
                                <span>Return date ?</span>
                                <input type="date" name="r_date" id="date" placeholder="date" required>
                            </div>
                            <!-- Submit button -->
                            <div id="submit">
                                <input type="submit" name="submit" value="SUBMIT" id="submit">
                            </div>
            
            
                        </form>
                    </div>
            </div>

            <!-- Display existing reservations -->
            <div>
                <h2>Existing Reservations</h2>
                <ul id="reservationList"></ul>
            </div>
            <button onclick="toggleDeleteSection()">Delete Reservation</button>
            <button onclick="toggleUpdateSection()">Update Pickup Location</button>


            <!-- Buttons to trigger delete and update sections -->
            <div id="deleteSection" style="display: none;">
                <h2>Delete Reservation</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <span>Reservation ID:</span>
                        <input type="text" name="delete_res_id" placeholder="Enter res_id to delete" required>
                    </div>

                    <!-- Submit button for delete section -->
                    <div id="submit">
                        <input type="submit" name="delete_submit" value="DELETE">
                    </div>
                </form>
            </div>

     <!-- Update Pickup Location Section -->      
    <div id="updateSection" style="display: none;">
        <h2>Update Pickup Location</h2>
        <form onsubmit="updateLocation(); return false;">
            <div>
                <span>Reservation ID:</span>
                <input type="text" name="update_res_id" id="update_res_id" placeholder="Enter res_id to update" required>
            </div>
            <div>
                <span>New Pickup Location:</span>
                <input type="text" name="new_location" id="new_location" placeholder="Enter new location" required>
            </div>
             <!-- Submit button for update section -->
            <div id="submit">
                <input type="submit" value="UPDATE">
            </div>       
        </form>
    </div>
    <div id="submit">    
         <a href="payments.html"><input type="submit" value="Payment"></a>
         </div>         
        </body>
    </main>

       <!-- Footer section -->
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