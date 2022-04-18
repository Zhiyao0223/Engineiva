<?php
include("session.php");
?>

<?php
	include("conn.php");
 if (isset($_POST['submitBtn'])) {

	$file = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));

	$insert="INSERT INTO customer (firstName, lastName, email, password, 
	gender, DOB, phoneNum, identityCard, image)
	VALUES ('$_POST[FirstName]','$_POST[LastName]','$_POST[email]','$_POST[password]', '$_POST[gender]',
	'$_POST[DOB]','$_POST[phoneNum]','$_POST[identityCard]','$file')";

	if (!mysqli_query($con,$insert)){
		die('Error: ' . mysqli_error($con));
	}
	else {
		echo '<script>alert("Successfully signed up!!");
		window.location.href= "userlogin.php";
		</script>';
	}

	mysqli_close($con);
 }
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='signUp.css'>
</head>
<body>

<form action="SignUp.php" method="post" ENCTYPE="multipart/form-data">
  
<div class='background-container'>
	<div class="container">
		<h1>Sign Up</h1><br>
		<div id="left">
			<div class="label">
				First Name
			</div>
			<div class="field">
				<input id="partitioned" type="text" name="FirstName" placeholder='Muhammad' required>
			</div>
		</div>
			
		<div id="right">
			<div class="label">
				Last Name
			</div>
			<div class="field">
				<input id="partitioned" type="text" name="LastName" placeholder='Ali' required>
			</div>
		</div>
		<div class="section">
			<div class="label">
				Email Address
			</div>
			<div class="field">
				<input id="partitioned" type="email" name="email" placeholder='sample@gmail.com' required>
			</div>
		</div>
		<div class="section">
			<div class="label">
				Password
			</div>
			<div class="field">
				<input id="partitioned" type="password" name="password" placeholder='*******' required>
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
				<input id="partitioned" type="date" name="DOB" required>
			</div>
		</div>
		<div class="section">
			<div class="label">
				Phone Number
			</div>
			<div class="field">
				<input id="partitioned" type="text" name="phoneNum" maxlength='11' placeholder='01XXXXXXXX' required>
			</div>
		</div>
		<div class="section">
			<div class="label">
				Identity Card Number
			</div>
			<div class="field">
				<input id="partitioned" type="text" name="identityCard" pattern="[0-9]{12}" maxlength='12' placeholder='XXXXXXXXXXXX'required>
			</div>
		</div>
		<div class="section">
			<div class="label">
				Image
			</div>
			<div class="field">
				<input id="partitioned" type="file" name="img" value="" / required>
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
</body>
<?php
include("footer.php");
?>