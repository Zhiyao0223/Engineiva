<html lang=en>
<head>
<link rel="stylesheet" href="ad-add-new-car.css">
<link rel="stylesheet" href="ad-car-edit.css">    
<link rel="stylesheet" href="ad-modify-remove.css">
</head>
<body>
<?php include "ad-session.php";
        include 'admin-header.php'; ?>
<?php 
         // If user click the upload button      
        if(isset($_POST["uploadBtn"])){ 
            // Connect engineiva database   
            include("conn.php");
            // Create SQL code that insert all the input into car table
            $sql="INSERT INTO promocode (promocode, offer) VALUE ('$_POST[promocode]','$_POST[offer]')";

            // If the SQL code failed to execute
            if (!mysqli_query($con,$sql)) {
                // Display an alert on insert error
                echo '<script>alert("Failed to add new promocode!");</script>;';
                // Close engineiva database connection
                mysqli_close($con);
            }
            // Else if the SQL successfully executed
            else {
                // Retrieve the carID that insert by auto_increment
                $last_id = mysqli_insert_id($con);
                // Close engineiva database connection
                mysqli_close($con);
                // Display insert success and direact to purchase record page
                echo '<script>alert("New promocode successfully added!");
                window.location.href= "ad-promotion-detail.php";
                </script>';
            }

        }
    ?>
<div class="submenu">
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php" class="active">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
            <li><a href="ad_order_history.php">Order History</a></li>
            <li><a href='AdminReport.php'>Report Generation</a></li>
        </ul>
    </div>
    <!-- Start of main content -->
    <div class="content-container">
        <h2>Add New Promocode</h2>
        <!-- Start of add car section -->
        <div class="add-car-form">
            <div class="form-header">
                 ADD NEW Promocode
            </div>
            <form action="" method="POST">
                <!-- Start of add promocode form -->
                <div class="attribute ">
                    <div class="field">
                        Promocode: <input type="text" name="promocode" placeholder="Enter Promocode" required>
                    </div>
                </div>
                <div class="attribute ">
                    <div class="field">
                        Offer: <input type="text" name="offer" placeholder="Enter Offer Value" required>
                    </div>
                </div>
          
                <!-- Start of add promocode form (buttons) -->
                <div class="twobutton ">
                    <input type="submit" class="abutton submit" name="uploadBtn" value="Add"> 
                    <input class="abutton cancel" type="button" value="Cancel" onclick="history.back()">
                </div>
                <!-- End of add car form (buttons) -->
            </form>
        </div>
        <!-- End of add car section -->
    </div>
    </body>