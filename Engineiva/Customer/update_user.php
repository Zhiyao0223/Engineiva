<?php
    include('conn.php');
    if(!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
        $sql = "UPDATE customer SET
        firstName = '$_POST[FirstName]',
        lastName = '$_POST[LastName]',
        email = '$_POST[email]',
        password = '$_POST[password]',
        gender = '$_POST[gender]',
        DOB = '$_POST[DOB]',
        phoneNum = '$_POST[phoneNum]',
        identityCard = '$_POST[identityCard]'
       

        WHERE custID = " .$_POST['id'] ."";
    }
    else {
        $image = $_FILES['img']['tmp_name'];
        $file = file_get_contents(addslashes($image));
        $sql = "UPDATE customer SET
                firstName = '" .$_POST['FirstName'] ."',
                lastName = '" .$_POST['LastName'] ."',
                email = '" .$_POST['email'] ."',
                password = '".$_POST['password']."',
                gender = '".$_POST['gender']."',
                DOB = '".$_POST['DOB']."',
                phoneNum = '" .$_POST['phoneNum']."',
                identityCard = '".$_POST['identityCard']."',
                image = '$file'
                WHERE custID = " .$_POST['id'];  
    }
    
    // echo "<script>alert('" .$file ."')</script>";

    if(mysqli_query($con, $sql)){

        echo "<script>alert('Update Success');
                    window.location.href='accountpage.php';
                        </script>";
                        
        
        // header('Location: accountpage.php');
    }
    else {
        echo "<script>alert('Error: ".mysqli_error($con) ."');
        window.location.href='accountpage.php';
            </script>";

    }
    mysqli_close($con);
?>
