<?php
    include("../conn.php");
?>

<!DOCTYPE html>
<head>
    <title>Car Category</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
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
    <div class="main-container"> 
         <!-- Brand Popup Box -->
         <div class="brand-modal" id="brand">
            <a id='close' name='brand' onclick="verification('close')">&times</a>
            <div class="brand-box">
                <div class="brand-title">
                    Available Brands
                </div>
                <div class="brand-row">
                    <div class="brand-col1">
                        <div class="brand-name">
                            <img class='brand-img' src="img/bmw-logo.png">
                            <div class="brands">
                                BMW
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/mazda.jpg">
                            <div class="brands">
                                Mazda
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/mini.jpg">
                            <div class="brands">
                                Mini
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/perodua.jpg">
                            <div class="brands">
                                Perodua
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/subaru.png">
                            <div class="brands">
                                Subaru
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/volkswagen.jpg">
                            <div class="brands">
                                Volkswagen
                            </div>
                        </div>
                    </div>
                    <div class="brand-col2">
                        <div class="brand-name">
                            <img class="brand-img" src="img/honda.jpg">
                            <div class="brands">
                                Honda
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/mercedes.jpg">
                            <div class="brands">
                                Mercedes
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/nissan.png">
                            <div class="brands">
                                Nissan
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/proton.png">
                            <div class="brands">
                                Proton
                            </div>
                        </div>
                        <div class="brand-name">
                            <img class="brand-img" src="img/toyota.png">
                            <div class="brands">
                                Toyota
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <!-- Main Content Start  -->
        <div class="top-container">
                <input type="text" 
                        name="search-name" 
                        class="fas fa-search input-name" id="search-name" 
                        placeholder="&#xf002; Search Your Car Here.." 
                        maxlength="50">
        
            <div class="row">
                <!-- Filter bar -->
                <div class="col1">
                    <div class="filter-title">
                        Brands
                    </div>
                    <div class="filter-brand">
                        BMW
                    </div>
                    <div class="filter-brand">
                        Honda
                    </div>
                    <div class="filter-brand">
                        Mazda
                    </div>
                    <div class="filter-brand">
                        Mercedes
                    </div>
                    <div class="filter-brand more-brand" onclick="verification('open')">
                        More Brands
                    </div>
                </div>
                
                <!-- Sort Bar  -->  
                <div class="col2">
                    <div class="sort-bar">
                        <!-- Sort Type  -->
                        <div class="sort-by">
                            Sort By:
                        </div>

                        <!-- Range High Low -->
                        <select class="sort-range" name="rangeSize" id="rangeSize">
                            <option value="default" selected="selected">No Filter<span><i class="fas fa-angle-down"></i></span></option>
                            <option value="priceHigh">Price : High > Low</option>
                            <option value="priceLow">Price : Low  > High</option>
                            <option value="transmissionHigh">Transmission : High  > Low</option>
                            <option value="transmissionLow">Transmission : Low  > High</option>
                            <option value="yearHigh">Year : High  > Low</option>
                            <option value="yearLow">Year: Low > High</option>
                            <option value="gearAuto">Gear: Automatic</option>
                            <option value="gearManual">Gear: Manual</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-container">
            <table class="car-table">
                <tr>
                    <?php
                        $counter = 0;
                        $sqlCar = "SELECT * FROM car";
                        $resultCar = mysqli_query($con, $sqlCar);
                        
                        while($arrayCar = mysqli_fetch_array($resultCar)) {
                            if ($counter % 3 == 0 && $counter != 0) {
                                echo "</tr><tr>";
                            }

                            $carID = $arrayCar['carID'];
                            $brand = $arrayCar['brand'];
                            $model = $arrayCar['model'];
                            $variant = $arrayCar['variant'];
                            $carName = $brand ." " .$model ." " .$variant;

                            $engine = $arrayCar['engine'];
                            $transmission = $arrayCar['transmission'];
                            $year = $arrayCar['year'];

                            // Get Price and add currency format to it
                            $price = $arrayCar['price'];
                            $length = strlen($price);

                            if ($length > 6) {
                                $firstPart = substr($price, 0, -6);
                                $secondPart = substr($price, -6);
                        
                                $newPrice = "RM" .$firstPart .", " .$secondPart;
                                $firstPart = substr($price, 0, -3);
                                $secondPart = substr($price, -3);
                            }
                            else if ($length > 3) {
                                $firstPart = substr($price, 0, -3);
                                $secondPart = substr($price, -3); 
                            }
                            $newPrice = "RM" .$firstPart .", " .$secondPart;

                            $sqlImage = "SELECT * FROM car_image WHERE carID = '$carID' GROUP BY carID";
                            $resultImage = mysqli_query($con, $sqlImage);
                            $arrayImage = mysqli_fetch_assoc($resultImage);
                            $image = $arrayImage['image'];
                            
                            $data = "<td class='$brand' id='$carID' onclick=\"window.location.href='../CarProduct/CarProduct.php?carID=$carID'\">
                                        <img src=\"data:image/png;base64," .base64_encode($image) ."\" class='image'>
                                        <div class = 'image-description'>
                                            <span>$carName</span><br/>
                                            Year: $year<br/>
                                            Engine: $engine<br/>
                                            Tranmission: $transmission<br/>
    
                                        </div>
                                        <div class='price'>
                                            $newPrice
                                        </div>
                                    </td>";
                            echo $data;
                            
                            $counter++;
                        }
                    ?>
                </tr>
            </table>
        </div>
    </div>

    <!-- Footer  -->
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