<?php
    include("../conn.php");
    session_start();

    $userID = '1';
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
                        window.location.href='../Login/userlogin.php';
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
    <div class="header">
        <div class="inner_header">
            
            <div class="navigation">
                <a href ="home.php" class="logoStyle"><li>Engineiva</li></a>
                <a href="home.php"><li>
                    <button href="buy_car.php" class="dropdown_button" onmouseover='mouseOverToggle()' onmouseout='mouseOutToggle()' id="buy_btn">Buy</button>
                </li></a>  
                <a href="home.php"><li>Sell</li></a>    
                <a href="faq.php"><li>FAQ</li></a>
                <a href="about_us.php"><li>About Engineiva</li></a>
            </div>
            <div class="signin_up">
                <a href ="signin.php"><img src="user.png" alt="User" id="profile_style"><div id="signtext">Sign Up/Login</div></a> 
            </div>
        </div>
        <div class="dropdown_content" id="buy_content" onmouseover='mouseOverToggle()' onmouseout='mouseOutToggle()'>
            <a href="buy_car.php"><h2>View All Cars ></h2></a>
            <div class="column" id="car_column1">
                <a href="buy_car.php">BMW</a>
                <a href="buy_car.php">Honda</a>
                <a href="buy_car.php">Isuzu</a>
                <a href="buy_car.php">Mazda</a>
                <a href="buy_car.php">Mini</a>
                <a href="buy_car.php">Perodua</a>
                <a href="buy_car.php">Proton</a>
                <a href="buy_car.php">Suzuki</a>
                <a href="buy_car.php">Toyota</a>
                <a href="buy_car.php">Volkswagen</a>
            </div>
            <div class="column" id="car_column2">
                <a href="buy_car.php">Ford</a>
                <a href="buy_car.php">Hyundai</a>
                <a href="buy_car.php">Kia</a>
                <a href="buy_car.php">Mercedes</a>
                <a href="buy_car.php">Nissan</a>
                <a href="buy_car.php">Peugeot</a>
                <a href="buy_car.php">Subaru</a>
                <a href="buy_car.php">Tesla</a>
                <a href="buy_car.php">Volve</a>
            </div>
        </div>
    </div>

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
    <footer class="new_footer_area">
        <div class="new_footer_top">
            <div class="footer-top-container">
                <div class="row">
                    <h3 class="footer-company-name">Engineiva</h3>
                    <div class="footer-column1">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                            <ul class="f_list">
                                <li><div class="footer-phone">
                                    <i class="fas fa-phone-alt footer-icon"></i> 
                                    : <a href="tel:+6011-1234566">+60 11-123 4566</a>
                                </div></li>

                                <li><div class="footer-email">
                                    <i class="fas fa-envelope footer-icon"></i> 
                                    : <a href="mailto:support@engineiva.com">support@engineiva.com</a>
                                </div></li>
                                <li><div class="footer-address">
                                    <div class="footer-address-container">
                                        <i class="fas fa-map-marker footer-icon"></i> :
                                    </div>
                                    <div class="footer-address-box"> 
                                        Jalan Pelukis U1/46<br> 
                                        Kawasan Perindustrian Temasya<br> 
                                        40150 Shah Alam, Selangor
                                    </div>
                                </div></li>

                            </ul>
                            <div class="f_social_icon">
                                <a href="https://www.facebook.com/" class="fab fa-facebook"></a>
                                <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
                                <a href="https://www.linkedin.com/" class="fab fa-linkedin"></a>
                                <a href="https://twitter.com/" class="fab fa-twitter"></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column2">
                        <div class="f_widget about-widget" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            <h3 class="f-title">Quick Links</h3>
                            <ul class="f_list">
                                <li><a href="../AboutUs/aboutUs.php">About Us</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="../SupportCust/SupportCust.html">Support Ticket</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="https://goo.gl/maps/EDoSVuic3zT8mrMj8" onclick="alert('Redirecting to Google Map...')" target="_blank">Locate Us</a></li>
                                <li><a href="../FAQ/FAQ.html">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-column3">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title">Branches</h3>
                            <ul class="f_list">
                                <li><a href="#">Kuala Lumpur</a></li>
                                <li><a href="#">Melaka</a></li>
                                <li><a href="#">Perak</a></li>
                                <li><a href="#">Pahang</a></li>
                                <li><a href="#">Selangor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-column4">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title">Inspection Centre Operation Hour</h3>
                            <div class="footer-column4-container">
                                <p>Monday - Saturday</p>
                                <p>10:00 am to 6:00 pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="footer-bottom-container">
                <div class="row align-items-center">
                    <div class="footer-bottom-column">
                        <p class="copyright">&#169; Engineiva Sdn Bhd 2022 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
            $target_dir = "img/";
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