<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel='stylesheet' href='userLogin.css'>
</head>
<body>
    <?php 
        session_start();
        include('conn.php');
        include('header_cust.php');
        
        if (isset($_SESSION['custID'])) {
            echo   "<script>
                        alert('You have already logged in!');
                        window.location.href='homepage.php';
                    </script>";
        }

        if($_SERVER['REQUEST_METHOD']=="POST"){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $sql = "SELECT custID FROM customer WHERE email = '$email' AND password ='$password'";

            if($result = mysqli_query($con,$sql)){
                // Return the number of rows in result set
                $rowcount=mysqli_num_rows($result);
            }
                $row = mysqli_fetch_array($result);

                if($rowcount==1){
                    // session1_start();
                    $_SESSION['mysession'] = $email;
                    $_SESSION['custID'] = intval($row['custID']);
                    header('Location: accountpage.php');
                }
                else{
                    echo '<script>alert("Your Email Address or Password is invalid. Please re login!!");
		            window.location.href= "userlogin.php";
		            </script>';
                }
            mysqli_close($con);
        }
    ?>

    <!-- <div class="button1">
        <button type="submit" class="back"><b>Back</b></button>
    </div> -->
    <div class='main-container'>
        <div class='container'>
            <h1>User Login</h1>
            <form action="" method="POST">
                <div class="form-element">
                    <div class="header-title">
                        <div><span class="remark">*Required</span></div>
                    </div>
                    <div class="box">
                        <div class="label">
                            Email Address <span class="remark">*</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="box">
                        <div class="label">
                            Password <span class="remark">*</span>
                        </div>
                        <div class="input-box">
                            <div class="password-field">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required> 
                            </div>
                        </div>
                    </div>
                    <div class="bottom-button">
                        <div class="button">
                            <button type="submit" class="btn">Log In</button>
                        </div>
                        <div class="text">
                            Have not registered? Please register <a href="SignUp.php">here</a>
                        </div>
                        <!-- <div class="text">
                            <a href="Homepage.php">Back to Main Page</a>
                        </div> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                                <li><a href="aboutUs.php">About Us</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="SupportCust.php">Support Ticket</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="https://goo.gl/maps/EDoSVuic3zT8mrMj8" onclick="alert('Redirecting to Google Map...')" target="_blank">Locate Us</a></li>
                                <li><a href="FAQ.php">FAQ</a></li>
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
                <div class="align-items-center">
                    <div class="footer-bottom-column">
                        <p class="copyright">&#169; Engineiva Sdn Bhd 2022 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>