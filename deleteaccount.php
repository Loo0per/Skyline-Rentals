<?php
    require 'config.php'; //including config.php
?>
<?php
    $uid = $_POST['uid'];

    $query = "DELETE from user where user_id =$uid"; //delete record from user table 

    $data = mysqli_query($conn, $query);

    if ($data) 
    {
        echo "<script>alert('User Account Deleted');</script>";
        echo '<script>window.location.href = "admin.php";</script>';
    } 
    else 
    {
        echo "<script>alert('Error in Delete')</script>";
    }
 //close the connection
 mysqli_close($conn);

?>