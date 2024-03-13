<!-- Suneru -->
<?php
    require 'config.php';
?>
<?php

if(isset($_POST["submit"])){
    $Cnumber = $_POST["card_number"];
    $Name = $_POST["Name_on_card"];
    $Edate = $_POST["expiry_date"];
    $cvv = $_POST["cvv"];
  
    $sql= "INSERT INTO payment(payment_id,CardNumber,NameOnCard,ExpireDate,CVV) VALUES('','$Cnumber','$Name','$Edate','$cvv')" ;
    if($conn->query($sql)){
      echo "<script>alert('your Payment Success');</script>";
      echo '<script>window.location.href = "home.php";</script>';
    }
  
    else{
      echo "Error: ". $conn->error;
    }
  }
?>