<?php
// include('conn.php');

//     $carID = $_POST['carID'];
//     $car = "SELECT * FROM car WHERE carID='$carID'";
//     $record = mysqli_query($con,$car);
//     $row = mysqli_fetch_array($record);

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="checkout.css">
</head>
<script>
  function checkRates() {
    var input = document.getElementsByName("cvv")[].innerHTML;
    alert(input.length);
    if (input.length > 3) {
        document.getElementsByName("cvv").value = input.slice(0,3);
    }

    // Check for zero rates
    if (input.length != 3) {
            alert("Error!");
            document.getElementsByName("cvv").value = "";
            exit(0);
    }

}
</script>
<body>
<!DOCTYPE html>
<head>
    <title>Secure your car now.</title>

    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      <h2>Please fill in below information.</h2>
      <br>
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname">Full Name</label>
            <input type="text" id="partitioned" name="contact_name" placeholder="Full Name" required>
            <label for="email">Email</label>
            <input type="text" id="partitioned" name="contact_email" placeholder="Email Address" required>
            <label for="adr">Address</label>
            <input type="text" id="partitioned" name="contact_address" placeholder="Address" required>
            <label for="city">City</label>
            <input type="text" id="partitioned" name="contact_city" placeholder="City" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="partitioned" name="contact_state" placeholder="State" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip Code</label>
                <input type="text" id="partitioned" name="contact_zip" placeholder="Zip Code" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="cname">Name on Card</label>
            <input type="text" id="partitioned" name="cardname" placeholder="Card Owner" required>
            <label for="ccnum">Card number</label>
            <input type="text" id="partitioned" name="cardnumber" placeholder="Card Number" required>
            

            <div class="row">
              <div class="col-50">
                <label for="expmonth">Exp Month</label>
                <input type="number" id="partitioned" name="expmonth" placeholder="ExpMonth" required>
              </div>
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="number" id="partitioned" name="expyear" placeholder="ExpYear" required>
              </div>
            </div>
            <div class="row">
                <label for="cvv">CVV</label>
                <input type="number" id="partitioned" name="cvv" placeholder="CVV" onblur="checkRates()" required>
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
</body>
