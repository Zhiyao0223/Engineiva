<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css.css?v=<?php echo time(); ?>">
</head>
<body>


<?php
session_start();
if(isset($_SESSION['mysession'])) {
  $id = $_SESSION['custID'];
  include("header_login.php");
  } else {
    echo '<script>alert("Please Log In to Continue");
    window.location.href= "homepage.php";
    </script>';
  }
?>


<?php
include("conn.php");
$result = mysqli_query($con, "SELECT* FROM buy_appointment INNER JOIN car WHERE buy_appointment.carID = car.carID AND buy_appointment.custID = $id ORDER BY buyID ")
?>


<div class = "section">
    <button class = "back"><a href="accountpage.php"> Back </a></button>
    <h1 style = "margin-bottom: 50px;"> Appointment List </h1>
    <h3 style = "margin-bottom: 3px;"> Buy Appointment </h3>
    <table id = "table">
        <tr>
            <th> Brand </th>
            <th> Model </th>
            <th> Year </th>
            <th> Variant </th>
            <th> Mileage </th>
            <th> Date </th>
            <th> Time </th>
        </tr>
    <?php
        while($row = mysqli_fetch_array($result)){
            echo "<tr>"; 
            echo "<td>";
            echo $row['brand'];
            echo "</td>";
            echo "<td>";
            echo $row['model'];
            echo "</td>";
            echo "<td>";
            echo $row['year'];
            echo "</td>";
            echo "<td>";
            echo $row['variant'];
            echo "</td>";
            echo "<td>";
            echo $row['mileage'];
            echo "</td>";
            echo "<td>";
            echo $row['date'];
            echo "</td>"; 
            echo "<td>";
            echo $row['time'];
        }
    ?>
    </table>
    <?php
    $result1 = mysqli_query($con, "SELECT* FROM sell_appointment WHERE sell_appointment.custID = $id ORDER BY sellID")
    ?>
    <h3 style = "margin-bottom: 3px;"> Sell Appointment </h3>
    <table id = "table" style = "margin-bottom: 200px">
        <tr>
            <th> Brand </th>
            <th> Model </th>
            <th> Year </th>
            <th> Variant </th>
            <th> Mileage </th>
            <th> Date </th>
            <th> Time </th>
        </tr>
    <?php
        while($row = mysqli_fetch_array($result1)){
            echo "<tr>"; 
            echo "<td>";
            echo $row['brand'];
            echo "</td>";
            echo "<td>";
            echo $row['model'];
            echo "</td>"; 
            echo "<td>";
            echo $row['year'];
            echo "</td>"; 
            echo "<td>";
            echo $row['variant'];
            echo "</td>";
            echo "<td>";
            echo $row['mileage'];
            echo "</td>"; 
            echo "<td>";
            echo $row['date'];
            echo "</td>"; 
            echo "<td>";
            echo $row['time'];
        }
    ?>
    </table>
</div>

<?php
include("footer.php");
?>

</body>
</html>

