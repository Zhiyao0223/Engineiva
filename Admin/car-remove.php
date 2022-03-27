<?php
  // Connect engineiva database  
  include("db.php");

  // Retrieve carID from URL
  $carID = $_GET['carID'];

  // Create SQL code to delete the car record
  $sql = "DELETE FROM car WHERE carID=$carID";

  // If the SQL code failed to execute     
  if (!mysqli_query($con,$sql)) {
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