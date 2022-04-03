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
        <a href="CarCategory.php"><button class="dropbtn">Buy</button></a>
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
            <a href="accountpage.php">My Account</a>
            <a href="logout.php">Log Out</a>
          </div>
        </div> 
        <a href="SignUp.php">Sign Up</a>
      </div>
    </div>
  </div>
</body>
   