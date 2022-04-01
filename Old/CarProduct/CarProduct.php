<?php
    include("conn.php");
    session_start();

    // Check for carID in URL
    if (isset($_GET['carID'])) {
        $carID = $_GET['carID'];
        
    }
    // Return error if no carID include in URL
    else {
        echo "  <script>
                    alert('Error on retrieving car details. Please contact admin immediately ><')
                    window.location.href = 'CarCategory.php';
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
                    window.location.href = 'CarCategory.php';
                </script>";
    }
    else if($arrayCar['sellStatus'] == "Not Available") {
        echo    "<script>
                    alert('This car is not available at the moment.')
                    window.location.href = 'CarCategory.php';
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
    <link rel="stylesheet" href="style-car-product.css">
    <script src="script-car-product.js"></script>
</head>
<body onload="getDeposit()">
    <!-- Header  -->
    <?php
        if(isset($_SESSION['mysession'])) {
            include("header_login.php");
        } 
        else {
            include("header_cust.php");
        }
    ?>

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
                        <img id='currentImg' src="<?php echo "data:image/png;base64," .base64_encode($image[0]) ?>" height='500px' width='500px'>
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
                                                    <img class='bottom-image' src=\"data:image/png;base64," .base64_encode($image[$i]) ."\" onclick=\"changeImage('$i')\">
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
                                <a href="SupportCust.html" target="_blank">support ticket</a> to discuss and settle the documents signing.
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class='modalSubmit' value="half" onclick="verification('open', 'testDrive')">Select</button>
                        </td>
                        <td>
                            <button class='modalSubmit' value="full" onclick="alert('Redirecting to Payment Page...');
                                                                                document.getElementById('carIDSubmit').submit();">Select</button>
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
                    <form action='checkout.php' id='carIDSubmit' method='post'>
                        <input class="carID" name='carID' value='<?php echo $carID ?>'>
                    </form>
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
                                    Mileage (KM)
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
    <?php
        include("footer.php");
    ?>
</body>