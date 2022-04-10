<?php
  // Connect engineiva database  
  include("conn.php");

  // Retrieve carID from URL
  $custID = $_GET['custID'];

  // Create SQL code to other record that reference the cust
  $sellap = "DELETE FROM sell_appointment WHERE custID=$custID";
  $buyap = "DELETE FROM buy_appointment WHERE custID=$custID";
  $support = "DELETE FROM support_ticket WHERE custID=$custID";
  $refund = "DELETE FROM refund WHERE custID=$custID";
  $favourite = "DELETE FROM favourite WHERE custID=$custID";
  $custsell = "DELETE FROM cust_sell WHERE custID=$custID";
  $custbuy = "DELETE FROM cust_buy WHERE custID=$custID";
  
  mysqli_query($con,$sellap); 
  mysqli_query($con,$buyap); 
  mysqli_query($con,$support); 
  mysqli_query($con,$refund);  
  mysqli_query($con,$favourite);
  mysqli_query($con,$custsell); 
  mysqli_query($con,$custbuy);


  // Create SQL code to delete the cust record
  $cust = "DELETE FROM customer WHERE custID=$custID";

  // If the SQL code failed to execute     
  if (!mysqli_query($con,$cust)) {
    // Close engineiva database connection  
    mysqli_close($con);
    // Echo delete failed and direct back to modify and remove page
    echo '<script>alert("Customer Record Delete Failed!"); window.location.href="ad-view-customer.php";</script>;';
  }
  // Else if the SQL code successfully excuted
  else {
    // Close engineiva database connection  
    mysqli_close($con);
    // Echo car deleted and direct back to modify and remove page
    echo '<script>alert("Customer Record Deleted!");
    window.location.href= "ad-view-customer.php";
    </script>';
  }
    
?>