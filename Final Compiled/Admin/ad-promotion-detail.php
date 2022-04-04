<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-modify-remove.css">
</head>
<body>
    <?php 
        include "ad-session.php";
        include 'admin-header.php';
        $promo = "";
        $offer = "";
    ?>

    <div class="submenu">
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php">Add New Car</a></li> 
            <li><a href="ad-modify-remove.php">Modify and Remove</a></li>
            <li><a href="ad-view-customer.php">View Customer Record </a></li>
            <li><a href="ad_view_appointment.php">View Appointment</a></li>
            <li><a href="ad-promotion-detail.php" class="active">Promotion Detail </a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
        </ul>
    </div>
        <!-- Start of main content -->
    <div class="content-container">
        <h2>Promotion Details</h2>
        
        <!-- Start of car table -->
        <table class="car-table">
            <tr class="table-title">
                <th>Promocode</th>
                <th>Offer</th>
                <th></th>
            </tr>
            
            <?php 
                include('conn.php');
                $resultPromo = mysqli_query($con,"SELECT * FROM promocode");
                // Fetch promotion detail and echo one by one
                while($row = mysqli_fetch_array($resultPromo)){
 
                    $data =  "<tr>
                                <td>" .$row['promocode'] ."</td>
                                <td>" .$row['offer'] ."</td>
                                 <td>
                                    <button class='editbtn'>
                                        <a href='ad-promo-edit.php?promocode=" .$row['promocode']."'>
                                            <img src='imgAdmin/edit.png'>
                                        </a>
                                    </button>
                                    <button class='deletebtn' name='delete-img' onclick=\"deletePromo('" .$row['promocode'] ."')\">
                                        <img src='imgAdmin/bin.png'>
                                    </button>
                                </td>;
                            </tr>";
                    echo $data;
                }
            ?>
        </table>
         <!-- End of car table -->
    </div>
    <!-- End of main content -->
    <script> 
        function deletePromo(promo){
            if (confirm("Are you sure want to permenently delete the promotion?\n *All other record that consist this carID will be deleted")){
                window.location.href="promo-remove.php?promocode="+promocode;
            }
        }
    </script> 
    
</body>
</html>