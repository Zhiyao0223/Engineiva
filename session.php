<?php 

session_start();

if(isset($_SESSION['mysession'])){
    include ("fixedheaderfooter2.php");//change
    }

else include ("fixedheaderfooter.php");//change
?>