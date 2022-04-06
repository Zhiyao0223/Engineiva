<?php 
    include('session.php');
?>

<?php
    include('conn.php');
    
    if ($_POST['img'] == ""){
        $sql = "UPDATE customer SET
    firstName = '$_POST[FirstName]',
    lastName = '$_POST[LastName]',
    email = '$_POST[email]',
    password = '$_POST[password]',
    gender = '$_POST[gender]',
    DOB = '$_POST[DOB]',
    phoneNum = '$_POST[phoneNum]',
    identityCard = '$_POST[identityCard]'

    WHERE custID = $_POST[id];";

    } else{$file = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
    $sql = "UPDATE customer SET
    firstName = '$_POST[FirstName]',
    lastName = '$_POST[LastName]',
    email = '$_POST[email]',
    password = '$_POST[password]',
    gender = '$_POST[gender]',
    DOB = '$_POST[DOB]',
    phoneNum = '$_POST[phoneNum]',
    identityCard = '$_POST[identityCard]',
    image = '$file'

    WHERE custID = $_POST[id];";
    }
    
    if(mysqli_query($con, $sql)){
        mysqli_close($con);
        header('Location: accountpage.php');
    }
?>