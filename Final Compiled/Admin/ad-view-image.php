<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-view-image.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        color: black;
    }
    </style>
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
        // If admin click the upload image button 
        if(isset($_POST['uploadImage'])){
            // Connect engineiva database 
            include 'conn.php';
            // Retrieve carID from the from
            $carID = $_POST['carID']; 

            $fileName = $_FILES['ImageFile']['name'];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            // Check if the uploaded file is in the format as foillowing
            $fileAllowed = array('jpg', 'jpeg', 'png', 'jfif'); // Files that are allowed to be uploaded
            if(in_array($fileType, $fileAllowed)){
                // If the file format is correct then get the file content
                $itemImage = $_FILES['ImageFile']['tmp_name'];
                $image = addslashes(file_get_contents($itemImage));
            }else{
                // Else display alert message to tell admin that the file format is incorrect
                mysqli_close($con);
                echo '<script>alert("Only JPG, JPEG, PNG and JFIF files are allowed!");
                window.location.href= "ad-view-image.php?carID='.$carID.'";</script>';
            }

            // To check if the file already exist in database
            $db_result = mysqli_query($con,"SELECT imageName FROM car_image WHERE imageName='$fileName';");
            // If image exist
            if(mysqli_num_rows($db_result)==1 ){
                // Redirect back to view product image page
                echo '<script>alert("This Image already in the database!");
                window.location.href= "ad-view-image.php?carID='.$carID.'";</script>';
            // Elseif image is new in database
            }else{ 
                // Create sql query to insert new car image and insert into databse. 
                $insert_sql = mysqli_query($con, "INSERT INTO car_image (carID, imageName, image) VALUES ('$carID','$fileName','$image');");
                // If insert successfully echo alert succeed message
                if($insert_sql){
                    mysqli_close($con);
                    echo '<script>alert("Uploaded Successfully!");
                    window.location.href= "ad-view-image.php?carID='.$carID.'";
                    </script>';
                // If insert failed echo alert upload error
                }else{
                    mysqli_close($con);
                    echo '<script>alert("Upload Error!"); window.location.href= "ad-view-image.php?carID='.$carID.'";</script>';
                }
            }   
        }
    ?>

    <!-- Start of main content -->
    <div class="content-container">
        <div class="title-container">
            <?php 
                // Connect engineiva database 
                include 'conn.php';
                // Get carID from the URL
                $carID=intval($_GET['carID']);
                // Create SQL code that display all car details and images
                $sql = "SELECT * FROM car INNER JOIN car_image ON car.carID = car_image.carID WHERE car.carID='$carID'";
                // Execute the SQL code
                $getimage = mysqli_query($con,$sql); 

                // Create SQL code that for car details
                $get_itemName = mysqli_query($con,"SELECT * FROM car WHERE carID='$carID';");
                // Fetch the car details to display
                while($car=mysqli_fetch_array($get_itemName)){ 
            ?>
                    <!-- Diplsay car details -->
                    <div class="itemName">
                        Images for <?php echo $car['year']." ".$car['brand']." ".$car['model']." ".$car['variant']."; ".$car['transmission'];?>
                    </div>
            <?php
                }
            ?>
            <!-- Button to add new image (dropdown) -->
            <button class="button add-image" data-bs-toggle="modal" data-bs-target="#add-new-img">Add Image</button>
        </div>
        
        <!-- Start of images container -->
        <div class="images-container">
            <?php
                if(mysqli_num_rows($getimage)){
                    while($row=mysqli_fetch_assoc($getimage)){
            ?>
                        <!-- Start of images car -->
                        <div class="images-card">
                            <!-- Display the image -->
                            <?php echo '<img src="data:image/jpg;base64,' . base64_encode($row['image']) . '"class="images-size"/>'; ?>
                            <div class="image-buttons">
                                <!-- Button to edit the image -->
                                <button class="image-edit">
                                    <a href="ad-edit-car-image.php?carID=<?php echo $row['carID'];?>&imageID=<?php echo $row['imageID'];?>&path=view">
                                        <img src="imgAdmin/edit.png">
                                    </a>
                                </button>
                                
                                <!-- Button to delete the image -->
                                <button class="image-delete" onclick="return confirm('Are you sure to delete this item?');">
                                    <a href="delete-car-image.php?carID=<?php echo $row['carID'];?>&imageID=<?php echo $row['imageID'];?>&path=view">
                                        <img src="imgAdmin/bin.png">
                                    </a>
                                </button>
                            </div>
                        </div>
                        <!-- End of images card-->

            <?php 
                    }
                // If there isn't any image for the car
                }else {
            ?>
                    <div class="no-image">No image to display for this car</div>
            <?php
                }
                // Close engineiva database connection
                mysqli_close($con);
            ?>
        </div>
        <!-- End of images container -->

        <!-- Start of Modal(Dropdown) -->
        <div class="modal fade" id="add-new-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Start of form body to get admin input for image -->
                        <form action=""  method="POST" enctype="multipart/form-data">
                            <!-- php is used to echo the $carID variable into the value element -->
                            <input type="hidden" name="carID" value=<?php echo $carID; ?>> 
                            <!-- Accept input from admin -->
                            <div>
                                <input id="displayImagePreview" type="file" name="ImageFile" onchange="ImagePreview()" required/> 
                            </div>
                            <!-- Display image preview before uplaoding the image -->
                            <div id="displayPreview">
                                <div class="showImagehere">
                                    <img id="previewImage" src="" class="images-size-preview" /> 
                                </div>
                            </div>
                            <!-- Button to submit the form -->
                            <button type="submit" class="btn btn-primary" name="uploadImage">Upload</button> 
                        </form>
                        <!-- End of form body to get admin input for image -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal(Dropdown) -->
    </div>
    <!-- End of main content -->
    
    <!-- Bootstrap css for dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    <script>
        // Function for image preview 
        function ImagePreview(){
            previewImage.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>