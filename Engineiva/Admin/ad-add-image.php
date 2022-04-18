<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-add-image.css">
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
        // If admin click the add button    
        if(isset($_POST['addButton'])){
            // Connect engineiva database 
            include 'conn.php';
            // Retrieve carID from the URL
            $carID = intval($_GET['carID']);
            
            $fileName = basename($_FILES['add-image']['name']);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            // Check if the uploaded file is in the format as foillowing
            $fileAllowed = array('jpg', 'jpeg', 'png', 'jfif'); // files that are allowed to be uploaded
            if(in_array($fileType, $fileAllowed)){
                // If the file format is correct then get the file content
                $itemImage = $_FILES['add-image']['tmp_name'];
                $image = addslashes(file_get_contents($itemImage)); // prepare the image for insertion 
            }else{
                // Else display alert message to tell admin that the file format is incorrect
                mysqli_close($con);
                echo '<script>alert("Only JPG, JPEG, PNG and JFIF files are allowed!");
                window.location.href= "ad-add-image.php?carID='.$carID.'";</script>';
            }

            // To check if the image file already exist in database
            $db_result = mysqli_query($con,"SELECT imageName FROM car_image WHERE imageName='$fileName';");
            if(mysqli_num_rows($db_result)==1 ){
                // If yes echo alert message and redirect back to view product image page
                echo '<script>alert("This Image already in the database!");
                window.location.href= "ad-add-image.php?carID='.$carID.'";</script>';
            }else{ 
                // Else processs the sql query to create new data and insert into databse. 
                $insert_sql = mysqli_query($con, "INSERT INTO car_image(carID, image, imageName) VALUES ('$carID','$image', '$fileName')");
                if($insert_sql){
                    // If successfully echo alert succeed message
                    mysqli_close($con);
                    echo '<script>alert("Uploaded Successfully!");
                    window.location.href= "ad-all-image.php?carID='.$carID.'";
                    </script>';
                }else{
                    // If failed echo alert upload error message
                    mysqli_close($con);
                    echo '<script>alert("Upload Error!"); window.location.href= "ad-add-image.php?carID='.$carID.'";</script>';
                }
            }
        }
    ?>

    <!-- Start of main content -->
    <div class="content-container">
        <h2>Add Car Image</h2>
        <!-- Start of add image form -->
        <div class="image-form">
            <div class="form-header">ADD CAR IMAGE</div>

            <form action="" method="POST" ENCTYPE="multipart/form-data">
                <div class="add-row">
                    <div class="add-col">Car Image:</div>
                </div>
                <!-- For admin to add images-->
                <div class="add-row row-image">
                    <div class="add-col col-input">
                        <input id="image" type="file" name="add-image"  required="required" onchange="ImagePreview()"; /> 
                    </div>
                </div>
                <!-- Image preview will be displayed here when an image is uploaded-->  
                <div class="add-row row-preview">
                    <div class="add-col"> 
                        <img id="previewImage" src="" class="images-size-preview" /> 
                    </div>
                </div>
                <!-- To insert the image into database-->
                <div class="add-row" style="height: 100px;">
                    <button class="button addBtn" name="addButton" value="add">Add</button>
                </div>
            </form>

        </div>
        <!-- End of add image form -->
    </div>
     <!-- End of main content -->

    <script>
        // Function for image preview 
        function ImagePreview(){
            previewImage.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>