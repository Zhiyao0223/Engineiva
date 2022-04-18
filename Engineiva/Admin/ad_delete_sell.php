<?php 
        include('session.php');
?>


<?php

    include("conn.php");

    //$_GET[‘id’] —Get the integer value from id parameter in URL. 
    //intval() will returns the integer value of a variable
    $sellID=intval($_GET['sellID']);

    $result=mysqli_query($con,"DELETE FROM sell_appointment WHERE sellID=$sellID");

    mysqli_close($con);//close database connection

    header('Location: ad_view_appointment.php'); //redirect the page to view.phppage

?>