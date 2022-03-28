<?php
    include("../conn.php");

    // Check for carID in URL
    if (isset($_GET['carID'])) {
        $carID = $_GET['carID'];
        
    }
    // Return error if no carID include in URL
    else {
        echo "  <script>
                    alert('Error on retrieving car details. Please contact admin immediately ><')
                    window.location.href = '../CarCategory/CarCategory.php';
                </script>";
    }

    // Retrieve car info from db
    $sqlCar = "SELECT * FROM car WHERE carID = '$carID'";
    $resultCar= mysqli_query($con, $sqlCar);
    $arrayCar = mysqli_fetch_array($resultCar);

    // Return error if car is sold out or not available
    if ($arrayCar['sellStatus'] == "Sold") {
        echo    "<script>
                    alert('This car is being sold out.')
                    window.location.href = '../CarCategory/CarCategory.php';
                </script>";
    }
    else if($arrayCar['sellStatus'] == "Not Available") {
        echo    "<script>
                    alert('This car is not available at the moment.')
                    window.location.href = '../CarCategory/CarCategory.php';
                </script>";
    }
    $brand = $arrayCar['brand'];
    $model = $arrayCar['model'];
    $variant = $arrayCar['variant'];
    $carName = $brand ." " .$model ." " .$variant;
    // echo "<script>alert('$carName')</script>";

    $year = $arrayCar['year'];
    $engine = $arrayCar['engine'];
    $transmission = $arrayCar['transmission'];
    $mileage = $arrayCar['mileage'];
    
    // Get price and add ',' to it
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

    // Retrieve image from db and store in array
    $image = array();
    $sqlImage = "SELECT * FRom car_image WHERE carID = '$carID'";
    $resultImage = mysqli_query($con, $sqlImage);
    while($arrayImage = mysqli_fetch_assoc($resultImage)) {
        array_push($image, $arrayImage['image']);
    }

    // Get remark and split it by ';'
    $remark = $arrayCar['remark'];
    $remarkArray = explode(";", $remark);


?>

