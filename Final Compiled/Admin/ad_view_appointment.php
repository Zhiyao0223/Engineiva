<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad_appointment.css">
</head>
<body>
    <?php 
        include 'admin-header.php';
    ?>

    <div class="submenu">
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad_view_appointment.php" class="active">View Appointment</a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
            <li><a href="ad_order_history.php">Order History</a></li>
        </ul>
    </div>
    <?php 
        include ('conn.php');
        $search_key = "";
        if(isset($_POST['searchBtn'])){
            $search_key = $_POST['search_key'];
            
        }
            
        $item_result = mysqli_query($con, "SELECT * FROM buy_appointment INNER JOIN car ON buy_appointment.carID = car.carID INNER JOIN customer ON buy_appointment.custID = customer.custID WHERE firstName LIKE '%$search_key%' OR lastName LIKE '%$search_key%' ORDER BY buyID ");
        $result = mysqli_query($con, "SELECT * FROM sell_appointment INNER JOIN customer ON sell_appointment.custID = customer.custID WHERE firstName LIKE '%$search_key%' OR lastName LIKE '%$search_key%'  ORDER BY sellID");

        
             
        

       

    ?>
    <div class="content-container">
        <h2>View Appointment</h2>
        
        <div class="seach-contain">
            <form action="ad_view_appointment.php" method="POST">
                <input type="text" placeholder=" Search Customer Name" name="search_key" id="search-field" >
                <div class="searchbtn">
                    
                    <button type="submit" name="searchBtn" value="filter" class="searchbtn">
            <img src="search.png" alt="Submit" width="20px" height="20" height=auto></button>
                </div>
            </form>
        </div>

        <h3 style = "margin-top: 50px; margin-bottom: 5px"> Buy Appointment </h3>
        <table class="car-table">
            <tr class="table-title">
                <th>Buy ID</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Car ID</th>
                <th>Car</th>
                <th>Date</th>
                <th>Time</th>
                <th></th>
            </tr>
            
                <?php 
                while($car = mysqli_fetch_array($item_result)){
                    echo "<tr>";
                    echo "<td>".$car['buyID']."</td>";
                    echo "<td>".$car['custID']."</td>";
                    echo "<td>".$car['firstName'], "&nbsp" .$car['lastName']."</td>";
                    echo "<td>".$car['carID']."</td>";
                    echo "<td>".$car['brand'], "&nbsp" .$car['model']."</td>";
                    echo "<td>".$car['date']."</td>";
                    echo "<td>".$car['time']."</td>";
                    echo "<td><a href=\"ad_delete_buy.php?buyID=";
                    echo $car['buyID'];
                    echo "\" onClick=\"return confirm('Delete Buy ID = "; //JavaScript to confirm the deletion of the record
                    echo $car['buyID'];
                    echo " details?');\">Delete</a></td></tr>";
                }
                ?>

        </table>
        
        
        <h3 style = "margin-top: 30px; margin-bottom: 5px"> Sell Appointment </h3>

        <table class="car-table">
            <tr class="table-title">
                <th>Sell ID</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Variant</th>
                <th>Transmission</th>
                <th>Mileage</th>
                <th>Price</th>
                <th>Engine</th>
                <th>Date</th>
                <th>Time</th>
                <th></th>
            </tr>
            
                <?php 
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$row['sellID']."</td>";
                    echo "<td>".$row['custID']."</td>";
                    echo "<td>".$row['firstName'], "&nbsp" .$row['lastName']."</td>";
                    echo "<td>".$row['brand']."</td>";
                    echo "<td>".$row['model']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['variant']."</td>";
                    echo "<td>".$row['transmission']."</td>";
                    echo "<td>".$row['mileage']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['engine']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['time']."</td>";
                    echo "<td><a href=\"ad_delete_sell.php?sellID=";
                    echo $row['sellID'];
                    echo "\" onClick=\"return confirm('Delete Sell ID = "; //JavaScript to confirm the deletion of the record
                    echo $row['sellID'];
                    echo " details?');\">Delete</a></td></tr>";
                }
                ?>

        </table>
    </div>
    
</body>