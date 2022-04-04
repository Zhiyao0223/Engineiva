<?php
    include("conn.php");

    if (isset($_SESSION['user_id'])) {
        echo "<script>alert('Please login to proceed)')
                    window.location.href='adminlogin.php';
            </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Support Ticket Page</title>

    <link rel="stylesheet" href="styleSupportAdmin.css">
    <link rel="stylesheet" href="admin-header.css">

    <script src="scriptSupportAdmin.js"></script>
</head>
<body>
    <!-- Header  -->
    <!-- <div class="header">
        <div class="inner_header">
            <div class="logo">
                <a href ="admin.php" class="logoStyle"><li>Engineiva (Admin)</li></a> 
            </div>
            <div class="logout">
                <a href ="logout.php"><img src="logout.png" alt="Logout" id="logout_style"></a> 
            </div>
        </div>
    </div> -->
    <?php 
        include "ad-session.php";
        include 'admin-header.php';
    ?>

    <div class="submenu">
        <ul class="menu-content">
        <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php">Promotion Detail </a></li>
            <li><a href="support-ticket.php" class="active">Support Ticket</a></li>
            <li><a href="ad_order_history.php">Order History</a></li>
            <li><a href='AdminReport.php'>Report Generation</a></li>
        </ul>
    </div>

    <!-- Content Start Here  -->
    <div class="main-container">
        <div class="support-title">
            Support Ticket
        </div>

        <div class='table-roww'>
            <div class="filter-box">
                        <div class="filter-title">
                            Filter:
                        </div>
                        <div class="filter-option">
                            <div class="options" onclick="filter('account')">
                                Accounts
                            </div>
                            <div class="options" onclick="filter('appointment')">
                                Appointment
                            </div>
                            <div class="options" onclick="filter('order')">
                                Orders & Payments
                            </div>
                            <div class="options" onclick="filter('refund')">
                                Refund
                            </div>
                            <div class="options" onclick="filter('other')">
                                Others
                            </div>
                        </div>
                    </div>
            <table class="table-container">
                <tr>
                    <td>Username</td>
                    <td>Title</td>
                    <td>Date</td>
                    <td>Status</td>
                </tr>
                <?php
                    $sql_getRow = "SELECT * FROM support_ticket ORDER BY date DESC";
                    $result_getRow = mysqli_query($con, $sql_getRow);

                    while($array_getRow = mysqli_fetch_array($result_getRow)) {            
                        // Get username
                        $userID = $array_getRow['custID']; 
                        $sql_user = "SELECT lastName FROM customer 
                                        WHERE custID = '$userID'";
                        $result_user = mysqli_query($con, $sql_user);
                        $display_user = mysqli_fetch_array($result_user);

                        // Get basic info
                        $ticketID = $array_getRow['ticketID'];
                        $title = $array_getRow['title'];
                        $category = $array_getRow['category'];
                        $explaination = $array_getRow['explaination'];
                        $date = $array_getRow['date'];
                        $db_ticketStatus = $array_getRow['ticketStatus']; 

                        if ($db_ticketStatus == "T") {
                            $status = "<span style=\"color:green; font-weight: 450\">Pending</span>";
                            $lastColWord = "Reply";
                        }
                        else {
                            $status = "Done";
                            $lastColWord = "View";
                        }

                        $data = "<tr class='$category'>
                                    <td>
                                        $display_user[0]
                                    </td>
                                    <td>
                                        $title
                                    </td>
                                    <td>
                                        $date
                                    </td>
                                    <td id='ticket-status'>
                                        $status
                                    </td>
                                    <td>
                                        <input type='text' name='ticketID' value='$ticketID'' hidden>
                                        <a class='reply'
                                            href='SupportReply.php?ticketID=$ticketID'>$lastColWord</a>
                                    </td>
                                </tr>";

                        echo $data;
                    }
                ?>
                
            </table>
        </div>

        <div class="no-ticket">
            No ticket available.
        </div>
    </div>
</body>
</html>
<?php
    $num_row = mysqli_num_rows($result_getRow);
    if ($num_row == 0) {
            $disableTable = "<script>
                                document.getElementsByClassName('table-container')[0].style.display = 'none';
                                document.getElementsByClassName('no-ticket')[0].style.display = 'block';
                            </script>";

            echo $disableTable;
    }
?>