<?php  
    session_start(); //to ensure you are using same session

    session_destroy(); //destroy the session

    header("location:../Customer/homepage.php"); //to redirect back to admin login page after logging out

exit();

?>