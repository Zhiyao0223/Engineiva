<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-buy-record.css">
</head>
<body>
    <?php include "ad-session.php"?>

    <?php 
        include 'admin-header.php';
    ?>

    <div class="submenu">   
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php"  class="active">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
        </ul>
    </div>

    <?php 
        // If admin click the upload button      
        if(isset($_POST["uploadBtn"])){ 
            // Connect engineiva database 
            include 'conn.php';
            //  Get car id from the URL
            $car_id = intval($_GET['carID']);

            // Create SQL code that insert car purchase record into cust_sell table
            $sql="INSERT INTO cust_sell (CarID, CustID, Date, Price, Fees) VALUE
            ('$car_id','$_POST[custID]','$_POST[dob]','$_POST[price]','$_POST[fees]')";

            // If the SQL code failed to execute
            if (!mysqli_query($con,$sql)) {
                // Close engineiva database connection
                mysqli_close($con);
                // Display an alert on insert error
                echo '<script>alert("Failed to add car purchase record!");</script>;';
            }
            // Else if the SQL successfully executed
            else {
                // Close engineiva database connection
                mysqli_close($con);
                // Display insert success and direact to add car image page
                echo '<script>alert("Car purchase record added successfully!");
                window.location.href= "ad-add-image.php?carID='.$car_id.'";
                </script>';
            }
        }
    ?>
   
     <!-- Start of main content -->
    <div class="content-container">
        <h2>Add New Car</h2>
        <!-- Start of car purchase section -->
        <div class="purchase-form">
            <div class="form-header">PURCHASE RECORD</div>

            <!-- Start of check user existence form -->
            <form action="" method="POST">
                <div class="check-form">
                    <div class="check-attribute">
                        <div class="field">Cust Email: 
                            <input type="text" placeholder="Enter Cust Email" name="email" 
                            <?php
                            // Retrive back email after checked as default      
                            if(isset($_POST["checkBtn"])){
                                echo"value='".$_POST['email']."'";
                            }
                            ?> required>
                        </div>
                    </div>
                    <div class="check-field">
                        <input type="submit" class="button check" name="checkBtn" value="Check user"> 
                    </div>
                </div>
            </form>
            <!-- End of check user existence form -->

            <!-- Start of purchase record form -->
            <form action="" method="POST">
                <!-- Start of form input -->
                <div class="form-input">
                    <div class="attribute ">
                        <div class="field">
                            Date: <input type="date" name="dob" required="required">
                        </div>
                    </div>
                    
                    <div class="attribute ">
                        <div class="field">
                            Price(RM): <input type="number" min=0 step="0.01" placeholder="Enter Purchase Price" name="price" required>
                        </div>
                    </div>

                    <div class="attribute ">
                        <div class="field">
                            Fees(RM): <input type="number" min=0 step="0.01" placeholder="Enter External Fees" name="fees" required>
                        </div>
                        <div class="side-note">
                            incl. road tax, 1-Year Warranty, Ownership Transfer Fee, Puspakom Inspaction Fee, Loan Processing Fee
                        </div>
                    </div> 
                </div>
                <!-- End of form input -->
                 
                <!-- Start of check user existence result section -->
                <?php 
                    // If admin click the check button    
                    if(isset($_POST["checkBtn"])){ 
                        // Connect engineiva database 
                        include "conn.php";
                        // Create SQL code that display customer record where email is equal to admin input
                        $result = mysqli_query($con,"SELECT * FROM customer WHERE email = '$_POST[email]'");
                        // If customer record exists in database
                        if(mysqli_num_rows($result)>0){
                            // Fetch the customer record and display
                            while($user = mysqli_fetch_array($result)){
                ?>
                                <div class='result-attribute'>
                                    <div class='result-field'>
                                        Customer's Details
                                        <table class='table-result'>
                                            <tr><td class='title'>Cust ID:</td><td>CUST<?php echo $user['custID'];?></td></tr>
                                            <tr><td class='title'>Full Name:</td><td><?php echo $user['firstName']." ".$user['lastName'];?></td></tr>
                                            <tr><td class='title'>Gender:</td><td><?php echo $user['gender'];?></td></tr>
                                            <tr><td class='title'>Email:</td><td><?php echo $user['email'];?></td></tr>
                                            <tr><td class='title'>Phone Number:</td><td><?php echo $user['phoneNum'];?></td></tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <input type='hidden' name='custID' value='<?php echo $user['custID'];?>' required>

                                <div class="buttons-field">
                                    <input type="submit" class="button submit" value="Add" name="uploadBtn"> 
                                    <input class="button cancel" type="button" value="Cancel" onclick="history.back()">
                                </div>
                                
                <?php
                            // End of fetching if exist
                            }
                        // If customer doesn't exist in database     
                        } else {
                ?>
                                <div class='result-attribute'>
                                    <div class='result-field'>
                                        Customer's Details
                                        <div class='no-result'>
                                            Result Not found. <br>  Please Enter Another Cust Email!
                                        </div>
                                    </div>
                                </div>
                <?php                
                        }
                    }
                ?>
                <!-- End of check user existence result section --> 
                
                <!-- start of purchase record form (side note) -->
                <div class="attribute note">* Please ensure a valid user is entered!<br> * Please ensure all details are correct (unchangeable afterward)</div>
            </form>
            <!-- End of purchase record form --> 
        </div>
        <!-- End of car purchase section -->
    </div>
    <!-- End of main content -->
</body>
</html>