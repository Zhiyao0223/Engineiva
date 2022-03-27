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
            <li><a href="ad-modify-remove.php" class="active">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
        </ul>
    </div>

    <?php 
        // If user click the search icon
        if(isset($_POST['searchBtn'])){
            // Retrieve the search key
            $search_key =$_POST['search_key'];
            // Create SQL code to search if the search key exits in multiple attribute
		    $query ="SELECT * FROM car WHERE CONCAT(carID, brand, model, year, variant, engine, transmission, mileage, price, sellStatus, remark)
             LIKE '%$search_key%' GROUP BY carID";
        }
        // Else create SQL code that displays every car record
        else{
            $query ="SELECT * FROM car GROUP BY carID";   
        }

        // Connect engineiva database     
        include ('db.php');
        // Execute the SQL code
        $item_result = mysqli_query($con,$query);
        // Declare a variable and store the number of exist of the SQL result
        $row_count = mysqli_num_rows($item_result);
        // Close engineiva database connection
        mysqli_close($con);
    ?>

    <!-- Start of main content -->
    <div class="content-container">
        <h2>Modify and Remove</h2>
        <!-- Start of search form -->
        <div class="seach-contain">
            Item(s) found: <?php echo $row_count;?>
            <form action="ad-modify-remove.php" method="POST">
                <input type="text" placeholder="Search..." name="search_key" id="search-field" >
                <div class="searchbtn">
                    <button type="submit" name="searchBtn" value="filter" class="searchbtn">
                        <img src="search.png" alt="Submit" width="20px" height=auto>
                    </button>
                </div>
            </form>
        </div>
        <!-- End of search form -->

        <!-- Start of car table -->
        <table class="car-table">
            <tr class="table-title">
                <th>Car ID</th>
                <th>Car Image</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Variant</th>
                <th>Engine</th>
                <th>Transmission</th>
                <th>Mileage</th>
                <th>Price</th>
                <th>Status</th>
                <th>Remark</th>
                <th></th>
            </tr>
            
            <?php 
                // Fetch car record and echo one by one
                while($car = mysqli_fetch_array($item_result)){
                    echo "<tr>";
                    echo "<td>".$car['carID']."</td>";
                    echo '<td><a class="view-images" href="ad-view-image.php?carID='.$car['carID'].'">View Images</a></td>';
                    echo "<td>".$car['brand']."</td>";
                    echo "<td>".$car['model']."</td>";
                    echo "<td>".$car['year']."</td>";
                    echo "<td>".$car['variant']."</td>";
                    echo "<td>".$car['engine']."</td>";
                    echo "<td>".$car['transmission']."</td>";
                    echo "<td>".$car['mileage']."</td>";
                    echo "<td>".$car['price']."</td>";
                    echo "<td>".$car['sellStatus']."</td>";
                    echo "<td>".$car['remark']."</td>";
                    echo '<td>
                            <button class="editbtn"><a href="ad-car-edit.php?carID='.$car['carID'].'"><img src="edit.png"></a></button>
                            <button class="deletebtn" name="delete-img"><a href="car-remove.php?carID='.$car['carID'].'"><img src="bin.png"></a></button>
                          </td>';
                    echo "</tr>";
                }
            ?>
        </table>
         <!-- End of car table -->
    </div>
    <!-- End of main content -->
    
</body>
</html>