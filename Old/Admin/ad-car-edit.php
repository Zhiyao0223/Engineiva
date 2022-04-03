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
            <li><a href="ad-modify-remove.php" class="active">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
        </ul>
    </div>

    <?php 
        // If admin click the upload button       
        if(isset($_POST["updateBtn"])){ 
            // Connect engineiva database 
            include("conn.php");
            
            // Retrieve carID from url
            $carID = intval($_GET['carID']); 
            
            // Create SQL code that update the car record
            $sql = "UPDATE car SET 
            brand ='$_POST[brand]', 
            model ='$_POST[model]',
            year ='$_POST[year]', 
            variant ='$_POST[variant]',
            engine ='$_POST[engine]',
            transmission = '$_POST[transmission]',
            mileage ='$_POST[mileage]',
            price='$_POST[price]',
            sellStatus='$_POST[status]',
            remark='$_POST[remark]'

            WHERE carID=$carID;";

            // If the SQL code failed to execute     
            if (!mysqli_query($con,$sql)) {
                // Echo modify failed
                echo '<script>alert("Modify Failed!");</script>;';
            }
            // Else if the SQL code successfully excuted
            else {
                // Echo modify failed and direct back to modify and remove page
                echo '<script>alert("Modify Success!");
                window.location.href= "ad-modify-remove.php";
                </script>';
            }

        }
    ?>
    
    <!-- Start of main content -->
    <div class="content-container">
        <h2>Modify car's details</h2>
        <!-- Start of edit car section -->
        <div class="edit-car-form">
            <div class="form-header">
                 MODIFY CAR'S DETAILS
            </div>
            <div class="form-content">
                <form action="" method="POST">
                    <?php
                        // Connect engineiva database  
                        include("conn.php");
        
                         // Retrieve carID from url
                        $carID = intval($_GET['carID']); 
                        // Create SQL code that display car 
                        $result = mysqli_query($con,"SELECT * FROM car WHERE carID = '$carID'");
                    
                        // Fetch the car record and display
                        while($car = mysqli_fetch_array($result)){
                    ?>
                    
                            <!-- Start of edit car form (Row 1) -->
                                <div class="attribute ">
                                    <div class="field">
                                        Brand: 
                                    <?php 
                                        echo '<select name="brand" required>
                                            <option value="" selected disabled>Select Car brand</option>
                                            <option value="BMW"'; if ($car["brand"] == "BMW") echo' selected="selected" '; echo'>BMW</option>
                                            <option value="Honda"'; if ($car["brand"] == "Honda") echo' selected="selected" '; echo'>Honda</option>
                                            <option value="Mazda"'; if ($car["brand"] == "Mazda") echo' selected="selected" '; echo'>Mazda</option>
                                            <option value="Mercedes"'; if ($car["brand"] == "Mercedes") echo' selected="selected" '; echo'>Mercedes</option>
                                            <option value="Mini"'; if ($car["brand"] == "Mini") echo' selected="selected" '; echo'>Mini</option>
                                            <option value="Nissan"'; if ($car["brand"] == "Nissan") echo' selected="selected" '; echo'>Nissan</option>
                                            <option value="Perodua"'; if ($car["brand"] == "Perodua") echo' selected="selected" '; echo'>Perodua</option>
                                            <option value="Proton"'; if ($car["brand"] == "Proton") echo' selected="selected" '; echo'>Proton</option>
                                            <option value="Subaru"'; if ($car["brand"] == "Subaru") echo' selected="selected" '; echo'>Subaru</option>
                                            <option value="Toyota"'; if ($car["brand"] == "Toyota") echo' selected="selected" '; echo'>Toyota</option>
                                            <option value="Volkswagen"'; if ($car["brand"] == "Volkswagen") echo' selected="selected" '; echo'>Volkswagen</option>
                                        </select>';
                                    ?>
                                    </div>
                                </div>
                                <div class="attribute ">
                                    <div class="field">
                                        Model: <input type="text" name="model" placeholder="Enter Car Model" value="<?php echo $car['model'];?>" required>
                                    </div>
                                </div>
                                <!-- End of edit car form (Row 1) -->

                                <!-- Start of edit car form (Row 2) -->
                                <div class="attribute ">
                                    <div class="field">
                                        Year: 
                                    <?php  
                                        echo'<select name="year" required>
                                                <option value="" selected disabled>Select Car Year</option>
                                                <option value="2022"'; if ($car["year"] == "2022") echo' selected="selected" '; echo'>2022</option>
                                                <option value="2021"'; if ($car["year"] == "2021") echo' selected="selected" '; echo'>2021</option>
                                                <option value="2020"'; if ($car["year"] == "2020") echo' selected="selected" '; echo'>2020</option>
                                                <option value="2019"'; if ($car["year"] == "2019") echo' selected="selected" '; echo'>2019</option>
                                                <option value="2018"'; if ($car["year"] == "2018") echo' selected="selected" '; echo'>2018</option>
                                                <option value="2017"'; if ($car["year"] == "2017") echo' selected="selected" '; echo'>2017</option>
                                                <option value="2016"'; if ($car["year"] == "2016") echo' selected="selected" '; echo'>2016</option>
                                                <option value="2015"'; if ($car["year"] == "2015") echo' selected="selected" '; echo'>2015</option>
                                                <option value="2014"'; if ($car["year"] == "2014") echo' selected="selected" '; echo'>2014</option>
                                                <option value="2013"'; if ($car["year"] == "2013") echo' selected="selected" '; echo'>2013</option>
                                                <option value="2012"'; if ($car["year"] == "2012") echo' selected="selected" '; echo'>2012</option>
                                                <option value="2011"'; if ($car["year"] == "2011") echo' selected="selected" '; echo'>2011</option>
                                                <option value="2010"'; if ($car["year"] == "2010") echo' selected="selected" '; echo'>2010</option>
                                                <option value="2009"'; if ($car["year"] == "2009") echo' selected="selected" '; echo'>2009</option>
                                                <option value="2008"'; if ($car["year"] == "2008") echo' selected="selected" '; echo'>2008</option>
                                                <option value="2007"'; if ($car["year"] == "2007") echo' selected="selected" '; echo'>2007</option>
                                                <option value="2006"'; if ($car["year"] == "2006") echo' selected="selected" '; echo'>2006</option>
                                                <option value="2005"'; if ($car["year"] == "2005") echo' selected="selected" '; echo'>2005</option>
                                                <option value="2004"'; if ($car["year"] == "2004") echo' selected="selected" '; echo'>2004</option>
                                                <option value="2003"'; if ($car["year"] == "2003") echo' selected="selected" '; echo'>2003</option>
                                                <option value="2002"'; if ($car["year"] == "2002") echo' selected="selected" '; echo'>2002</option>
                                                <option value="2001"'; if ($car["year"] == "2001") echo' selected="selected" '; echo'>2001</option>
                                                <option value="2000"'; if ($car["year"] == "2000") echo' selected="selected" '; echo'>2000</option>
                                                <option value="1999"'; if ($car["year"] == "1999") echo' selected="selected" '; echo'>1999</option>
                                                <option value="1998"'; if ($car["year"] == "1998") echo' selected="selected" '; echo'>1998</option>
                                                <option value="1997"'; if ($car["year"] == "1997") echo' selected="selected" '; echo'>1997</option>
                                                <option value="1996"'; if ($car["year"] == "1996") echo' selected="selected" '; echo'>1996</option>
                                                <option value="1995"'; if ($car["year"] == "1995") echo' selected="selected" '; echo'>1995</option>
                                                <option value="1994"'; if ($car["year"] == "1994") echo' selected="selected" '; echo'><= 1994</option>
                                            </select>';
                                    ?>
                                    </div>
                                </div>
                                <div class="attribute ">
                                    <div class="field">
                                        Variant: <input type="text" name="variant" placeholder="Enter Car Variant" value="<?php echo $car['variant'];?>" required>
                                    </div>
                                </div>
                                <!-- End of edit car form (Row 2) -->
                
                                <!-- Start of edit car form (Row 3) -->
                                <div class="attribute ">
                                    <div class="field">
                                        Engine: <input type="text" name="engine" placeholder="Enter Car Engine" value="<?php echo $car['engine'];?>" required>
                                    </div>
                                </div>
                                <div class="attribute ">
                                    <div class="field">
                                        Transmission: 
                                    <?php
                                        echo '<select name="transmission" required>
                                                <option value="" selected disabled>Select Transmission</option>
                                                <option value="Automatic"'; if ($car["transmission"] == "Automatic") echo' selected="selected" '; echo'>Automatic</option>
                                                <option value="Manual"'; if ($car["transmission"] == "Manual") echo' selected="selected" '; echo'>Manual</option>
                                            </select>';
                                    ?>
                                    </div>
                                </div>
                                <!-- End of edit car form (Row 3) -->

                                <!-- Start of edit car form (Row 4) -->
                                <div class="attribute ">
                                    <div class="field">
                                        Mileage (KM): <input type="number" min=0 placeholder="Enter Car Milleage" name="mileage" value="<?php echo $car['mileage'];?>" required>
                                    </div>
                                </div>
                                <div class="attribute ">
                                    <div class="field">
                                        Price (RM): <input type="number" min=1 placeholder="Enter Car Price" name="price" value="<?php echo $car['price'];?>" step="0.01" required>
                                    </div>
                                </div>
                                <!-- End of edit car form (Row 4) -->

                                <!-- Start of edit car form (Row 5) -->
                                <div class="attribute ">
                                    <div class="field">
                                        Status: 
                                    <?php 
                                        echo '<select name="status" required>
                                                <option value="" selected disabled>Please Select</option>
                                                <option value="Available"'; if ($car["sellStatus"] == "Available") echo' selected="selected" '; echo'>Available</option>
                                                <option value="Not Available"'; if ($car["sellStatus"] == "Not Available") echo' selected="selected" '; echo'>Not Available</option>
                                            </select>';
                                    ?>
                                    </div>
                                </div>
                                <!-- End of edit car form (Row 5) -->

                                <!-- Start of edit car form (Row 6) -->
                                <div class="text-attribute">
                                    <div class="text-title">Remark: </div>
                                    <div class="text-field">    
                                        <textarea name="remark" rows="5" cols="35" style="font-family:Times New Roman;white-space:pre-wrap;" required> <?php echo $car['remark']; ?></textarea>
                                    </div>
                                </div>
                                <!-- End of edit car form (Row 7) -->

                                <!-- Start of edit car form (buttons) -->
                                <div class="twobutton ">
                                    <input type="submit" class="abutton submit" name="updateBtn" value="Update"> 
                                    <input class="abutton cancel" type="button" value="Cancel" onclick="history.back()">
                                </div>
                                <!-- End of edit car form (buttons) -->
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
        
        <?php 
            // Connect engineiva database  
            include("conn.php");

            // Retrieve carID from url
            $carID = intval($_GET['carID']); 
            // Create SQL code that display car purchase record and seller
            $purchaseRecord = mysqli_query($con,"SELECT * FROM cust_sell INNER JOIN customer ON customer.custID = cust_sell.custID WHERE carID='$carID'");
            
            // Fetch the car record and display
            while($record = mysqli_fetch_array($purchaseRecord)){
        ?>
                <!-- Start of car purchase record section -->
                <div class="purchase-record">
                    <div class='result-attribute'>
                        <!-- Display car purchase result -->
                        <p style="text-decoration: underline;">Car Purchase Record</p>
                        <table class='purchase-result'>
                            <tr><td class='title'>Date:</td><td><?php echo $record['date']?></td></tr>
                            <tr><td class='title'>Price:</td><td><?php echo $record['price']?></td></tr>
                            <tr><td class='title'>Fees</td><td><?php echo $record['fees']?></td></tr>
                        </table>
                        
                        <!-- Display customer details result -->
                        <p style="text-decoration: underline;">Previous Onwer’s Detail</p>
                        <table class='customer-result'>
                            <tr><td class='title'>Cust ID:</td><td><?php echo $record['custID']?></td></tr>
                            <tr><td class='title'>Full Name:</td><td><?php echo $record['firstName']." ".$record['lastName']?></td></tr>
                            <tr><td class='title'>Identity card:</td><td><?php echo $record['identityCard']?></td></tr>
                            <tr><td class='title'>Gender:</td><td><?php echo $record['gender']?></td></tr>
                            <tr><td class='title'>Email:</td><td><?php echo $record['email']?></td></tr>
                            <tr><td class='title'>Phone Number:</td><td><?php echo $record['phoneNum']?></td></tr>
                        </table>
                    </div>
                </div>
                <!-- End of car purchase record section -->
        <?php
            }
        ?>
    </div>
     <!-- End of main content -->
</body>
</html>