<?php
    include("conn.php");
    include("session.php");
    if (isset($_SESSION['mysession'])) {
        $userID = $_SESSION['custID'];

        if (isset($_GET['carID'])) {
            $carID = $_GET['carID'];

            $sql = "DELETE FROM favourite WHERE custID='$userID' && carID='$carID'";
            if (mysqli_query($con,$sql)) {
                echo "<script>alert('Delete success!')
                            window.location.href='favourite.php';
                    </script>";
            }
            else {
                echo "<script>alert('New bugss boi')
                            window.location.href='favourite.php';
                    </script>";
            }
        }
    }
?>