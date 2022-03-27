<?php
    // Connect engineiva database   
    include("db.php");

    // Retrieve carID, imageID and path from URL
    $carID = intval($_GET['carID']);
    $imgno=strval($_GET['imageID']);
    $path=strval($_GET['path']);

    // Create SQL code that detele car image
    $img_result = mysqli_query($con, "DELETE FROM car_image WHERE carID=$carID AND imageID=$imgno"); 

    // If the SQL code execute successfully
    if($img_result){
        // Close engineiva database connection  
        mysqli_close($con);

        echo "<script>alert('Delete successfully!');</script>";

        // If page source from ad-view-image.php
        if($path=="view"){
            header("Location: ad-view-image.php?carID=$carID");
        // Elseif page source from ad-all-image.php
        } elseif ($path == "add") {
        header("Location: ad-all-image.php?carID=$carID");
        }
    }
    // Elseif the SQL code failed to execute   
    else{
        // Close engineiva database connection  
        mysqli_close($con);
        echo "<script>alert('Delete failed!');</script>";

        // If page source from ad-view-image.php
        if($path=="view"){
            header("Location: ad-view-image.php?carID=$carID");
        // Elseif page source from ad-all-image.php
        } elseif ($path == "add") {
        header("Location: ad-all-image.php?carID=$carID");
        }
    }
?>