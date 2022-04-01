<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ad-add-new-car.css">
</head>
<body>
    <?php 
        include "admin-header.php";
    ?>

    <div class="submenu">
        <ul class="menu-content">
            <li><a href="ad-add-new-car.php" class="active">Add New Car</a></li> 
            <li><a href="modify-remove.php" >Modify and Remove</a></li>
            <li><a href="view-appointment.php">View Appointment</a></li>
            <li><a href="support-ticket.php">Support Ticket</a></li>
        </ul>
    </div>

    <div class="content-container">
        <h2>Add New Car</h2>
        <div class="add-car-form">
            <div class="form-header">
                 ADD NEW CAR
            </div>
            <div class="form-content">
                <form action="" method="POST">
                    <div class="attribute ">
                        <div class="field">
                            Brand: <select name="brand" required>
                                        <option value="" selected disabled>Select Car brand</option>
                                        <option value="BMW">BMW</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Mazda">Mazda</option>
                                        <option value="Mercedes">Mercedes</option>
                                        <option value="Mini">Mini</option>
                                        <option value="Nissan">Nissan</option>
                                        <option value="Perodua">Perodua</option>
                                        <option value="Proton">Proton</option>
                                        <option value="Subaru">Subaru</option>
                                        <option value="Toyota">Toyota</option>
                                        <option value="Volkswagen">Volkswagen</option>
                                    </select>
                        </div>
                    </div>
                    <div class="attribute ">
                        <div class="field">
                            Model: <input type="text" name="model" placeholder="Enter Car Model" required>
                        </div>
                    </div>
                    <div class="attribute ">
                        <div class="field">
                            Year: <select name="year" required>
                                        <option value="" selected disabled>Select Car Year</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994"><= 1994</option>
                                    </select>
                        </div>
                    </div>
                    <div class="attribute ">
                        <div class="field">
                            Variant: <input type="text" name="variant" placeholder="Enter Car Variant" required>
                        </div>
                    </div>
                
                
                    <div class="attribute ">
                        <div class="field">
                            Engine: <input type="text" name="engine" placeholder="Enter Car Engine" required>
                        </div>
                    </div>
                    
                    <div class="attribute ">
                        <div class="field">
                            Transmission: <select name="transmission" required>
                                            <option value="" selected disabled>Select Transmission</option>
                                            <option value="Automatic">Automatic</option>
                                            <option value="Manual">Manual</option>
                                        </select>
                        </div>
                    </div>


                    <div class="attribute ">
                        <div class="field">
                            Mileage (KM): <input type="number" min=0 placeholder="Enter Car Milleage" name="mileage" required>
                        </div>
                    </div>
                    <div class="attribute ">
                        <div class="field">
                            Price (RM): <input type="number" min=1 placeholder="Enter Car Price" name="price" step="0.01" required>
                        </div>
                    </div>
                    <div class="attribute ">
                        <div class="field">
                            Status: <select name="status" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Available">Available</option>
                                        <option value="NotAvailable">Not Available</option>
                                    </select>
                        </div>
                    </div>
                    
                    <div class="text-attribute">
                        <div class="text-title">Remark: </div>
                        
                        <div class="text-field">    
                            <textarea name="remark" rows="5" cols="35" style="font-family:Times New Roman;white-space:pre-wrap;" required></textarea>
                        </div>
                    </div>
                    <!---
                    <div class="attribute ">
                        <div class="image-field">
                            Images: <button class="image-btn"> Add car images</button>
                        </div>
                    </div>
                    --->
                    <div class="twobutton ">
                        <input type="submit" class="abutton submit" name="updateBtn" value="Next"> 
                        <input class="abutton cancel" type="button" value="Cancel" onclick="history.back()">
                    </div>
                </form>
            </div>
            <?php 
                // Update data in database      
                if(isset($_POST["updateBtn"])){ 
                    include("db.php");
                
                    $sql="INSERT INTO car (brand, model, year, variant, engine, transmission, mileage, price, sellStatus, remark)
                    
                    VALUE
                    ('$_POST[brand]','$_POST[model]','$_POST[year]','$_POST[variant]','$_POST[engine]','$_POST[transmission]','$_POST[mileage]','$_POST[price]','$_POST[status]','$_POST[remark]')";

                    if (!mysqli_query($con,$sql)) {
                        echo '<script>alert("Insert Error!");</script>;';
                    }
                    // Direct back to checkout page
                    else {
                        $last_id = mysqli_insert_id($con);
                        echo '<script>alert("Insert Success!");
                        window.location.href= "ad-buy-record.php?carID='.$last_id.'";
                        </script>';
                    }

                }
            ?>
        </div>
    </div>

</body>