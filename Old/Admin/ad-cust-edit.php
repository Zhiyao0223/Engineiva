<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-add-new-car.css">
    <link rel="stylesheet" href="ad-car-edit.css">
</head>
<body>
    <?php include "ad-session.php"?>
    
    <?php   
        include 'admin-header.php';
    ?>

    <div class="submenu">   
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php" class="active">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
        </ul>
    </div>
<!-- custID, firstName, lastName, email, gender, DOB, phoneNum, identityCard-->
    <?php 
        // If admin click the upload button       
        if(isset($_POST["updateBtn"])){ 
            // Connect engineiva database 
            include("conn.php");
            
            // Retrieve carID from url
            $custID = intval($_GET['custID']); 
            
            // Create SQL code that update the car record
            $sql = "UPDATE customer SET 
            firstName ='$_POST[firstName]', 
            lastName ='$_POST[lastName]',
            email ='$_POST[email]', 
            gender ='$_POST[gender]',
            DOB ='$_POST[DOB]',
            phoneNum = '$_POST[phoneNum]',
            identityCard ='$_POST[identityCard]' 

            WHERE custID=$custID;";

            // If the SQL code failed to execute     
            if (!mysqli_query($con,$sql)) {
                // Echo modify failed
                echo '<script>alert("Modify Failed!");</script>;';
            }
            // Else if the SQL code successfully excuted
            else {
                // Echo modify failed and direct back to modify and remove page
                echo '<script>alert("Modify Success!");
                window.location.href= "ad-view-customer.php";
                </script>';
            }

        }
    ?>
    
    <!-- Start of main content -->
    <div class="content-container">
        <h2>View Customer Record</h2>
        <!-- Start of edit car section -->
        <div class="edit-car-form">
            <div class="form-header">
                 EDIT CUSTOMER'S DETAILS
            </div>
            <div class="form-content">
                <form action="" method="POST">
                    <?php
                        // Connect engineiva database  
                        include("conn.php");
        
                         // Retrieve carID from url
                        $custID = intval($_GET['custID']); 
                        // Create SQL code that display cust
                        $result = mysqli_query($con,"SELECT * FROM customer WHERE custID = '$custID'");
                    
                        // Fetch the cust record and display
                        while($cust = mysqli_fetch_array($result)){
                    ?>
                    
                            <!-- Start of edit cust form (Row 1) -->
                                <div class="attribute ">
                                    <div class="field">
                                        First Name: <input type="text" name="firstName" placeholder="Enter First Name" value="<?php echo $cust['firstName'];?>" required>
                                    </div>
                                </div>
                                <div class="attribute ">
                                    <div class="field">
                                        Last Name: <input type="text" name="lastName" placeholder="Enter Last Name" value="<?php echo $cust['lastName'];?>" required>
                                    </div>
                                </div>
                                <!-- End of edit cust form (Row 1) -->

                                <!-- Start of edit cust form (Row 2) -->
                                <div class="attribute ">
                                    <div class="field">
                                        Email: <input type="text" name="email" placeholder="Enter Email" value="<?php echo $cust['email'];?>" required>
                                    </div>
                                </div>
                                <div class="attribute ">
                                    <div class="field">
                                        Gender:
                                    <?php  
                                        echo'<select name="gender" required>
                                                <option value="Male"'; if ($cust["gender"] == "Male") echo' selected="selected" '; echo'>Male</option>
                                                <option value="Female"'; if ($cust["gender"] == "Female") echo' selected="selected" '; echo'>Female</option>
                                            </select>';
                                    ?>
                                    </div>
                                </div>
                                <!-- End of edit cust form (Row 2) -->
                
                                <!-- Start of edit cust form (Row 3) -->
                                <div class="attribute ">
                                    <div class="field">
                                        DOB: <input type="date" name="DOB" placeholder="Enter DOB" value="<?php echo $cust['DOB'];?>" required>
                                    </div>
                                </div>
                                <div class="attribute ">
                                    <div class="field">
                                        Phone Number: <input type="text" name="phoneNum" placeholder="Enter Phone Number" value="<?php echo $cust['phoneNum'];?>" required>
                                    </div>
                                </div>
                                <!-- End of edit cust form (Row 3) -->

                                <!-- Start of edit cust form (Row 4) -->
                                <div class="attribute ">
                                    <div class="field">
                                        Identtity Card: <input type="text" name="identityCard" placeholder="Enter Identity Card" value="<?php echo $cust['identityCard'];?>" required>
                                    </div>
                                </div>
                                
                                <!-- End of edit cust form (Row 4) -->

                                <!-- Start of edit cust form (buttons) -->
                                <div class="twobutton ">
                                    <input type="submit" class="abutton submit" name="updateBtn" value="Update"> 
                                    <input class="abutton cancel" type="button" value="Cancel" onclick="history.back()">
                                </div>
                                <!-- End of edit cust form (buttons) -->
                    <?php
                        // End of fetching
                        }
                        // Close engineiva database connection
                        mysqli_close($con);
                    ?>
                </form>
            </div>
        </div>
        <!-- End of edit car section -->
        
        
    </div>
     <!-- End of main content -->
</body>
</html>