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
  $id = "1";
  include("header_cust.php");
  }
?>


<div class = title>
  <img class = "img1" src= "img/car_logo.jpg">
  <h1> ENGINEIVA </h1>
  <p>Sell and Purchase Cars<p>
</div>


<form action="homepage.php" method="post" ENCTYPE="multipart/form-data" >
<input type = "hidden" name = "custID" value = "<?php echo $id ?>">


<?php echo $id?>
<div class = search_box>
  <h1> SELL YOUR CAR </h1>
  <div class = search_box_divider1>
    <div class = search_box_divider2>
      <div class = "label">
          <h4> Brand </h4>
      </div>

          <select class="sell" name = "brand" required = "required">Select Car brand</option>
              <option value="BMW">BMW</option>
              <option value="Honda">Honda</option>
              <option value="Mazda">Mazda</option>
              <option value="Mercedes">Mercedes</option>
              <option value="Mini">Mini</option>
              <option value="Nissan">Nissan</option>
              <option value="Perodua">Perodua</option>
              <option value="Proton">Proton</option>
              <option value="Subaru">Subaru</option>
              <option value="Toyota">Toyota</option>
              <option value="Volkswagen">Volkswagen</option>
          </select>
            
      <div class = "label">
          <h4> Model </h4>
      </div>

          <input class = "sell1" type = "text" name = "model" required = "required">
      
      <div class = "label">
          <h4> Year </h4>
      </div>

        <input class = "sell1" type = "number" name = "year" required = "required">
    
      <div class = "label">
          <h4> Variant </h4>
      </div>

        <input class = "sell1" name = "variant" required = "required">
            
      
      <div class = "label">
          <h4> Booking Time </h4>
      </div>

        <input class = "sell1" type = "time" name = "booking_time" required = "required">
      
          

    </div> 
    <div class = search_box_divider2>
      <div class = "label">
          <h4> Transmission </h4>
      </div>

        <select class="sell" name="transmission" required="required">
            <option value="Auto">Auto</option>
            <option value="Manual">Manual</option>
          </select>

      <div class = "label">
          <h4> Mileage </h4>
      </div>

        <input class = "sell1" type = "name" name = "mileage" required = "required">

      <div class = "label">
          <h4> Price </h4>
      </div>

        <input class = "sell1" type = "number" name = "price" required = "required">

      <div class = "label">
          <h4> Engine </h4>
      </div>

          <input class = "sell1" type = "number" name = "engine" required = "required">

      <div class = "label">
          <h4> Booking Date </h4>
      </div>

        <input class = "sell1" type = "date" name = "booking_date" required = "required">

        

    </div>   
  </div>
  <div class = "search_box_button">
      <button type = "submit" class = "search_box_button1" name = "submitBtn"> Sell now </button>
  </div>
</div>
</form>


<?php
 if (isset($_POST['submitBtn'])) {
  // if (isset($_SESSION['mysession'])){
  
	include("conn.php");


      $insert="INSERT INTO sell_appointment (custID, brand, model, year, variant, engine, transmission, mileage, price, date, time) 
      VALUES ('$_POST[custID]', '$_POST[brand]', '$_POST[model]','$_POST[year]', '$_POST[variant]', '$_POST[engine]','$_POST[transmission]','$_POST[mileage]', '$_POST[price]', '$_POST[booking_date]', '$_POST[booking_time]')";
      
      
      if (!mysqli_query($con,$insert)){
        die('Error: ' . mysqli_error($con));
      }


      else {
      echo '<script>alert("Successfully booked time");
      window.location.href= "homepage.php";
      </script>';
      }
  }

  else{
    echo '<script>alert("Please Log In to Continue");
    </script>';
  }
//  }
?>


<div class = content_box>
 <div class = box>
  <h2>Safe and Secure</h2>
  <p>We ensure to that all personal information made are protected</p>
</div>


<div class = box>
  <h2>The Best Price</h2>
  <p>We will provide the best offer available for all of our customers</p>
</div>


<div class = box>
  <h2>An Effortless Process</h2>
  <p>All paperworks will be handled by us and expect an untroubled experience</p>
</div>
</div>


<div class = product_box>
  <h1> Featured Cars </h1>


  <?php
  include ("conn.php");
  $result = mysqli_query($con, "SELECT * FROM car INNER JOIN car_image ON car.carID = car_image.carID WHERE car.carID = 1 OR car.carID = 11 GROUP BY car.carID");
  while($row = mysqli_fetch_array($result)){
  ?>


  <div class = box2>
    <div class = box_inside>
      <div class = box_inside2>
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="400">' ?>
      </div>

      <div class = box_inside3>
            <h2> <?php echo $row['brand']; echo "&nbsp"; echo $row['model'];?> </h2>
            <h3> Year: <?php echo $row['year'];?> </h3>
            <h3> Variant: <?php echo $row['variant'];?> </h3>
            <h3> Engine: <?php echo $row['engine'];?> </h3>
            <h3> Transmission: <?php echo $row['transmission'];?> </h3>
          <div class = box_inside_button>
            <button class = "box_inside_button1"><a href="CarProduct.php?carID=<?php echo $row['carID'] ?>"> See more details </a></button>
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

</body>
</html>