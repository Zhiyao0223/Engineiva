<?php
    include("conn.php");
    include("session.php");

    if (isset($_GET['carID'])) {
        $carBrand = $_GET['carID'];
        echo "<script>alert('$carBrand')</script>";
        // echo "<script>filter('$carBrand')</script>";
    }
?>

<!DOCTYPE html>
<head>
    <title>Car Category</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style-car-category.css">
    <script src="script-car-category.js"></script>
</head>
<body>
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
                        <div class="brand-name" id='brandTopBMW' onclick="filter('BMW')">
                            <img class='brand-img' src="imgCarCategory/bmw-logo.png">
                            <div class="brands">
                                BMW
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopMazda' onclick="filter('Mazda')">
                            <img class="brand-img" src="imgCarCategory/mazda.jpg">
                            <div class="brands">
                                Mazda
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopMini' onclick="filter('Mini')">
                            <img class="brand-img" src="imgCarCategory/mini.jpg">
                            <div class="brands">
                                Mini
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopPerodua' onclick="filter('Perodua')">
                            <img class="brand-img" src="imgCarCategory/perodua.jpg">
                            <div class="brands">
                                Perodua
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopSubaru' onclick="filter('Subaru')">
                            <img class="brand-img" src="imgCarCategory/subaru.png">
                            <div class="brands">
                                Subaru
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopVolkswagen' onclick="filter('Volkswagen')">
                            <img class="brand-img" src="imgCarCategory/volkswagen.jpg">
                            <div class="brands">
                                Volkswagen
                            </div>
                        </div>
                    </div>
                    <div class="brand-col2">
                        <div class="brand-name" id='brandTopHonda' onclick="filter('Honda')">
                            <img class="brand-img" src="imgCarCategory/honda.jpg">
                            <div class="brands">
                                Honda
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopMercedes' onclick="filter('Mercedes')">
                            <img class="brand-img" src="imgCarCategory/mercedes.jpg">
                            <div class="brands">
                                Mercedes
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopNissan' onclick="filter('Nissan')">
                            <img class="brand-img" src="imgCarCategory/nissan.png">
                            <div class="brands">
                                Nissan
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopProton' onclick="filter('Proton')">
                            <img class="brand-img" src="imgCarCategory/proton.png">
                            <div class="brands">
                                Proton
                            </div>
                        </div>
                        <div class="brand-name" id='brandTopToyota' onclick="filter('Toyota')">
                            <img class="brand-img" src="imgCarCategory/toyota.png">
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
                        maxlength="50" onkeyup='searchName(this.value)'>
        
            <div class="row">
                <!-- Filter bar -->
                <div class="col1">
                    <div class="filter-title">
                        Brands
                    </div>
                    <div class="filter-brand" id='filterBtmBMW' onclick="filter('BMW')">
                        BMW
                    </div>
                    <div class="filter-brand" id='filterBtmHonda' onclick="filter('Honda')">
                        Honda
                    </div>
                    <div class="filter-brand" id='filterBtmMazda' onclick="filter('Mazda')">
                        Mazda
                    </div>
                    <div class="filter-brand" id='filterBtmMercedes' onclick="filter('Mercedes')">
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
                        <select class="sort-range" name="rangeSize" id="rangeSize" onchange='sort(this.value)'>
                            <option value="default" selected="selected">No Filter<span><i class="fas fa-angle-down"></i></span></option>
                            <option value="priceHigh">Price : High > Low</option>
                            <option value="priceLow">Price : Low  > High</option>
                            <option value="auto">Transmission : Automatic</option>
                            <option value="manual">Transmission : Manual</option>
                            <option value="yearHigh">Year : High  > Low</option>
                            <option value="yearLow">Year: Low > High</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-container">
            <div class="car-table" id='carTable'>
                <?php
                    $counter = 0;
                    $sqlCar = "SELECT * FROM car";
                    $resultCar = mysqli_query($con, $sqlCar);
                    
                    while($arrayCar = mysqli_fetch_array($resultCar)) {
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
                        
                        $data = "<div class='carBox $brand'>
                                    <div id='$carID' onclick=\"window.location.href='CarProduct.php?carID=$carID'\">
                                        <img src=\"data:image/png;base64," .base64_encode($image) ."\" class='image'>
                                        <div class = 'image-description'>
                                            <span class='carName'>$carName</span><br/>
                                            <div class='year'>Year: $year</div>
                                            <div class='engine'>Engine: $engine</div>
                                            <div class='$transmission'>Tranmission: $transmission</div>
                                        </div>
                                        <div class='price'>
                                            $newPrice
                                        </div>
                                    </div>
                                </div>";
                        echo $data;
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer  -->
    <?php
        include("footer.php");
    ?>
    <script>saveBodyContent()</script>
</body>