<?php
    session_start();
    if(!isset($_SESSION["mysession"])){
        header("location: adminlogin.php");
    }
?> 