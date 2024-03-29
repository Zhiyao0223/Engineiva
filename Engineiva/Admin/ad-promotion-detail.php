<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-modify-remove.css">
</head>
<style>
button {
  background-color: #83d5de;
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
</style>
<script> 
        function deletePromo(id){
            if (confirm("Are you sure want to permenently delete the promocode")){
                window.location.href="promo-remove.php?id="+id;
            }
        }
</script> 
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
            <li><a href="ad_order_history.php">Order History</a></li>
            <li><a href='AdminReport.php'>Report Generation</a></li>
        </ul>
    </div>

    <div class="content-container">
        <h2>Promotion Details</h2>
        <button><a href="ad-add-promo">Add New Promotion</a></button>
        <table class="car-table">
            
            <tr class="table-title">
                <th>ID</th>
                <th>Promocode</th>
                <th>Offer (RM)</th>
                <th></th>
            </tr>
            
            <?php 
                include('conn.php');
                $resultPromo = mysqli_query($con,"SELECT * FROM promocode");
                // Fetch promotion detail and echo one by one
                while($row = mysqli_fetch_array($resultPromo)){

                    $data =  "<tr>
                                <td>" .$row['id'] ."</td>
                                <td>" .$row['promocode'] ."</td>
                                <td>" .$row['offer'] ."</td>
                                 <td>
                                    <button class='editbtn'>
                                        <a href='ad-promo-edit.php?id=" .$row['id']."'>
                                            <img src='imgAdmin/edit.png'>
                                        </a>
                                    </button>
                                    <button class='deletebtn' name='delete-promo' onclick=\"deletePromo('".$row['id']."')\"><img src='imgAdmin/bin.png'></a></button>
                                </td>
                            </tr>";
                    echo $data;
                }
            ?>
        </table>
         <!-- End of car table -->
    </div>
    <!-- End of main content -->
    
</body>
</html>