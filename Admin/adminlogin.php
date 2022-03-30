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
            }

            .form-element{
                width: 50%;
                margin-left: auto;
                margin-right: auto;
            }

            .input-box input{
                outline: none;
                border: 1px solid #F2F2F2;
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
                width: 500px;
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
            * {box-sizing: border-box;}

        body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        }

        .container{
                width: 80%;
                margin: 0 auto;
            }

            .back{
                background-color: #1a252f;
                border-radius: 10px;
                border: none;
                color: white;
                padding: 12px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                width: 10%;
                margin-bottom: 50px;
                top: 50px;
                position: absolute;
                left: 80px;
            }
    </style>
</head>

<body>
<?php 
    include('conn.php');

       
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $sql = "SELECT adminID FROM admin WHERE username = '$username' AND password ='$password'";

            if($result = mysqli_query($con,$sql)){
                // Return the number of rows in result set
                $rowcount=mysqli_num_rows($result);
            }
                $row = mysqli_fetch_array($result);

                if($rowcount==1){
                    session_start();
                    $_SESSION['mysession'] = $username;
                    $_SESSION['user_id'] = intval($row['adminID']);
                    header('Location: ad-modify-remove.php');
                }
                else{
                    $error = printf("Your Login Name or Password is invalid. Please re login<br><br>");
                }
            mysqli_close($con);
        }
?>

   <?php 
        include 'admin-header.php';
    ?>


<div class="button1">
    <button type="submit" class="back"><b>Back</b></button>
</div>
<h1>Admin Login</h1>
    <form action="" method="POST">
        <div class="form-element">
            <div class="header-title">
                <div><span class="remark">*Required</span></div>
            </div>
            <div class="box">
                <div class="label">
                    Username <span class="remark">*</span>
                </div>
                <div class="input-box">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
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
                    Not an admin? Back to home page. Click<a href="home.php"> here</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>