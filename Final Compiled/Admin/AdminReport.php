<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="AdminReport.css">

    <!-- Library for Printing Service  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script type="text/javascript">
        // Auto Enter total price
        function enterTotal(total){
            document.getElementById("total").innerHTML = "RM " + total;
        }
    </script>
</head>
<body>
    <?php 
        include "ad-session.php";
        include 'admin-header.php';
        include("conn.php");
    ?>

    <div class="submenu">   
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php"  class="active">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
            <li><a href='#'>Report Generation</a></li>
        </ul>
    </div>

    <div class='content-container' id='contentContainer'>
        <div class='top-title'>
            Report Generation:
        </div> 
        <?php
            $sqlCustBuy = "SELECT * FROM cust_buy";
            $resultCustBuy = mysqli_query($con, $sqlCustBuy);
    
        ?>
        <div class='report-box car' id='reportBox'>
            <div class='report-title'>
                <h3>Report - Car</h3>
                
            </div>
            <div class='report-content' id='reportContent'>
                <table class='report-table ' id='reportTable'>
                    <?php
                        $total = 0;
                        $firstPart = "";
                        $secondPart = "";
                        $firstData =    "<tr>
                                            <td>Car Name</td>
                                            <td>Date</td>
                                            <td>Price (RM)</td>
                                        </tr>";
                        echo $firstData;

                        while ($arrayCustBuy = mysqli_fetch_array($resultCustBuy)) {
                            // Get car detail
                            $carCustBuy = $arrayCustBuy['carID'];
                            // echo "<script>alert('$carCustBuy')</script>";
                            $sqlCar = "SELECt * FROM car WHERE carID='$carCustBuy'";
                            $resultCar = mysqli_query($con, $sqlCar);
                            $arrayCarDetail = mysqli_fetch_array($resultCar); 

                            $brand = $arrayCarDetail['brand'];
                            $model = $arrayCarDetail['model'];
                            $variant = $arrayCarDetail['variant'];
                            $newCarName = $brand .$model .$variant;

                            $price = (int)$arrayCustBuy['secureFee'] * 100;
                            $total += $price;
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
                            $newPrice = $firstPart ."," .$secondPart;

                            $data = "<tr>
                                        <td>" .$newCarName ."</td>
                                        <td>" .$arrayCustBuy['date'] ."</td>
                                        <td>" .$newPrice ."</td>
                                    </tr>";
                            echo $data;
                        }

                        $lengthTotal = strlen($total);
                        if ($lengthTotal > 6) {
                            $firstPart = substr($total, 0, -6);
                            $secondPart = substr($total, -6);
                    
                            $newPrice = "RM" .$firstPart .", " .$secondPart;
                            $firstPart = substr($total, 0, -3);
                            $secondPart = substr($total, -3);
                        }
                        else if ($lengthTotal > 3) {
                            $firstPart = substr($total, 0, -3);
                            $secondPart = substr($total, -3); 
                        }
                        $newTotal = $firstPart ."," .$secondPart;
                        
                    ?>
                </table>
                <div class='profit-box'>
                    <h2 class='profit'>
                            Profit
                    </h2>
                    <h2 class='priceTotal' id='total' style='color:green;display:inline-block'>1</h2>
                </div>

            </div>
        </div>

        <div id="editor"></div>
        <div class='print-report'>
            <button class='print-button' name='print-button'>Download as PDF</button>
        </div>
    </div>
    <?php
        $scriptEnterTotal = "<script>enterTotal('$newTotal')</script>";
        echo $scriptEnterTotal;
    ?>

    <!-- Print feature  -->
    <script type="text/javascript">
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };
        
        
        $('.print-button').click(function () {
            doc.fromHTML($('#reportBox').html(), 15 , 0, {
                'width' : 522,
                'elementHandlers': specialElementHandlers
            });
            // doc.output('save', 'report.pdf');
            doc.output('datauristring');  
            doc.output('datauri');  
            window.open(doc.output('bloburl')) 
        });
</script>
</body>