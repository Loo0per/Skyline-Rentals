<?php 
    require 'config.php'; 
?>
<?php
 
if(isset($_POST["send"])){
    $Fname = $_POST["fullname"];
    $email = $_POST["email"];
    $msg = $_POST["msg"];
    
  
    $sql= "INSERT INTO contact(id,FullName,Email,Message) VALUES ('','$Fname','$email','$msg')" ;
    if($conn->query($sql)){
      echo "<script>alert('Your Message successfuly recieved!');</script>";
      echo '<script>window.location.href = "home.php";</script>';
    }
  
    else{
      echo "Error: ". $conn->error;
    }
  }
?>