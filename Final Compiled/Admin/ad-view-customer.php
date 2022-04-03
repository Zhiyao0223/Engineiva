<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-modify-remove.css">
</head>
<body>
    <?php include "ad-session.php"?>
    
    <?php 
        include 'admin-header.php';
    ?>

    <div class="submenu">
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php" class="active">View Customer Record </a></li>
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
		    $query ="SELECT * FROM customer WHERE CONCAT(custID, firstName, lastName, email, gender, DOB, phoneNum, identityCard)
             LIKE '%$search_key%' GROUP BY custID";
        }
        // Else create SQL code that displays every car record
        else{
            $query ="SELECT * FROM customer GROUP BY custID";   
        }

        // Connect engineiva database     
        include ('conn.php');
        // Execute the SQL code
        $item_result = mysqli_query($con,$query);
        // Declare a variable and store the number of exist of the SQL result
        $row_count = mysqli_num_rows($item_result);
        // Close engineiva database connection
        mysqli_close($con);
    ?>

    <!-- Start of main content -->
    <div class="content-container">
        <h2>View Customer Record</h2>
        <!-- Start of search form -->
        <div class="seach-contain">
            Customer(s) found: <?php echo $row_count;?>
            <form action="ad-view-customer.php" method="POST">
                <input type="text" placeholder="Search..." name="search_key" id="search-field" >
                <div class="searchbtn">
                    <button type="submit" name="searchBtn" value="filter" class="searchbtn">
                        <img src="imgAdmin/search.png" alt="Submit" width="20px" height=auto>
                    </button>
                </div>
            </form>
        </div>
        <!-- End of search form -->

        <!-- Start of car table -->
        <table class="car-table">
            <tr class="table-title">
                <th>Cust ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Phone Number</th>
                <th>Identity Card</th>
                <th></th>
            </tr>
            
            <?php 
                // Fetch car record and echo one by one
                while($cust = mysqli_fetch_array($item_result)){
                    echo "<tr>";
                    echo "<td>".$cust['custID']."</td>";
                    echo "<td>".$cust['firstName']."</td>";
                    echo "<td>".$cust['lastName']."</td>";
                    echo "<td>".$cust['email']."</td>";
                    echo "<td>".$cust['gender']."</td>";
                    echo "<td>".$cust['DOB']."</td>";
                    echo "<td>".$cust['phoneNum']."</td>";
                    echo "<td>".$cust['identityCard']."</td>";
                    echo '<td>
                            <button class="editbtn"><a href="ad-cust-edit.php?custID='.$cust['custID'].'"><img src="imgAdmin/edit.png"></a></button>
                            <button class="deletebtn" name="delete-img" onclick="deleteCust('.$cust['custID'].')"><img src="imgAdmin/bin.png"></a></button>
                          </td>';
                    echo "</tr>";
                }
            ?>
        </table>
         <!-- End of car table -->
    </div>
    <!-- End of main content -->
    <script> 
        function deleteCust(carID){
            if (confirm("Are you sure want to permenently the customer record?\n *All other record that consist this custID will be deleted")){
                window.location.href="cust-remove.php?custID="+carID;
            }
        }
    </script> 
</body>
</html>