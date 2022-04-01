<?php
    include("conn.php");
    include("session.php");

    // $userID = '1';
    if (isset($_SESSION['mysession'])) {
        $userID = $_SESSION['id'];

        // Autofill email
        $sql_email = "SELECT email FROM customer WHERE custID = '$userID'";
        $result_email = mysqli_query($con, $sql_email);
        $array_email = mysqli_fetch_array($result_email);

        // Get latest ticket ID
        $sql_support = "SELECT * FROM support_ticket ORDER BY ticketID DESC LIMIT 1";
        $result_support = mysqli_query($con, $sql_support);
        $array_support = mysqli_fetch_array($result_support);
        $new_ticket = $array_support['ticketID'] + 1;    
    }
    else {
        echo "<script>alert('You need to login to create a ticket.');
                        window.location.href='userlogin.php';
                </script>";
    }
?>

<!DOCTYPE html>
<head>
    <title>Support Ticket</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="script.js"></script>
</head>
<body>
    <!-- Header  -->
    <?php
        // if(isset($_SESSION['mysession'])) {
        //     include("header_login.php");
        // } 
        // else {
        //     include("header_cust.php");
        // }
    ?>

    <div class="main-container">
        <div class="top-container">
            <div class="cs-title">
                Customer Service Team
            </div>
            <div class="cs-description">
                Have a question / problem? Please tell us and we will get back to you soonest
            </div>
        </div>
        
        <form method="post" name="supportTicket" id="supportTicket" enctype="multipart/form-data">
            <div class="btm-container">
                <div class="category">
                    Issue category <span style="color: red;">*</span><br>
                    <select name="categories" id="selectCategories" required>
                        <option value="" disabled selected="selected">Please select</option>
                        <option value="account">Accounts</option>
                        <option value="order">Orders & Payment</option>
                        <option value="appointment">Appointment</option>
                        <option value="refund">Refund</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="emailBox">
                    Email Address <span style="color: red;">*</span><br>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="titleBox">
                    Title <span style="color: red;">*</span><br>
                    <input type="text" id="title" name="title" maxlength="75" required>
                </div>
                <div class="description-box">
                    Description <span style="color: red;">*</span><br>
                    <textarea id="description" name="description" maxlength="300" required></textarea>
                </div>
                <div class="uploadBox">
                    Upload Attachment<br>
                    <input type="file" id="image" name="image">
                </div>
                <div class="submitBtn">
                    <input type="submit" id="submit" name="submit">
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <?php
        include("footer.php");
    ?>
</body>

<?php 
    // Auto fill email address
    if(isset($_SESSION['id'])) {
        echo "<script>
        document.getElementById('email').value = '$array_email';
            </script>";
    }

    // Detect Form Submission
    if(isset($_POST['submit'])) {
        $category = $_POST['categories'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Detect if uploading files
        $is_uploading = $_FILES["image"]["error"];
        if ($is_uploading == 0) {
            $pictureStatus = 0;
        }
        else if ($is_uploading == 1) {
            echo "<script>alert('Error: Your file size has exceed 2MB.')</script>";
            exit(-1);
        }
        else if ($is_uploading == 4) {
            $pictureStatus = 2;
        }
        else
        {
            echo $is_uploading;
            echo "<script>alert('Sorry there was an error uploading your file.')</script>";
            $pictureStatus = 2;
        }
        // echo "<script>alert('$is_uploading')</script>";

        // No issue on uploading
        if ($pictureStatus == 0) {
            // Process Image
            $target_dir = "imgSupportCust/";
            $target_file = $target_dir.basename($_FILES["image"] ["name"]);
                
            if (move_uploaded_file($_FILES["image"] ["tmp_name"], $target_file)) {
                // To get file name
                $file_name = basename($_FILES["image"] ["name"]);
            }
        }
        else {
            $pictureStatus = -1;
        }

        $sql_insert = "INSERT INTO support_ticket (custID, ticketStatus, category, title, explaination) 
                        VALUES(
                        '$userID', 'T', '$category', '$title' , '$description')";
        

        if(!mysqli_query($con, $sql_insert)) {
            echo"<script>alert('Error: ".mysqli_error($con) ."')</script>";
        }
        else {
            echo"<script>alert('Ticket Successfully Created !')</script>";
        };

        if ($pictureStatus == 0) {
            $new_ticket = $array_support[0] + 1;
            // echo "<script>alert('$new_ticket')</script>";
            $sql_update_image = "UPDATE support_ticket SET picture = '$file_name' WHERE ticketID = '$new_ticket'";
            mysqli_query($con, $sql_update_image);
            
        }
    }
?>