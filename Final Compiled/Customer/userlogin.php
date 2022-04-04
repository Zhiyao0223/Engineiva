<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel='stylesheet' href='userLogin.css'>
</head>
<body>
    <?php 
        session_start();
        include('conn.php');
        include('header_cust.php');
        

        if($_SERVER['REQUEST_METHOD']=="POST"){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $sql = "SELECT custID FROM customer WHERE email = '$email' AND password ='$password'";

            if($result = mysqli_query($con,$sql)){
                // Return the number of rows in result set
                $rowcount=mysqli_num_rows($result);
            }
                $row = mysqli_fetch_array($result);

                if($rowcount==1){
                    // session1_start();
                    $_SESSION['mysession'] = $email;
                    $_SESSION['custID'] = intval($row['custID']);
                    header('Location: accountpage.php');
                }
                else{
                    echo '<script>alert("Your Email Address or Password is invalid. Please re login!!");
		            window.location.href= "userlogin.php";
		            </script>';
                }
            mysqli_close($con);
        }
    ?>

    <!-- <div class="button1">
        <button type="submit" class="back"><b>Back</b></button>
    </div> -->
    <div class='main-container'>
        <div class='container'>
            <h1>User Login</h1>
            <form action="" method="POST">
                <div class="form-element">
                    <div class="header-title">
                        <div><span class="remark">*Required</span></div>
                    </div>
                    <div class="box">
                        <div class="label">
                            Email Address <span class="remark">*</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="box">
                        <div class="label">
                            Password <span class="remark">*</span>
                        </div>
                        <div class="input-box">
                            <div class="password-field">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required> 
                            </div>
                        </div>
                    </div>
                    <div class="bottom-button">
                        <div class="button">
                            <button type="submit" class="btn">Log In</button>
                        </div>
                        <div class="text">
                            Have not registered? Please register<a href="SignUp.php"> here</a>
                        </div>
                        <div class="text">
                            <a href="Homepage.php">Back to Main Page</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php 
    include("footer.php");
?>
</body>
</html>