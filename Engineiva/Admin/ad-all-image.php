<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-all-image.css">
</head>
<body>
    <?php include "ad-session.php"?>

    <?php 
        include 'admin-header.php';
    ?>

    <div class="submenu">   
        <ul class="menu-content">
        <li><a href="ad-add-new-car.php" class="active">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
            <li><a href="ad_order_history.php">Order History</a></li>
            <li><a href='AdminReport.php'>Report Generation</a></li>
        </ul>
    </div>
    
    <?php
        // Connect engineiva database 
        include 'conn.php';
        // Get carID from the URL
        $car_id = intval($_GET['carID']);
        // Create SQL code that display all car image 
        $image = mysqli_query($con, "SELECT * FROM car_image WHERE carID='$car_id' ORDER BY imageID ASC");
    ?>

    <!-- Start of main content -->
    <div class="content-container">
        <h2>View Images</h2>
        <!-- Start of add image form -->
        <div class="add-imgae-form" id="addMod">
            <div class="form-header">IMAGES</div>

            <form action="" method="POST" ENCTYPE="multipart/form-data">
                <div class="form-content">
                    <div class="add-col">Product Images: 
                        <div class="add-buttons">
                            <button class="button addBtn" name="addButton" value="add"><a href="ad-add-image.php?carID=<?php echo $car_id;?>">Add Image</a></button>
                            <button class="button nextBtn" name="nextButton" value="next"><a href="ad-modify-remove.php">Done</a></button>
                        </div>
                    </div>
                <?php
                    // Display car images 
                    while($row=mysqli_fetch_array($image)){
                ?>
                        <!-- Start of images container -->
                        <div class="images-container">
                            <div class="images-card">
                                <!-- Display the image -->
                                <?php echo '<img src="data:image/jpg;base64,' . base64_encode($row['image']) . '"class="images-size"/>';?>
                                <div class="image-buttons">
                                    <!-- Button to edit the image -->
                                    <button class="image-edit">
                                        <a href="ad-edit-car-image.php?carID=<?php echo $row['carID'];?>&imageID=<?php echo $row['imageID'];?>&path=add">
                                            <img src="imgAdmin/edit.png">
                                        </a>
                                    </button>

                                    <!-- Button to delete the image -->
                                    <button class="image-delete" onclick="return confirm('Are you sure to delete this item?');">
                                        <a href="delete-car-image.php?carID=<?php echo $row['carID'];?>&imageID=<?php echo $row['imageID'];?>&path=add">
                                            <img src="imgAdmin/bin.png">
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End of images container -->
                
                <?php
                    }
                    // Close engineiva database connection
                    mysqli_close($con);  
                ?>
                </div>
            </form>
        </div>
        <!-- End of add image form -->
    </div>
    <!-- End of main content -->
</body>
</html>