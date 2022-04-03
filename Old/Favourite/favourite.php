<?php
    include("conn.php");
    include("session.php");
?>
<!DOCTYPE html>
<head>
    <title>My Favourite</title>
    <link rel="stylesheet" href="style-favourite.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="script-favourite.js"></script>
</head>
<body>
    <!-- Main Container  -->
    <div class="container">
        <div class="fav-title">My Favourite</div>
        <!-- If no favourite before -->
        <div class="no-fav" id='noFavBox'>
            <img src="imgFav/noResult.jpg">
            <div class="no-fav-description">
                Seem like you dont have favourtite yet
            </div>
            <button class="no-fav-search" onclick="window.location.href = 'carCategory.html'">Search Now!</button>
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
                        $urlAddress = "CarProduct.php?carID=$carID";

                        $favRow = "<tr onclick=\"window.open('$urlAddress')\">
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
    <?php
        include("footer.php");
    ?>
</body>