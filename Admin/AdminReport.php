<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="AdminReport.css">

    <!-- Library for Printing Service  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

</head>
<body>
    <?php 
        include "../Admin/ad-session.php";
        include '../Admin/admin-header.php';
        include("../conn.php");
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
        <!-- <div class='select-box'>
            <button class='selectBtn' id='appointmentBuy'>Appointment (Buy)</button>
            <button class='selectBtn' id='appointmentSell'>Appointment (Sell)</button>
            <button class='selectBtn' id='car'>Car</button>
            <button class='selectBtn' id='customer'>Customer</button>
            <button class='selectBtn' id='customerPurchase'>Customer Purchase Car</button>
        </div>
        <div class='select-box'>
            <button class='selectBtn' id='customerSell'>Customer Sell Car</button>
            <button class='selectBtn' id='favourite'>Favourite</button>
            <button class='selectBtn' id='feedback'>Feedback</button>
            <button class='selectBtn' id='refund'>Refund</button>
            <button class='selectBtn' id='ticket'>Support Ticket</button>
        </div> -->
        <?php
            $sqlCar = "SELECT * FROM car";
            $resultCar = mysqli_query($con, $sqlCar);
        ?>
        <div class='report-box car' id='reportBox'>
            <div class='report-title'>
                <h3>Report - Car</h3>
                
            </div>
            <div class='report-content' id='reportContent'>
                <table class='report-table ' id='reportTable'>
                    <?php
                        $numRow = mysqli_num_rows($resultCar);

                        $firstData =    "<tr>
                                            <td>CarID</td>
                                            <td>Model</td>
                                            <td>Price (RM)</td>
                                        </tr>";
                        echo $firstData;

                        while ($arrayCar = mysqli_fetch_array($resultCar)) {
                            $data = "<tr>
                                        <td>" .$arrayCar['carID'] ."</td>
                                        <td>" .$arrayCar['brand'] . " " .$arrayCar['model'] ."</td>
                                        <td>" .$arrayCar['price'] ."</td>

                                    </tr>";
                            echo $data;
                        }
                    ?>
                </table>
            </div>
        </div>

        <div id="editor"></div>
        <div class='print-report'>
            <button class='print-button' name='print-button'>Download as PDF</button>
        </div>
    </div>

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
            doc.save('report.pdf');
        });
</script>
</body>