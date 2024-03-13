<?php
  session_start();
  require "config.php";
  if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

   
    
      $sql = "SELECT email,password FROM user WHERE Email = '$email'"; //chehck database and validate the user entered credentials
      $result = $conn->query($sql);
  
      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
  
        $storedpwd = $row["password"];
  
        if($storedpwd === $password){
          $_SESSION["loggedUser"] = $email; //if credentials correct loggeduser session have new value 
          echo "<script>alert('User Login succeessful');</script>";
          echo '<script>window.location.href = "home.php";</script>';
        }
        else{
          echo "<script>alert('Invalid Password');</script>";
          echo '<script>window.location.href = "login.php";</script>';
        }
      }
      else{
        echo "<script>alert('Invalid Email');</script>";
        echo '<script>window.location.href = "login.php";</script>';
      }

  }
 
  
?>