<?php
    include("conn.php");
    session_start();
    if (isset($_SESSION['mysession'])) {
        $id = $_SESSION['custID'];
    }
    else {
        echo    "<script>alert('Please login to proceed~')
                    window.location.href='userlogin.php';    
                </script>";
        return;
    }

    if (isset($_GET['carID'])) {
        $carID = $_GET['carID'];
    }
    else {
        echo "<script>alert('Invalid Car ID')</script>";
        return;
    }
    // echo $id ." " .$carID;
    $sqlFav = "INSERT INTO favourite VALUES('$id', '$carID')";
    if (mysqli_query($con, $sqlFav)) {
        echo "<script>alert('Car is added to favourite!')</script>";
    }
    else {
        echo "<script>alert('Error in inserting into database')</script>";
    }
    echo "<script>window.location.href='carProduct.php?carID=$carID'</script>";

?>