<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-edit-car-image.css">
</head>
<body>
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
        // If admin click the upload image button 
        if(isset($_POST['uploadImage'])){
            // Connect engineiva database 
            include 'db.php';
            // Retrieve carID and imageID from the from
            $carID = $_POST['carID'];
            $imageID = $_POST['imageID'];

            // Retrieve the path from URL
            $path = $_GET['path'];

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
                echo '<script>alert("Only JPG, JPEG, PNG and JFIF files are allowed!");</script>';
                // If page source from ad-view-image.php
                if ($path == 'view'){
                    echo '<script>window.location.href= "ad-view-image.php?carID='.$carID.'";</script>';
                // Elseif page source from ad-all-image.php
                } elseif ($path == 'add'){
                    echo '<script>window.location.href= "ad-all-image.php?carID='.$carID.'";</script>'; 
                }
            }

            // To check if the file already exist in database
            $db_result = mysqli_query($con,"SELECT imageName FROM car_image WHERE imageName='$fileName';");
            // If image exist 
            if(mysqli_num_rows($db_result)==1 ){
                echo '<script>alert("This Image already in the database!");</script>';
                // If page source from ad-view-image.php
                if ($path == 'view'){
                    echo '<script>window.location.href= "ad-view-image.php?carID='.$carID.'";</script>';
                // Elseif page source from ad-all-image.php
                } elseif ($path == 'add'){
                    echo '<script>window.location.href= "ad-all-image.php?carID='.$carID.'";</script>'; 
                }
            // Elseif image is new in database
            }else{
                // Create sql query to insert new car image and insert into databse.
                $insert_sql = mysqli_query($con, "UPDATE car_image SET imageName='$fileName', image='$image' WHERE carID='$carID' AND imageID='$imageID';");
                // If insert successfully echo alert succeed message
                if($insert_sql){
                    mysqli_close($con);
                    echo '<script>alert("Uploaded Successfully!");</script>';
                    // If page source from ad-view-image.php
                    if ($path == 'view'){
                        echo '<script>window.location.href= "ad-view-image.php?carID='.$carID.'";</script>';
                    // Elseif page source from ad-all-image.php
                    } elseif ($path == 'add'){
                        echo '<script>window.location.href= "ad-all-image.php?carID='.$carID.'";</script>'; 
                    }
                // If insert failed echo alert upload error
                }else{
                    mysqli_close($con);
                    echo '<script>alert("Upload Error!");</script>';
                    // If page source from ad-view-image.php
                    if ($path == 'view'){
                        echo '<script>window.location.href= "ad-view-image.php?carID='.$carID.'";</script>';
                    // Elseif page source from ad-all-image.php
                    } elseif ($path == 'add'){
                        echo '<script>window.location.href= "ad-all-image.php?carID='.$carID.'";</script>'; 
                    }
                }
            }   
        }  
    ?>

    <?php 
        // Connect engineiva database 
        include 'db.php';

        // Retrieve carID and imageID from URL
        $carID=intval($_GET['carID']);
        $imageID=intval($_GET['imageID']);

        // Create SQL code that display car details and images
        $sql = "SELECT * FROM car INNER JOIN car_image ON car.carID = car_image.carID WHERE car.carID='$carID' AND car_image.imageID='$imageID'";
        // Excecute the SQL code
        $getimage = mysqli_query($con,$sql);
        // Fetch the SQL result
        while($car = mysqli_fetch_array($getimage)){        
    ?>
            <!-- Start of main content -->
            <div class="content-container">
                <h2>Edit Car Image</h2>
                <!-- Start of edit image form -->
                <div class="edit-image-form">
                    <form action=""  method="POST" enctype="multipart/form-data">
                        <!-- Declare two input that pass to the form --> 
                        <input type="hidden" name="carID" value=<?php echo $car['carID']; ?>>
                        <input type="hidden" name="imageID" value=<?php echo $car['imageID']; ?>>

                        <div class="form-header">Replace Image</div>

                        <!-- Display the car details that will be edited --> 
                        <div class="item-name">
                            You are currently editing image of this car: 
                            <strong><?php echo $car['year']." ".$car['brand']." ".$car['model']." ".$car['variant'];?></strong>
                        </div>

                        <!-- Display the image that will be edited --> 
                        <div class="current-image"> 
                            <?php
                            echo '<img src="data:image/jpg;base64, '.base64_encode($car['image']).'" class="image-size"/>';
                            ?>
                        </div>

                        <!-- For admin to add images-->
                        <div class="image-input">
                            <label class="select-file">Select file</label>
                            <input id="displayImagePreview" type="file" name="ImageFile" onchange="ImagePreview()" required/>
                        </div>

                        <!-- Image preview will be displayed here when an image is uploaded-->  
                        <div id="new-image">
                            <img  class="image-size" id="previewImage" src="">
                        </div>

                        <!-- Button to upload new image -->
                        <input type="submit" name="uploadImage" value="Upload" class="edit-upload-btn">
                    </form>
                </div>
                <!-- End of edit image form -->
            </div>
            <!-- End of main content -->
    <?php 
        }
    ?>
    <script>
        // Function for image preview 
        function ImagePreview(){
            previewImage.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>