<?php
    include("../conn.php");

    // if (isset($_SESSION['id'])) {
    //     $userID = $_SESSION['id'];
    // }
    // else {
    //     echo "<script>
    //             alert('Please login to proceed!')
    //             window.location.href = '../Login/userlogin.php';    
    //         </script>";
    // }
?>
<!DOCTYPE html>
<head>
    <title>My Favourite</title>
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

    <!-- Main Container  -->
    <div class="container">
        <div class="fav-title">My Favourite</div>
        <!-- If no favourite before -->
        <div class="no-fav" id='noFavBox'>
            <img src="img/noResult.jpg">
            <div class="no-fav-description">
                Seem like you dont have favourtite yet
            </div>
            <button class="no-fav-search" onclick="window.location.href = '../carCategory/carCategory.html'">Search Now!</button>
        </div>

        <!-- Have favourite -->
        <table class="favourite-table" id='favTable'>
            <?php
                $userID = '2';

                // Get fav info
                $sqlFav = "SELECT * FROM favourite WHERE custID = '$userID'";
                $resultFav = mysqli_query($con, $sqlFav);
                $num_row = mysqli_num_rows($resultFav);


                if ($num_row != 0) {
                    while($arrayFav = mysqli_fetch_array($resultFav)) {
                        // Get car info
                        $carID = $arrayFav['carID'];
                        $sqlCar = "SELECT * FROM car WHERE carID = '$carID'";
                        $resultCar = mysqli_query($con, $sqlCar);
                        $arrayCar = mysqli_fetch_array($resultCar);

                        $brand = $arrayCar['brand'];
                        $model = $arrayCar['model'];
                        $variant = $arrayCar['variant'];
                        $carName = $brand ." " .$model ." " .$variant;

                        $year = $arrayCar['year'];
                        $transmission = $arrayCar['transmission'];
                        $mileage = $arrayCar['mileage'];
                        $engine = $arrayCar['engine'];
                        $carDescription =  "Year:\t$year<br/>
                                            Transmission:\t$transmission<br/>
                                            Mileage:\t$mileage<br/>
                                            Engine: $engine<br/>";

                        // Get car image
                        $sqlImage = "SELECT * FROM car_image WHERE carID = '$carID' GROUP BY carID";
                        $resultImage = mysqli_query($con, $sqlImage);
                        $arrayImage = mysqli_fetch_assoc($resultImage);
                        $image = $arrayImage['image'];
                        $urlAddress = "../CarProduct/CarProduct.php?carID=$carID";

                        $favRow = "<tr onclick=\"window.location.href= '$urlAddress'\">
                                        <td>
                                            <img src=\"data:image/png;base64,".base64_encode($image) ."\" height='200px' width='300px'>
                                        </td>
                                        <td>
                                            <div class='table-row'>
                                                <div class='col1'>
                                                    <div class='car-name'>
                                                        $carName
                                                    </div>
                                                    <div class='car-description'>
                                                            $carDescription
                                                    </div>
                                                </div>
                                                <div class='col2'>
                                                    <div class='delete-btn'>
                                                        <i class='fas fa-trash-alt'></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>";

                        echo $favRow;
                    }
                }
                else {
                    $data = "<script>
                                document.getElementsByClassName('no-fav')[0].style.display = 'block';
                                document.getElementsByClassName('favourite-table')[0].style.display = 'none';
                            </script>";
                    
                    echo $data;
                }
            ?>
        </table>
        
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


    <?php

    ?>
</body>