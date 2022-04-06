<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
      * {
        box-sizing: border-box;
      }
      body {
        margin-top:70px;
        font-family: 'Open Sans', sans-serif;
        padding-top: 50px; /*50px for the height of the navbar + 37px for the offset*/
        padding-bottom: 50px; /*50px for the height of the bottom navbar*/
        margin: 0;
        height: 100vh;
        font-weight: 100;
        background: radial-gradient(#c3dee1,#5eb0ea,#67def6);
        -webkit-overflow-Y: hidden;
        -moz-overflow-Y: hidden;
        -o-overflow-Y: hidden;
        overflow-y: hidden;
        -webkit-animation: fadeIn 1 1s ease-out;
        -moz-animation: fadeIn 1 1s ease-out;
        -o-animation: fadeIn 1 1s ease-out;
        animation: fadeIn 1 1s ease-out;
}
      
      h2,
      h3 {
        padding-left: 15px;
      }

      .inputs {
        display: flex;
        align-items: center;
        margin: 15px;
      }

      .inputs label {
        width: 120px;
        padding-right: 20px;
        overflow-wrap: break-word;
        font-size: 1rem;
      }
      
      .required{
        color: red;
      }

      span {
        padding-right: 10px;
      }

      p{
        font-size: 0.75rem;
        color: red;
        padding-left: 15px;
      }

      input[type="text"],
      input[type="tel"],
      input[type="email"],
      input[type="date"],
      textarea,
      select {
        width: 250px;
        font-family: "Montserrat", sans-serif;
        border-radius: 5px;
        border: 0.005px solid #000;
        font-size: 15px;
        outline: none;
      }

      input[type="text"],
      input[type="tel"],
      input[type="email"],
      input[type="date"],
      select {
        height: 1.5rem;
      }

      input[type="text"]:focus:valid,
      input[type="tel"]:focus:valid,
      input[type="email"]:focus:valid,
      textarea:focus:valid {
        background-color: #ccffcc;
        border: 1px solid #009900;
      }

      input[type="text"]:focus:invalid,
      input[type="tel"]:focus:invalid,
      input[type="email"]:focus:invalid,
      textarea:focus:invalid {
        background-color: #ffcccc;
        border: 1px solid #ff3333;
      }

      .finale {
        display: grid;
        grid-template-columns: 130px 15px 200px;
        column-gap: 5px;
      }

      .button {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 5px;
        position: relative;
        left:90%
      }
      .container{
        width: 400px;
        margin-left: auto;
        margin-right: auto;
        margin-top:2%;
        border-radius: 15px;
        background: white;
        padding: 20px; 
      }
      
      
    </style>
  </head>
  <body>
  
    <?php 
    include('conn.php');
    include('session.php');
    $id = intval($_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM customer WHERE custID = $id");
    while ($row = mysqli_fetch_assoc($result))
    {
    ?>

  <div class = "container">
    <form action="update_user.php" method="POST" ENCTYPE="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['custID']; ?>">
    <h2>Customer Profile</h2>
    <br>
    <h3>Edit Profile</h3>

      <p>* required fields</p>
      <div class="inputs">
        <label for="First Name">First Name <span class="required">*</span></label>
        <span>:</span>
        <input type="text" name="FirstName" placeholder="Enter Your First Name" required autocomplete="on" value="<?php echo $row['firstName']; ?>"/>
      </div>
      <div class="inputs">
        <label for="Last Name">Last Name <span class="required">*</span></label>
        <span>:</span>
        <input type="text" name="LastName" placeholder="Enter Your Last Name" required autocomplete="on" value="<?php echo $row['lastName']; ?>"/>
      </div>
      <div class="inputs">
        <label for="Email Address">Email Address <span class="required">*</span></label>
        <span>:</span>
        <input type="email" name="email" placeholder="Enter Your Email Address" required autocomplete="on" value="<?php echo $row['email']; ?>"/>
      </div>
      <div class="inputs">
        <label for="Password">Password <span class="required">*</span></label>
        <span>:</span>
        <input type="password" name="password" placeholder="Enter Your New Password" required autocomplete="on" value="<?php echo $row['password']; ?>"/>
      </div>

        <div class="field" style="padding-top:10px;">
        <div class ="inputs">
        <label for "Gender">Gender <span class="required">*</span></label>
          <span>:<span>
            <input type="radio" name="gender" 

            <?php if($row['gender']=="Male"){
                echo 'checked="checked"';
            }?>

            value="Male" required="required"> &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;


            <input type="radio" name="gender" 

            <?php if($row['gender']=="Female"){
                echo 'checked="checked"';
            }?>

            value="Female" required="required"> &nbsp;&nbsp;Female
        </div>
      </div>
      <div class="inputs">
        <label for="DOB">Date of Birth <span class="required">*</span></label>
        <span>:</span>
        <input type="text" name="DOB" placeholder="Enter Your Date of Birth" required autocomplete="on" value="<?php echo $row['DOB']; ?>"/>
      </div>
      <div class="inputs">
        <label for="phone_num">Phone Number <span class="required">*</span></label>
        <span>:</span>
        <input type="tel" name="phoneNum"  placeholder="Enter Your Phone Number" required/ value="<?php echo $row['phoneNum']; ?>">
      </div>
      <div class="inputs">
        <label for="Identification Card">Identification Card Number <span class="required">*</span></label>
        <span>:</span>
        <input type="text" name="identityCard" value="<?php echo $row['identityCard']; ?>" placeholder="Enter Your Identification Card Number" required/>
      </div>
      <div class="inputs">
        <label for="Profile Image">Profile Image <span class="required">*</span></label>
        <span>:</span>
        <input type="file" name="img" value="" >
      </div>
      <div class="finale">
        
        <div class="button">
          <input type="submit" value="Update" />
          <input type="reset" value="Reset" />
        </div>
        
      </div>
    </form>
  </div>
 

    <?php
    }
    mysqli_close($con);
    ?>
  </body>
</html>
