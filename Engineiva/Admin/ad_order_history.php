<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-modify-remove.css">
</head>
<body>
    <?php 
        include 'admin-header.php';
    ?>

    <div class="submenu">
        <ul class="menu-content">
        <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
            <li><a href="ad_order_history.php" class="active">Order History</a></li>
            <li><a href='AdminReport.php'>Report Generation</a></li>
        </ul>
    </div>

    <?php 
        include ('conn.php');
        $result = mysqli_query($con, "SELECT * FROM cust_buy INNER JOIN customer ON cust_buy.custID = customer.custID INNER JOIN car ON cust_buy.carID = car.carID");
    ?>

    <div class="content-container">
        <h2 style = "margin-bottom: 30px">Order History</h2>


        <table class="car-table">
            <tr class="table-title">
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Car ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Variant</th>
                <th>Transmission</th>
                <th>Mileage</th>
                <th>Price</th>
                <th>Engine</th>
                <th>Date</th>
                <th>Secure Fee</th>
                <th>Payment Method</th>
                <th></th>
            </tr>
            
                <?php 
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$row['custID']."</td>";
                    echo "<td>".$row['firstName'], "&nbsp" .$row['lastName']."</td>";
                    echo "<td>".$row['carID']."</td>";
                    echo "<td>".$row['brand']."</td>";
                    echo "<td>".$row['model']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['variant']."</td>";
                    echo "<td>".$row['transmission']."</td>";
                    echo "<td>".$row['mileage']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['engine']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['secureFee']."</td>";
                    echo "<td>".$row['paymentMethod']."</td>";
                }
                ?>

        </table>
    </div>
    
</body>