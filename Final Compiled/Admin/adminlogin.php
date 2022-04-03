<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style rel='stylesheet' href='adminLogin.css'></style>
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
            </div>
        </div>
    </form>
</body>
</html>