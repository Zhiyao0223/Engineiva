<?php 

session_start();

if(isset($_SESSION['mysession'])) {
    include("header_login.php");
} 
else {
    include("header_cust.php");
}
?>