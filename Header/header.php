<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineiva</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
<!DOCTYPE html>
<html>
<head>
<body>
    <div class="header">
        <div class="inner_header">
            
            <div class="navigation">
                <a href ="home.php" class="logoStyle"><li>Engineiva</li></a>
                <a href="home.php">
                    <li>
                        <button href="buy_car.php" class="dropdown_button" onmouseover='mouseOverToggle()' onmouseout='mouseOutToggle()' id="buy_btn">Buy</button>
                    </li>
                </a>  
                <a href="home.php"><li>Sell</li></a>    
                <a href="faq.php"><li>FAQ</li></a>
                <a href="about_us.php"><li>About Engineiva</li></a>
            </div>
            <div class="signin_up">
                <a href ="signin.php"><img src="user.png" alt="User" id="profile_style"><div id="signtext">Sign Up/Login</div></a> 
            </div>
        </div>
        <div class="dropdown_content" id="buy_content" onmouseover='mouseOverToggle()' onmouseout='mouseOutToggle()'>
            <a href="buy_car.php"><h2>View All Cars ></h2></a>
            <div class="column" id="car_column1">
                <a href="buy_car.php">BMW</a>
                <a href="buy_car.php">Honda</a>
                <a href="buy_car.php">Isuzu</a>
                <a href="buy_car.php">Mazda</a>
                <a href="buy_car.php">Mini</a>
                <a href="buy_car.php">Perodua</a>
                <a href="buy_car.php">Proton</a>
                <a href="buy_car.php">Suzuki</a>
                <a href="buy_car.php">Toyota</a>
                <a href="buy_car.php">Volkswagen</a>
            </div>
            <div class="column" id="car_column2">
                <a href="buy_car.php">Ford</a>
                <a href="buy_car.php">Hyundai</a>
                <a href="buy_car.php">Kia</a>
                <a href="buy_car.php">Mercedes</a>
                <a href="buy_car.php">Nissan</a>
                <a href="buy_car.php">Peugeot</a>
                <a href="buy_car.php">Subaru</a>
                <a href="buy_car.php">Tesla</a>
                <a href="buy_car.php">Volve</a>
            </div>
        </div>
    </div>
    
    <script>
         var dropDownContent = document.getElementById('buy_content');
        
        function mouseOverToggle() {
            dropDownContent.style.display = "block";
        }
        function mouseOutToggle() {
            dropDownContent.style.display = "none";
        }
    </script> 

</body>