<!DOCTYPE html>
<head>
    <title><?php echo $carName; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body onload="getDeposit()">
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
        <!-- Pop Up Image Box -->
        <div id="imageModal">
            <div class="modal-width">
                <div class="row">
                    <div class="left-panel" onclick="arrowChangeImage('prev')">
                        <div class="left-arrow">
                            <i class="fas fa-angle-double-left"></i>
                        </div>
                        
                    </div>
                    <div class="imageContent">
                        <img id='currentImg' src="<?php echo "data:image/png;base64," .base64_encode($image[0]) ?>">
                        <a id='close' name='image' onclick="verification('close', 'image')">&times</a>
                    </div>
                    <div class="right-panel" onclick="arrowChangeImage('next')">
                        <div class="right-arrow">                 	
                            <i class="fas fa-angle-double-right"></i>
                        </div>
                    </div>
                </div>
                <div class="bottom-row">
                    <table class="bottom-row-image">
                        <tr>
                            <?php 
                                $arraySize = sizeof($image);
                                
                                for ($i = 0; $i < $arraySize; $i++) {
                                    $rowData = "<td>
                                                    <img class='bottom-image' src=\"data:image/png;base64," .base64_encode($image[$i]) ."\" onclick=\"changeImage('0')\">
                                                </td>";

                                    echo $rowData;
                                }
                            ?>

                        </tr>
                    </table>
                </div>
            </div>


        </div>

        <!-- Popup Checkout Box  -->
        <div id='checkoutModal' class='modal'>
            <div class='modalContent'>
                <a id='close' name='checkout' onclick="verification('close', 'checkout')">&times</a>
                <div class='modalHeader'>Buy option </div>
                <div class="modalDescription">Please select your prefer option to buy car</div>
                <table class="checkout-table">
                    <tr>
                        <td>
                            <div class="option-title">Schedule a Test Drive</div>
                        </td>
                        <td>
                            <div class='option-title'>Book & Secure Your Car</div>
                        </td>
                    </tr>
                    <tr>  
                        <td>
                            <div class="option-description">
                                Test Drive at Our Inspection Centre which available at numerous major cities in Penisular Malaysia. 
                                For those could not attend physically or not fully vacinnated, our company will provide a virtual tour for you.
                            </div>
                        </td>
                        <td>
                            <div class="option-description">
                                Pay minimum of 1% deposit of the car price to secure your car. You could head to the inspection center or create a
                                <a href="../SupportCust/SupportCust.html" target="_blank">support ticket</a> to discuss and settle the documents signing.
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class='modalSubmit' value="half" onclick="verification('open', 'testDrive')">Select</button>
                        </td>
                        <td>
                            <button class='modalSubmit' value="full" onclick="alert('Redirecting to Payment Page...');
                                                                                    window.location.href = '../Payment/payment.php'">Select</button>
                        </td>
                    </tr>    
                            
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Popup TestDrive Box -->
        <div id='testDriveModal' class='modal'>
            <div class='modalContent'>
                <a id='close' name='checkout' onclick="verification('close', 'testDrive')">&times</a>
                <div class='modalHeader'>Test Drive Appointment Form </div>
                <div class="modalDescription">Please fill in your information</div>
                
                <form action="#" class='test-drive-form' method="post">
                    <input type="text" id="custID" hidden>

                    <table class="form-table">
                        <!-- Appointment Type  -->
                        <tr>
                            <td>
                                <div class="title" name="appointmentMode">
                                    Type
                                </div>
                            </td>
                            <td>
                                <div class="form-input">
                                    <select id='appointmentType' name="appointmentType" required onchange="displayLocationBox()">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="physical">Physical</option>
                                        <option value="virtual">Virtual</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <!-- Location -->
                        <tr>
                            <td>
                                <div class="title" id="location-box" name="location">
                                    Location
                                </div>
                            </td>
                            <td>
                                <div class="form-input">
                                    <select id="location" name="location">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="kl">Kuala Lumpur</option>
                                        <option value="melaka">Melaka</option>
                                        <option value="perak">Perak</option>
                                        <option value="pahang">Pahang</option>
                                        <option value="selangor">Selangor</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <!-- Date  -->
                        <tr>
                            <td>
                                <div class="title">
                                    Appointment Date
                                </div>
                            </td>
                            <td>
                                <div class="form-input">
                                    <input type="date" id="date" name="date" required onchange="checkDate()">
                                </div>
                            </td>
                        </tr>
                        <!-- Time  -->
                        <tr>
                            <td>
                                <div class="title" name="appointmentMode">
                                    Time
                                </div>
                            </td>
                            <td>

                                <div class="form-input">
                                    <input type="time" id="time" name="time" onchange="checkHour()" required>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="submit-box">
                        <input type="submit" class="submit-btn" value="Submit" name="testDriveSubmit">
                    </div>
                </form>
            </div>
        </div>

        <!-- Content -->
        <div class="title-container">
            <?php echo $carName; ?>
        </div>
        <div class="picture-container">
            <table class="picture-table">
                <tr>
                    <td rowspan="2">
                        <img class='first-img' <?php 
                                                    $data = "src=\"data:image/png;base64," .base64_encode($image[0])  ."\"";
                                                    echo $data;
                                                ?>    
                                                onclick="changeImage('0')">
                    </td>
                    <td>
                        <img class='img' <?php 
                                            $data = "src=\"data:image/png;base64," .base64_encode($image[1])  ."\"";
                                            echo $data;
                                        ?>     onclick="changeImage('1')">
                    </td>
                    <td>
                        <img class='img' <?php 
                                            $data = "src=\"data:image/png;base64," .base64_encode($image[2])  ."\"";
                                            echo $data;
                                        ?>  onclick="changeImage('2')">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class='img' <?php 
                                            $data = "src=\"data:image/png;base64," .base64_encode($image[3])  ."\"";
                                            echo $data;
                                        ?>  onclick="changeImage('3')">
                    </td>
                    <td onclick="changeImage('4')">
                        <img class='img last-image' <?php 
                                            $data = "src=\"data:image/png;base64," .base64_encode($image[4])  ."\"";
                                            echo $data;
                                            ?>  >
                        <div class="square">
                            <div class="extra-pic">+10</div>
                        </div>
                        
                    </td>
                </tr>
            </table>
        </div>
        <div class="bottom-container">

            <div class="description-box">
                <div class="description-title">
                    Specifications
                </div>
                <div class="description">
                    <div class="carID">
                        1
                    </div>
                    <div class="description-container">
                        <div class="specification-box">
                            <div class="year">
                                <div class="specification-title">
                                    Year
                                </div>
                                <div class="specification-content">
                                    <?php echo $year; ?>
                                </div>
                            </div>
                        </div>
                        <div class="specification-box">
                            <div class="engine">
                                <div class="specification-title">
                                    Engine
                                </div>
                                <div class="specification-content">
                                    <?php echo $engine; ?>
                                </div>
                            </div>
                        </div>
                        <div class="specification-box">
                            <div class="transmission">
                                <div class="specification-title">
                                    Transmission
                                </div>
                                <div class="specification-content">
                                    <?php echo $transmission; ?>
                                </div>
                            </div>
                        </div>
                        <div class="specification-box">
                            <div class="mileage">
                                <div class="specification-title">
                                    Mileage
                                </div>
                                <div class="specification-content">
                                    <?php echo $mileage ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="additional-feature">
                        <div class="specification-title">
                            Remark
                        </div>
                        <ul>
                            <?php
                                for ($i = 0; $i < sizeof($remarkArray); $i++) {
                                    $remarkData = "<li>" .$remarkArray[$i] ."</li>";
                                    echo $remarkData;
                                }
                            ?>
                        </ul>
                    </div>

                </div>
                
            </div>
            <div class="checkout-box">
                <div class="calculator">
                    <div class="calculator-title">
                        Loan Calculator
                    </div>                
                    <div class="form-title">
                            Deposit Amount (RM)<br/>
                            <input type="number" class="form-text" id="deposit" onblur="validateDeposit()">
                    </div>
                    <div class="form-title">
                        Bank Rates (%)<br/>
                        <input type="number" 
                            min="1" 
                            max="99"
                            value="1"
                            oninput=checkRates()
                            class="form-text" 
                            id="rates">
                    </div>
                    <div class="form-title">
                        Repayment Period<br/>
                        <select class="repayment" name="repayment" onchange="calculateRates()">
                            <option selected="selected" id="7y" value="7">7 years</option>
                            <option id="5y" value="5">5 years</option>
                            <option id="9y" value="9">9 years</option>
                        </select>
                    </div>
                </div>
                <div class="price-range">
                    <div class="price">
                        <?php echo $newPrice; ?>
                    </div>
                    <div class="or">OR</div>
                    <div class="price1">
                        <div id="calculator-price">RM 800</div> / Month
                    </div>
                </div>

                <div class="button-section">
                    <button class="checkout-button" onclick="verification('open', 'checkout')">Get Started !</button>
                </div>
            </div>
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