<?php 
        include('session.php');
?>


<?php

    include("conn.php");

    //$_GET[‘id’] —Get the integer value from id parameter in URL. 
    $id=$_GET['id'];


    $result=mysqli_query($con,"DELETE FROM promocode WHERE id=$id");

    mysqli_close($con);//close database connection

    header('Location: ad-promotion-detail.php'); //redirect the page to view.phppage




  // If the SQL code failed to execute     
  if (!mysqli_query($con,$promo)) {
    // Close engineiva database connection  
    mysqli_close($con);
    // Echo delete failed and direct back to promotion detail page
    echo '<script>alert("Promotion Delete Failed!"); window.location.href="ad-promotion-detail.php";</script>;';
  }
  // Else if the SQL code successfully excuted
  else {
    // Close engineiva database connection  
    mysqli_close($con);
    // Echo car deleted and direct back to promotion detail page
    echo '<script>alert("Promotion Deleted!");
    window.location.href= "ad-promotion-detail.php";
    </script>';
  }
    
?>