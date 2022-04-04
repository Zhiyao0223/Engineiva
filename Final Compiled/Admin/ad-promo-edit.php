<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Profile</title>
    
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
      * {
        box-sizing: border-box;
      }
      body {
        font-family: "Montserrat", sans-serif;
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
        width: 130px;
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
      }
    </style>
  </head>
  <body>
  
    <?php 
    include('conn.php');
    $id = intval($_GET['promocode']);
    $result = mysqli_query($con, "SELECT * FROM promocode WHERE promo = $id");
    while ($row = mysqli_fetch_array($result))
    {
    ?>

    <form action="update_user.php" method="POST" ENCTYPE="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['promo']; ?>">
    <h2>Customer Profile</h2>
    <h3>Edit Profile</h3>
      <p>* required fields</p>
      <div class="inputs">
        <label for="Promocode">Promocode <span class="required">*</span></label>
        <span>:</span>
        <input type="text" name="promo" placeholder="Enter Promocode" required autocomplete="on" value="<?php echo $row['promo']; ?>"/>
      </div>
      <div class="inputs">
        <label for="Offer">Offer <span class="required">*</span></label>
        <span>:</span>
        <input type="text" name="value" placeholder="Enter Offer Value" required autocomplete="on" value="<?php echo $row['offer']; ?>"/>
      </div>
      
      <div class="finale">
        <div class="button">
          <input type="submit" value="Update" />
          <input type="reset" value="Reset" />
        </div>
      </div>
    </form>


    <?php
    }
    mysqli_close($con);
    ?>
  </body>
</html>
