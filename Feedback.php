
<!-- Sachin -->
<?php
    require 'config.php';
?>
<?php
// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "vrs");

if(isset($_POST["submit"])){


$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$email = $_POST['email'];
$vehicle_type = $_POST['vehicle-type'];
$branch_type = $_POST['branch-type'];
$rating = $_POST['rating'];
$feedback = $_POST['option'];

// SQL query to insert data
$sql = "INSERT INTO feedback (first_name, last_name, email, vehicle_type, branch_type, rating, feedback)
        VALUES ('$first_name', '$last_name', '$email', '$vehicle_type', '$branch_type', $rating, '$feedback')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Your Feedback Successfuly entered');</script>";
    echo '<script>window.location.href = "feedback.html";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
// Close the database connection
mysqli_close($conn);
?>


