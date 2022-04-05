<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Promocode</title>
    <link rel="stylesheet" href="ad-add-new-car.css">
    <link rel="stylesheet" href="ad-car-edit.css">
  </head>
  <body>
  
 
<?php include "ad-session.php"?>
    
    <?php   
        include 'admin-header.php';
    ?>
<?php
    include('conn.php');
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }
    else {
      echo  "<script>
                alert('Error on retrieving promocode.');
                window.location.href='ad-promotion-detail.php';
            </script>";
    }
    
    $result = mysqli_query($con, "SELECT * FROM promocode WHERE id = '$id'");
    while ($row = mysqli_fetch_array($result))
    {
  ?>
<div class="submenu">   
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php"">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php" class="active">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
            <li><a href="ad_order_history.php">Order History</a></li>
            <li><a href='AdminReport.php'>Report Generation</a></li>
        </ul>
    </div>

    <div class="content-container">
      <h2>Promocode Detail</h2>
      <div class="edit-car-form">
      <div class="form-header">
        EDIT PROMOTION DETAILS
      </div>
    <div class="form-content">
    <form action="ad-promo-update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
    <div class="attribute">
      <div class="field">
        Promocode: <input type="text" name="promocode" placeholder="Enter Promocode" required autocomplete="on" value="<?php echo $row['promocode']; ?>"/>
      </div>
    </div>
    <div class="attribute">
      <div class="field">
        Offer: <input type="text" name="offer" placeholder="Enter Offer Value" required autocomplete="on" value="<?php echo $row['offer']; ?>"/>
      </div>
    </div>
    <div class="twobutton ">
      <input type="submit" class="abutton submit" name="updateBtn" value="Update"> 
      <input class="abutton cancel" type="button" value="Cancel" onclick="history.back()">
    </div>
    </form>
  </div>
  </div>
  </div>
    <?php
    }
    mysqli_close($con);
    ?>
  </body>
</html>
