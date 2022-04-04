<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
           h1{
                text-align: center;
                margin-top: 75px;
           }

           #registration{
                margin-left: auto;
                margin-right: auto;
            }

            .registration,
            .form-element,
            .box,
            .bottom-button{
                display: flex;
                flex-direction: column;
            }

            .registration,
            .form-element{
                gap: 15px;
            }

            .box{
                gap: 8px;
                background-color: white;
            }

            .form-element{
                width: 50%;
                margin-left: auto;
                margin-right: auto;
            }

            .input-box input{
                outline: black;
                border: 4px solid black;
                border-radius: 8px;
                padding: 10px;
                width: 100%;
            }

            .radio-btn{
                display: flex;
                gap: 20px;
                align-items: center;
            }

            .radio-btn label{
                display: flex;
                gap: 8px;
                align-items: center;
                padding-top: 10px;
            }

            .radio-btn input{
                width: 15px;
                height: 15px;
            }

            .radio-btn input[type="checkbox"]{
                padding: 15px;
            }

            .header-title{
                text-align: center;
            }

            .bottom-button{
                margin-top: 25px;
                align-items: center;
            }

            .button button{
                width: 450px;
                text-align: center;
                background-color: green;
                color: #FFF;
            }

            .remark{
                color: rgb(220, 53, 69);
            }

            .error{
                border-color: #dc3545 !important;
                padding-right: calc(1.5em + .75rem) !important;
                background-image: url('exclamation-octagon.svg');
                background-repeat: no-repeat;
                background-position: right calc(.375em + .1875rem) center;
                background-size: calc(.75em + .375rem) calc(.75em + .375rem);
            }

            .error:focus{
                box-shadow: 0px 0px 8px 0px #dc3545;
            }

            .warning-password{
                font-size: 0.875rem;
                color: rgb(220, 53, 69);
                display: none;
            }

            .password-field{
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            
        </style>
</head>
<body>
    
    <?php 
    
        include('conn.php');
        
        session_start();

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
		            window.location.href= "SignUp.php";
		            </script>';
                }
            mysqli_close($con);
        }
    ?>



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
</body>
</html>
<?php

?>