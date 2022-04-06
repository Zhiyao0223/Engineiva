<?php
include('session.php');
include('conn.php');

  if (!(isset($_SESSION['mysession']))) {
    echo "<script>alert('Please login to proceed')
                window.location.href='userlogin.php';
        </script>";
  }
  if (isset($_POST['carID'])) {
    $carID = $_POST['carID'];
  }
  else {
    echo "<script>alert('Please login to proceed')
              window.location.href='userlogin.php';
          </script>";
  }

  $car = "SELECT * FROM car WHERE carID='$carID'";
  $record = mysqli_query($con,$car);
  $row = mysqli_fetch_array($record);
  $total = "";

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="checkout.css">
</head>
<body>
<!DOCTYPE html>
<head>
    <title>Secure your car now.</title>
    <script src="script.js"></script>
</head>
<body>
  <div class='main-container'>
    <div class="col-25">
        <div class="container">
          <h1>Checkout
            <span class="price" style="color:black">
              <i class="fa fa-shopping-cart"></i>
            </span>
          </h1>
          <p>Brand<span class="price"><?php echo $row['brand']?></span></p>
          <p>Model<span class="price"><?php echo $row['model']?></span></p>
          <p>Price<span class="price">RM<?php echo $row['price'] ?></span></p>
          <p>Secure 1% <span class="price">RM<?php $secure = ($row['price']*0.01); echo $secure;?></span></p>
          <form action="checkout.php" method="post" action='#'>
            <p>Promo Code <span class="price"><input name="promocode" id='promoInput' style="width:70px">&nbsp<button type="submit" id='submitPromoCode' name="submitPromo">Submit</button></span></p>
            <input type='text' name='carID' value='<?php echo $carID; ?>' hidden>
          </form>
          <p>Discount <span class="price" id='discount'></span></p>
          <hr>
          <p>Total <span class="price" id='total'>RM<?php echo $secure;?></span></p>
        </div>
      </div>
    </div>

    <form action="#" method='post'>
      <div class="row">
        <div class="col-75">
          <div class="container2">

              <h2>Please fill in below information.</h2><br>
              <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname">Full Name</label>
                <input type="text" id="partitioned" name="contact_name" required>
                <label for="email">Email</label>
                <input type="text" id="partitioned" name="contact_email" required>
                <label for="adr">Address</label>
                <input type="text" id="partitioned" name="contact_address" required>
                <label for="city">City</label>
                <input type="text" id="partitioned" name="contact_city" required>

                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="partitioned" name="contact_state" required>
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="partitioned" name="contact_zip" required>
                  </div>
                </div>
              </div>

              <div class="col-50">
                <h3>Payment</h3>
                <label for="cname">Name on Card</label>
                <input type="text" id="partitioned" name="cardname" required>
                <label for="ccnum">Card number</label>
                <input type="text" id="partitioned" name="cardnumber" required>
                <input type='text' name='carID' value='<?php echo $carID; ?>' hidden>

                <div class="row">
                  <div class="col-50">
                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="partitioned" name="expmonth" required>
                  </div>
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="partitioned" name="expyear" required>
                  </div>
                </div>
                <div class="row">
                    <label for="cvv">CVV</label>
                    <input type="text" id="partitioned" name="cvv" required>
                </div>
              </div>
              <div class='submit-section'>
                <input type="submit" class="btn submitBtn" name="submitBtn" value="Checkout"/></center>
            </div>
          </div>
      </div>

    </form>
  </div>
</body>
<?php
    include("conn.php");
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

  if (isset($_POST['submitBtn'])) {
    //session
    $custID = $_SESSION['custID'];
    //set current date
    $date = date('Y-m-d'); 
    $carID = $_POST['carID'];
    $sql="INSERT INTO cust_buy (carID, custID, date, secureFee, paymentMethod) 
        VALUES ('$carID','$custID','$date','$total','Credit Card')";
    
    $sql1 = "UPDATE car SET 
            sellStatus = 'Sold' 
            WHERE carID='$carID'";
        


    if ($mysql = mysqli_query($con,$sql)){
      mysqli_query($con,$sql1);
      // echo "<script>alert('Payment Successful!');
      //         window.location.href='homepage.php';
      //         </script>";
    }
    else {
      die('Error: ' . mysqli_error($con));
    }
}



  mysqli_close($con);
?>
</html>