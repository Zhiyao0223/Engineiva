<?php
    session_start();
    if(isset($_SESSION['mysession'])) {
        include("header_login.php");
    } 
    else {
        include("header_cust.php");
    }
?>

<!DOCTYPE html>
<head>
    <title>FAQ</title>

    <link rel="stylesheet" href="style.css">

    <!-- Font awesome icon pack  -->
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

    <div class="container">
        <!-- Title Box  -->
        <div class="top-container">
            <div class="faq-title">
                Frequently Ask Questions (FAQ)
            </div>
        </div>
        <div class="btm-container">
            <div class="row">
                <div class="col1">
                    <div class="col1-title">
                        Categories
                    </div>
                    <a class="col1-categories" href="#general">
                        General
                    </a>
                    <a class="col1-categories" href="#account">
                        Account
                    </a>
                    <a class="col1-categories" href="#order">
                        Orders & Payment
                    </a>
                    <a class="col1-categories" href="#refund">
                        Refund
                    </a>
                    <a class="col1-categories" href="#support-ticket">
                        Support Ticket
                    </a>
                </div>
                <div class="col2">
                    <!-- ID is used for href -->
                    <!-- General Section  -->
                    <div class='subCategory' id="general">
                        <div class="col2-title">
                            General
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('0')">
                                What is Engineiva?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                Later copy about us.......
                            </div>
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('1')">
                                What are your operating hour?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                Our customer service teams are operating from: <br>
                                Monday - Sunday (10:00am to 7:00pm)<br><br>

                                Our inspection centers are operating from: <br>
                                Monday - Saturday (10:00am to 6:00pm)
                            </div>
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('2')">
                                Why buy from Engineiva?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                Our Engineiva cars are all in good quality and conditions as we will do maintenance to our cars regularly and take good care of it. 
                                Besides, customer sastisfaction and demands will always be taken care of as we would never want to let our clients down.
                            </div>
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('3')">
                                How do I get in touch with someone from Enginieva?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                You can reach us through the following channel: 
                                
                            </div>
                        </div>
                    </div>

                    <!-- Account  -->
                     <div class='subCategory' id="account">
                        <div class="col2-title">
                            Account
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('4')">
                                How to change an email address that is not being used anymore?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                For this issue, kindly scroll down to the ticket section and create a ticket listing the details. Our support teams will assist you in changing your email address.
                            </div>
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('5')">
                                How can I edit my profile details
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                You could edit your profile details by clicking this <a href="../Profile/profile.php" style="font-weight: 400;">link</a>
                            </div>
                        </div>
                    </div>

                    <!-- Order & Payment Section  -->
                    <div class='subCategory' id="order">
                        <div class="col2-title">
                            Orders & Payment
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('6')">
                                What is the process of selling car appointments?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer" style="text-align: justify; text-justify: inter-word;">
                                Notify your inspector-in-charge when you arrive for your inspection. 
                                The whole appointment should not take more than 30 minutes. 
                                Our professional, certified inspectors will conduct a thorough 175-point inspection of your car, which includes a short road test. 
                                The road drive helps us to determine the realistic value of your car. 
                                Photos will also be taken for record and reporting purposes.<br/><br/>

                                We will offer you a price to buy your car on the spot. 
                                If you agree to accept the offer and sell to us, we will complete all the necessary paperwork for you, and pay you via online transfer within 1 hour.<br/><br/>

                                *Subject to <a style="font-weight: 400; color: blue; cursor: pointer;">terms and conditions</a> and receipt of all documents.
                            </div>
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('7')">
                                What are the process of buying car appointment?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                Once you secured the car by paying a minimum of 1% total vehicle price, you will asked to head to the inspection centres to sign for the related documentations.<br/>
                            </div>
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('8')">
                                What are the payment method available?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                Our company will accept Visa / Debit card payment only.
                            </div>
                        </div>
                    </div>


                    <!-- Refund Section -->
                    <div class='subCategory' id="refund">
                        <div class="col2-title">
                            Refund
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('9')">
                                Do I get a full refund if I cancel the booking?
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                Yes, you could get back 100% of your money if you cancel the booking within 3 days.<br>
                                For more information, you could create a <a href="#support-ticket" style="font-weight: 400; color: blue;">ticket</a> describing your doubts or issues.
                            </div>
                        </div>
                        <div class="question-box">
                            <div class="question" onclick="toggleAnsBox('10')">
                                How long does it take to refund
                                <div class="arrow-down">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="answer">
                                It would take up to 7 working days.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Support Ticket -->
            <div class="ticketBox" id="support-ticket">
                <div class="ticket-description">
                    Didn't found your answer? Message Us!
                </div>
                <div class="ticket-button" onclick="window.open('../SupportCust/SupportCust.html');">
                    Create Ticket
                </div>
            </div>
        </div>
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