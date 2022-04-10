<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-add-new-car.css">
</head>
<body>
    <?php include "ad-session.php"?>

    <?php 
        include 'admin-header.php';
    ?>

    <div class="submenu">   
        <ul class="menu-content">
        <li><a href="ad-add-new-car.php" class="active">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php" >Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
            <li><a href="ad_order_history.php">Order History</a></li>
            <li><a href='AdminReport.php'>Report Generation</a></li>
        </ul>
    </div>

    <?php 
         // If user click the upload button      
        if(isset($_POST["uploadBtn"])){ 
            // Connect engineiva database   
            include("conn.php");
            // Create SQL code that insert all the input into car table
            $sql="INSERT INTO car (brand, model, year, variant, engine, transmission, mileage, price, sellStatus, remark) VALUE
            ('$_POST[brand]','$_POST[model]','$_POST[year]','$_POST[variant]','$_POST[engine]','$_POST[transmission]','$_POST[mileage]','$_POST[price]','$_POST[status]','$_POST[remark]')";

            // If the SQL code failed to execute
            if (!mysqli_query($con,$sql)) {
                // Display an alert on insert error
                echo '<script>alert("Failed to add new car!");</script>;';
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
                echo '<script>alert("New car successfully added!");
                window.location.href= "ad-buy-record.php?carID='.$last_id.'";
                </script>';
            }

        }
    ?>

    <!-- Start of main content -->
    <div class="content-container">
        <h2>Add New Car</h2>
        <!-- Start of add car section -->
        <div class="add-car-form">
            <div class="form-header">
                 ADD NEW CAR
            </div>
            <form action="" method="POST">
                <!-- Start of add car form (Row 1) -->
                <div class="attribute ">
                    <div class="field">
                        Brand: <select name="brand" required>
                                    <option value="" selected disabled>Select Car Brand</option>
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
                    </div>
                </div>
                <div class="attribute ">
                    <div class="field">
                        Model: <input type="text" name="model" placeholder="Enter Car Model" required>
                    </div>
                </div>
                <!-- End of add car form (Row 1) -->

                <!-- Start of add car form (Row 2) -->
                <div class="attribute ">
                    <div class="field">
                        Year: <select name="year" required>
                                    <option value="" selected disabled>Select Car Year</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994"><= 1994</option>
                                </select>
                    </div>
                </div>
                <div class="attribute ">
                    <div class="field">
                        Variant: <input type="text" name="variant" placeholder="Enter Car Variant" required>
                    </div>
                </div>
                <!-- End of add car form (Row 2) -->
                
                <!-- Start of add car form (Row 3) -->
                <div class="attribute ">
                    <div class="field">
                        Engine: <input type="number" name="engine" placeholder="Enter Car Engine" required>
                    </div>
                </div>
                <div class="attribute ">
                    <div class="field">
                        Transmission: <select name="transmission" required>
                                        <option value="" selected disabled>Select Transmission</option>
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                    </div>
                </div>
                <!-- End of add car form (Row 3) -->

                <!-- Start of add car form (Row 4) -->
                <div class="attribute ">
                    <div class="field">
                        Mileage (KM): <input type="number" min=0 placeholder="Enter Car Mileage" name="mileage" required>
                    </div>
                </div>
                <div class="attribute ">
                    <div class="field">
                        Price (RM): <input type="number" min=1 placeholder="Enter Car Price" name="price" step="0.01" required>
                    </div>
                </div>
                <!-- End of add car form (Row 4) -->

                <!-- Start of add car form (Row 5) -->
                <div class="attribute ">
                    <div class="field">
                        Status: <select name="status" required>
                                    <option value="" selected disabled>Please Select</option>
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                    </div>
                </div>
                <!-- End of add car form (Row 5) -->

                <!-- Start of add car form (Row 6) -->
                <div class="text-attribute">
                    <div class="text-title">Remark: </div>
                    
                    <div class="text-field">    
                        <textarea name="remark" rows="5" cols="35" style="font-family:Times New Roman;white-space:pre-wrap;" required></textarea>
                    </div>
                </div>
                <!-- End of add car form (Row 7) -->

                <!-- Start of add car form (buttons) -->
                <div class="twobutton ">
                    <input type="submit" class="abutton submit" name="uploadBtn" value="Next"> 
                    <input class="abutton cancel" type="button" value="Cancel" onclick="history.back()">
                </div>
                <!-- End of add car form (buttons) -->
            </form>
        </div>
        <!-- End of add car section -->
    </div>
    <!-- End of main content -->
</body>
</html>