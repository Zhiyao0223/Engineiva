<?php
///include("session.php")
?>
<?php $car = "SELECT * FROM car where carID" = $_POST['nameFrom ZY']
$record = mqli_query ...($conn. $SQL)
while fetch query
--->
<!-- if isset() 
include conn

$SQL = "SELECT * FROM promotion"
$record = mqli_query ...($conn. $SQL)
while fetch query
if ($POST[promo] == $record['promocode']{​
  fetch
  
$price = $car[price] - 2000;

}​
-->
  

<?php
 if (isset($_POST['submitBtn'])) {
	include("conn.php");

	$sql="INSERT INTO cust_buy () 
  
  VALUES ('$_POST[]','$_POST[]','$_POST[]','$_POST[]','$_POST[]','$_POST[]','$_POST[]','$_POST[]'";

  $sql = "UPDATE FROM ??";
    

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	else {
		echo '<script>alert("Payment Successful!");
    window.location.href= "homepage.php";
    </script>';
	}

	mysqli_close($con);
 }
?>




<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="checkout.css">
<script src="checkout.js"></script>


</head>
<body>
<!DOCTYPE html>
<head>
    <title>Secure your car now.</title>

    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="col-25">
    <div class="container">
      <h1>Checkout
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
        </span>
      </h1>
      <p>Brand and Model <span class="price"></span></p>
      <p>Price <span class="price">100,000</span></p>
      <p>Secure 1% <span class="price">1,000</span></p>
      <!-- form action="checkout.php" method="POST" -->
      <p>Promo Code <span class="price"><input name="promo" style="width:70px"></span></p>
      <!-- </form> -->
      <p>Discount <span class="price">-200</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b><!-- echo $price --> $11111</b></span></p>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      <h2>Please fill in below information.</h2>
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname">Full Name</label>
            <input type="text" id="partitioned" name="contact_name">
            <label for="email">Email</label>
            <input type="text" id="partitioned" name="contact_email">
            <label for="adr">Address</label>
            <input type="text" id="partitioned" name="contact_address">
            <label for="city">City</label>
            <input type="text" id="partitioned" name="contact_city">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="partitioned" name="contact_state">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="partitioned" name="contact_zip">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="cname">Name on Card</label>
            <input type="text" id="partitioned" name="cardname">
            <label for="ccnum">Card number</label>
            <input type="text" id="partitioned" name="cardnumber">
            

            <div class="row">
              <div class="col-50">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="partitioned" name="expmonth">
              </div>
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="partitioned" name="expyear">
              </div>
            </div>
            <div class="row">
                <label for="cvv">CVV</label>
                <input type="text" id="partitioned" name="cvv">
            </div>
          </div>
      </form>
    </div>
  </div>

  <?php
       
    ?>
    <form method="post">
        <center><input type="submit" class="btn" name="submitBtn" value="Checkout"/></center>
    </form>
 
</div>

