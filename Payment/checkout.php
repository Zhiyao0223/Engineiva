<?php
include('conn.php');

    $carID = $_POST['carID'];
    $car = "SELECT * FROM car WHERE carID='$carID'";
    $record = mysqli_query($con,$car);
    $row = mysqli_fetch_array($record);

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="checkout.css">
</head>
<script>
function myFunction() {
  // Get the value of the input field with id="numb"
  let x = document.getElementsByName("cvv")[0].value;

  let text;
  if (isNaN(x) || x < 100 || x > 999) {
    alert("CVV Error!");
    document.getElementsByName("cvv")[0].value = "";
    return;
  } 
  document.getElementsByName("cvv")[0].value = x;
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
                <input type="number" min="01" max="12" id="partitioned" name="expmonth" placeholder="01-12" required>
              </div>
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="number" min="22" max="27" id="partitioned" name="expyear" placeholder="22-27" required>
              </div>
            </div>
            <div class="row">
                <label for="cvv">CVV</label>
                <input type="number" id="partitioned" name="cvv" placeholder="CVV" onblur="myFunction()" required>
            </div>
          </div>
      </form>
    </div>
  </div>

    <form method="post">
        <center><input type="submit" class="btn" name="submitBtn" value="Checkout"/></center>
    </form>

</div>
</body>
<?php
    if (isset($_POST['submitPromo'])){        //check whether promocode exists
      $SQL = "SELECT * FROM promocode";
      $record = mysqli_query($con,$SQL);
      $promo = $_POST['promocode'];
      while($rows = mysqli_fetch_array($record)){
          if ($promo == $rows['promocode']){
              $true = "<script>alert('Valid Promocode!!')</script>";
              echo $true;

              // Replace discount box with promocode discount
              $offer = $rows['offer'];
              $script = "<script>
                            var discountBox = document.getElementById('discount').innerHTML;
                            document.getElementById('discount').innerHTML = '$offer';
                            document.getElementById('submitPromoCode').style.display = 'none';
                            document.getElementById('promoInput').value = '$promo';

                            // Change Attribute of input box
                            document.getElementById('promoInput').readOnly = true;
                            document.getElementById('promoInput').style.border = 'none';
                            document.getElementById('promoInput').style.outline = 'none';
                            document.getElementById('promoInput').style.textAlign = 'right';
                            document.getElementById('promoInput').style.color = 'grey';
                          </script>";
              echo $script;
              $total= $secure-$offer;
              
              $scripttotal="<script>
                        document.getElementById('total').innerHTML = '$total';
              </script>";
              echo $scripttotal;
          }
          else {
              $false = "<script>alert('Invalid Promocode!!')</script>";
              echo $false;
          }
      }

  }
?>

<?php
  if (isset($_POST['submitBtn'])) {
	include("conn.php");
    
  $custID;//session
  $date = date('Y-m-d'); //set current date and time
	$sql1="INSERT INTO cust_buy (carID, custID, date, secureFee, paymentMethod) 
        VALUES ('$carID','?session?','$date','$total','Credit Card')";
    
    $sql = "UPDATE car SET 
    sellStatus = 'Sold' 
    WHERE carID='$carID'";
    


	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	else {
    mysqli_query($con,$sql1);
		echo '<script>alert("Payment Successful!");
    
    </script>';
	}

	mysqli_close($con);
 }
?>