<?php 

        // If admin click the upload button       
        if(isset($_POST["updateBtn"])){ 
            // Connect engineiva database 
            include("conn.php");
            

            // Create SQL code that update the car record
            $sql = "UPDATE promocode SET 
            promocode ='$_POST[promocode]', 
            offer ='$_POST[offer]'

            WHERE id=$_POST[id];";

            // If the SQL code failed to execute     
            if (!mysqli_query($con,$sql)) {
                // Echo modify failed
                echo '<script>alert("Modify Promotion Detail Failed!");</script>;';
            }
            // Else if the SQL code successfully excuted
            else {
                // Echo modify failed and direct back to modify and remove page
                echo '<script>alert("Modify Promotion Detail Success!");
                window.location.href= "ad-promotion-detail.php";
                </script>';
            }

        }
    ?>