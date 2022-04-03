<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css.css?v=<?php echo time(); ?>">
</head>
<body>


<?php
session_start();
include("footer.php");
if(isset($_SESSION['mysession'])) {
  include("header_login.php");
  } else {
  include("header_cust.php");
  }
?>


<div class = about_us_box>
    <h2 class = about_us>About Us</h2>
    <div class = about_us_box_2>
        <p class = about_us_box_p> Engineiva is a Online Platform that allows the selling or purchasing of cars all over Malaysia with just a click of a button.
            We aim to digitalize Malaysia's second-hand car industry by improving the experience of selling and purchasing of cars. <br><br>
            Our vision? Is to drive Malaysia's automotive industry forward regarding the second-hand car ecosystem.
            Engineiva will only ensure that the only best price will be provided for our customers and the transaction will be completely secure and confidential. </p>
    </div>
</div>







</body>
</html>