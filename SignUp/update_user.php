<?php 
    include('session.php');
?>

<?php 
    include('conn.php');
    $sql = "UPDATE customer SET
    cust_firstName = '$_POST[FirstName]',
    cust_lastName = '$_POST[LastName]',
    cust_email = '$_POST[email]',
    cust_password = '$_POST[password]',
    cust_gender = '$_POST[gender]',
    cust_DOB = '$_POST[DOB]',
    cust_phoneNum = '$_POST[phoneNum]',
    cust_identityCard = '$_POST[identityCard]'
    

    WHERE id = $_POST[id];";
    
    
    if(mysqli_query($con, $sql)){
        mysqli_close($con);
        header('Location: accountpage.php');
    }
?>