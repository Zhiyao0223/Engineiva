<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Engineiva</title>
    <link rel="stylesheet" href="header_cust.css">
</head>
<body>
  <div class="fixed-header">
    <div class="topnav">
      <a href ="homepage.php" class="logoStyle">Engineiva</a>
      <div class="dropdown">
        <a href="CarCategory.php" style='cursor:pointer;'><button class="dropbtn">Buy</button></a>
        <div class="dropdown-content">
          <div class="column" id="car_column1">
            <a href="CarCategory.php?brand=BMW">BMW</a>
            <a href="CarCategory.php?brand=Mazda">Mazda</a>
            <a href="CarCategory.php?brand=Mini">Mini</a>
            <a href="CarCategory.php?brand=Perodua">Perodua</a>
            <a href="CarCategory.php?brand=Subaru">Subaru</a>
            <a href="CarCategory.php?brand=Volkswagen">Volkswagen</a>

          </div>
          <div class="column" id="car_column2">
            <a href="CarCategory.php?brand=Honda">Honda</a>
            <a href="CarCategory.php?brand=Mercedes">Merdeces</a>
            <a href="CarCategory.php?brand=Nissan">Nissan</a>
            <a href="CarCategory.php?brand=Proton">Proton</a>
            <a href="CarCategory.php?brand=Toyota">Toyota</a>
          </div>
        </div>
      </div>
      <a href="homepage.php">Sell</a>    
      <a href="faq.php">FAQ</a>
      <a href="about_us.php">About Engineiva</a> 

      <div class="right-header">
        <div class="dropdown">
          <button class="dropbtn"><a href="#">My Account</a></button>
          <div class="dropdown-content">
            <a href="accountpage.php">View profile</a>
            <a href="edituser.php?id=<?php echo $_SESSION['custID']?>">Edit profile</a>
            <a href="favourite.php">Favourite Car</a>
            <a href="view_appointment.php">View appointment</a>
            <a href="purchase_history.php">Purchase History</a>
            <a href="logout.php">Log Out</a>
          </div>
        </div> 
        
      </div>
    </div>
  </div>
</body>
   