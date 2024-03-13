<?php
  session_start();
  require "config.php";
  if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

   
    
      $sql = "SELECT email,password FROM admin WHERE email = '$email'";
      $result = $conn->query($sql);
  
      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
  
        $storedpwd = $row["password"];
  
        if($storedpwd === $password){
          $_SESSION["loggedUser"] = $email;
          echo "<script>alert('Admin Login succeessful');</script>";
          echo '<script>window.location.href = "admin.php";</script>';
        }
        else{
          echo "<script>alert('Invalid Password');</script>";
          
        }
      }
      else{
        echo "<script>alert('Invalid Email');</script>";
        echo '<script>window.location.href = "login.php";</script>';
      }
    
  }
  
  
?>
