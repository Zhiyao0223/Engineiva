<?php
include("session.php");
?>

<?php
 if (isset($_POST['submitBtn'])) {
	include("conn.php");
	$file = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));

	$insert="INSERT INTO customer (cust_firstName, cust_lastName, cust_email, cust_password, 
	cust_gender, cust_DOB, cust_phoneNum,cust_identityCard,cust_image)
	VALUES ('$_POST[FirstName]','$_POST[LastName]','$_POST[email]','$_POST[password]', '$_POST[gender]',
	'$_POST[DOB]','$_POST[phoneNum]','$_POST[identityCard]','$file')";

	if (!mysqli_query($con,$insert)){
		die('Error: ' . mysqli_error($con));
	}
	else {
		echo '<script>alert("Successfully signed up!!");
		window.location.href= "SignUp.php";
		</script>';
	}

	mysqli_close($con);
 }
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}


.container p{
        line-height: 200px; /* Create scrollbar to test positioning */
    }

body {
font-family: 'Open Sans', sans-serif;
padding-top: 50px; /*50px for the height of the navbar + 37px for the offset*/
padding-bottom: 50px; /*50px for the height of the bottom navbar*/
}

.section {
margin-bottom: 15px;
width:100%;
float:left;
}
#left{
    float:left;
    width: 50%;
	padding-right:10px;
    }
#right{
    float:left;
    width: 50%;
	padding-left:10px;
}

.label {
float: left;
margin-right: 10px;
}

.field {
float: left;
width:100%;
}

* {
box-sizing: border-box;
}

.container {
padding: 16px;
background-color: white;
width:800px;
margin:0 auto;
overflow:auto;
}


#partitioned, input[type=password], input[type=email], input[type=tel], textarea, select {
width: 100%;
padding: 14px;
margin: 5px 0 22px 0;
display: inline-block;
font-size:15pt;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=tel]:focus, textarea:focus{
background-color: #ddd;
outline: none;
}

input[type='radio'] { 
transform: scale(2); 
}

/* Overwrite default styles of hr */
hr {
border: 1px solid #f1f1f1;
margin-bottom: 25px;
}

/* Set a style for the submit button */
.btn {
background-color: #555555;
color: white;
padding: 16px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 49%;
opacity: 0.9;
display: inline;
}

.btn:hover {
opacity: 1;
}

.button {
    background-color: #e7e7e7;
    color: black;
    border: 2px solid #e7e7e7;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius:7px;
}

.button:hover {
    background-color: white;
}


</style>
</head>
<body>

<form action="SignUp.php" method="post" ENCTYPE="multipart/form-data">
  
<div class="container">
<h1>Sign Up</h1>
		<div id="left">
			<div class="label">
				First Name
			</div>
			<div class="field">
				<input id="partitioned" type="text" name="FirstName" required>
			</div>
		</div>
		
		<div id="right">
			<div class="label">
				Last Name
			</div>
			<div class="field">
				<input id="partitioned" type="text" name="LastName" required>
			</div>
		</div>
	<div class="section">
		<div class="label">
			Email Address
		</div>
		<div class="field">
			<input id="partitioned" type="email" name="email"required>
		</div>
	</div>
    <div class="section">
		<div class="label">
			Password
		</div>
		<div class="field">
			<input id="partitioned" type="password" name="password" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Gender
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="gender" value="Male" required="required"> &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="gender" value="Female" required="required"> &nbsp;&nbsp;Female 
		</div>
	</div>
	&nbsp;
	<div class="section">
		<div class="label">
			Date of Birth
		</div>
		<div class="field">
			<input id="partitioned" type="date" name="DOB"required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Phone Number
		</div>
		<div class="field">
			<input id="partitioned" type="number" name="phoneNum" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Identity Card Number
		</div>
		<div class="field">
			<input id="partitioned" type="text" name="identityCard" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Image
		</div>
		<div class="field">
			<input id="partitioned" type="file" name="img" value="" required/>
		</div>
	</div>
	<div class="section">
		<div class="label">
			&nbsp;
		</div>
		<div class="field">
			<button type= "submit" class="btn" name="submitBtn">Submit</button>
			<button type= "reset" class="btn">Reset</button>
		</div>
	</div>
</div>
</div>