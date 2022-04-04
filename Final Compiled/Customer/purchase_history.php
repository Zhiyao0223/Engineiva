<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css.css?v=<?php echo time(); ?>">
</head>
<body>


<?php
session_start();
if(isset($_SESSION['mysession'])) {
  $id = $_SESSION['custID'];
  include("header_login.php");
  } else {
    echo '<script>alert("Please Log In to Continue");
    window.location.href= "homepage.php";
    </script>';
  }
?>


<?php
include ("conn.php");
$result = mysqli_query($con, "SELECT * FROM cust_buy INNER JOIN car ON cust_buy.carID = car.carID INNER JOIN car_image ON cust_buy.carID = car_image.carID WHERE cust_buy.custID = $id GROUP BY cust_buy.carID");
?>


<div class = "section">
    <button class = "back"> Back </button>
    <h1 style = "margin-bottom: 50px;"> Purchase History </h1>


    <?php 
    while($row = mysqli_fetch_array($result)){
    ?>
    <div class = "history_box">
        <div class = "history_box1">
            <div class = "box_inside">
                <div class = "history_box_inside1">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="400">' ?>
                </div>


                <div class = "history_box_inside2">
                    <div class = "history_box_display">
                        <div class = "history_box_display1">
                            <h3 style = "font-size: x-large; margin-left: 25px; margin-top: 20px; margin-bottom: 30px;"> <?php echo $row['brand']; echo "&nbsp"; echo $row['model'];?> </h2>
                            <h3> Year: <?php echo $row['year'];?> </h3>
                            <h3> Variant: <?php echo $row['variant'];?> </h3>
                            <h3> Engine: <?php echo $row['engine'];?> </h3>
                            <h3> Transmission: <?php echo $row['transmission'];?> </h3>
                            <h3> Mileage: <?php echo $row['mileage'];?> </h3>
                        </div>
                        

                        <div class = "history_box_display1">
                            <h3 style = "margin-top: 100px"> Price: RM <?php echo $row['price'];?> </h3> 
                            <h3> Date: <?php echo $row['date'];?> </h3> 
                            <h3> Secure Fee: RM<?php echo $row['secureFee'];?> </h3> 
                            <h3> Paid with: <?php echo $row['paymentMethod'];?> </h3> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    }
    ?>
</div>

<?php
include("footer.php");
?>

</div>



</body>
</html>