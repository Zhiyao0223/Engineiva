<?php
  // Connect engineiva database  
  include("conn.php");

  // Retrieve carID from URL
  $carID = $_GET['carID'];

  // Create SQL code to other record that reference the car
  $carpurchase = "DELETE FROM cust_sell WHERE carID=$carID";
  $carimage = "DELETE FROM car_image WHERE carID=$carID";
  $carbuyap = "DELETE FROM buy_appointment WHERE carID=$carID";
  $carbuy = "DELETE FROM cust_buy WHERE carID=$carID";
  $refund = "DELETE FROM refund WHERE carID=$carID";
  $favourite = "DELETE FROM favourite WHERE carID=$carID";

  mysqli_query($con,$carpurchase);
  mysqli_query($con,$carimage); 
  mysqli_query($con,$carbuyap); 
  mysqli_query($con,$carbuy); 
  mysqli_query($con,$refund);  
  mysqli_query($con,$favourite);


  // Create SQL code to delete the car record
  $car = "DELETE FROM car WHERE carID=$carID";

  // If the SQL code failed to execute     
  if (!mysqli_query($con,$car)) {
    // Close engineiva database connection  
    mysqli_close($con);
    // Echo delete failed and direct back to modify and remove page
    echo '<script>alert("Car Delete Failed!"); window.location.href="ad-modify-remove.php";</script>;';
  }
  // Else if the SQL code successfully excuted
  else {
    // Close engineiva database connection  
    mysqli_close($con);
    // Echo car deleted and direct back to modify and remove page
    echo '<script>alert("Car Deleted!");
    window.location.href= "ad-modify-remove.php";
    </script>';
  }
    
?>