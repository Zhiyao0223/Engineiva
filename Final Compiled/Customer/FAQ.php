<?php
    include("conn.php");
    include("session.php");
?>

<!DOCTYPE html>
<head>
    <title>FAQ</title>

    <link rel="stylesheet" href="style-faq.css">

    <!-- Font awesome icon pack  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="script-faq.js"></script>
</head>
<body>
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
                            Engineiva is a Online Platform that allows the selling or purchasing of cars all over Malaysia with just a click of a button. We aim to digitalize Malaysia's second-hand car industry by improving the experience of selling and purchasing of cars.
                            Our vision? Is to drive Malaysia's automotive industry forward regarding the second-hand car ecosystem.
                            Engineiva will only ensure that the only best price will be provided for our customers and the transaction will be completely secure and confidential.
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
                                You could edit your profile details by clicking this <a href="profile.php" style="font-weight: 400;">link</a>
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
                <div class="ticket-button" onclick="window.open('SupportCust.php');">
                    Create Ticket
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        include("footer.php");
    ?>
</body>