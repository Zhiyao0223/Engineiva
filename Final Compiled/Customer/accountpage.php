<!DOCTYPE html>
<head>
<style>

.section {
margin-bottom: 15px;
width:100%;
float:left;
}

.label {
float: left;
margin-right: 1px;
}

.field {
float: left;
width:100%;
}

* {
box-sizing: border-box;
}

.container {
	padding: 20px;
	background-color: white;
	width:300px;
	margin:0 auto;
	overflow:auto;
  position: relative;
}

button1 {
  background-color: green;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

#signtext {
  display: inline;
  display: table-cell;
  vertical-align: middle;
  margin-bottom: 10px;
  color: black;
}

/*Centers "button" in the middle of the page*/
.fcc-btn {
  background-color: #199319;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
}

.fcc-btn:hover {
  background-color: #223094;
}

.image {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border: 10px solid #ccc;
  border-radius: 50%;
}
.container1{
	background-color: white;
	width: 40%;
	margin:18px auto;
	overflow:auto;
  outline-color: black;
  border-radius:10px;
  border:3px solid black;
}
.inputs{
  text-align:center;
}
#center{
  text-align:center;
  margin-bottom:3%;
}
.center {
  display: flex;
  margin-left:45%;
  width:55%;
  top:10%;
  overflow-y:clip;
}

label{
    width:200px;
    white-space: nowrap;
    display: inline-block;
		text-align:left;
}
span {
	padding-left:10px;
  padding-right: 10px;
}

body {
  font-family: 'Open Sans', sans-serif;
  padding-top: 50px; /*50px for the height of the navbar + 37px for the offset*/
  padding-bottom: 50px; /*50px for the height of the bottom navbar*/
    margin: 0;
    height: 100vh;
    font-weight: 100;
    background: radial-gradient(#c3dee1,#5eb0ea,#67def6);
    -webkit-overflow-Y: hidden;
    -moz-overflow-Y: hidden;
    -o-overflow-Y: hidden;
    overflow-y: hidden;
    -webkit-animation: fadeIn 1 1s ease-out;
    -moz-animation: fadeIn 1 1s ease-out;
    -o-animation: fadeIn 1 1s ease-out;
    animation: fadeIn 1 1s ease-out;
}

}
</style>
</head>

<body>
<?php 
include('conn.php');
include('session.php');
    $id = $_SESSION['custID'];

    $result=mysqli_query($con,"SELECT * FROM customer WHERE custID = '$id'");
   
while($row=mysqli_fetch_array($result)){
  ?>

<br>
  <h1><center>My Profile</center></h1>
    <div class="field">
      <br>
      <center>
      <button1>
        <div class="signtext">
          <?php echo "<a href=\"edituser.php?id=";
          echo $row['custID'];
          echo "\">Edit</a>";?></a>
        </div>
      </button1>
      <button1>
        <div class="signtext">
        <a href="purchase_history.php">Purchase History</a>
        </div>
      </button1>
      </center>
    </div>
<br>
<div class="center">
<input type="hidden" name="id" value=<?php echo $row['custID']?>>
<?php echo '<img style="width=10px" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"class="image">'?>
</div>

<div class="container1">
<div id="center">
  <br>
  <h3>Basic Data</h3>
      <div class="inputs">
        <label>&#128073; First Name </label>
        <span>:</span>
        <input type="text" value="<?php echo $row['firstName']; ?>"readonly/>
      </div>
      &nbsp
      <div class="inputs">
        <label>&#128073; Last Name </label>
        <span>:</span>
        <input type="text" value="<?php echo $row['lastName']; ?>"readonly/>
      </div>
      &nbsp
      <div class="inputs">
        <label>&#128231; Email Address </label>
        <span>:</span>
        <input type="text" value="<?php echo $row['email']; ?>"readonly/>
      </div>
      &nbsp
      <div class="inputs">
        <label>&#127886; Gender </label>
        <span>:</span>
        <input type="text" value="<?php echo $row['gender']; ?>"readonly/>
      </div>
      &nbsp
      <div class="inputs">
        <label>&#128197; Date of Birth </label>
        <span>:</span>
        <input type="text" value="<?php echo $row['DOB']; ?>"readonly/>
      </div>
      &nbsp
      <div class="inputs">
        <label>&#128222; Phone Number </label>
        <span>:</span>
        <input type="text" value="<?php echo $row['phoneNum']; ?>"readonly/>
      </div>
      &nbsp
      <div class="inputs">
        <label>📇 IC Number </label>
        <span>:</span>
        <input type="text" value="<?php echo $row['identityCard']; ?>"readonly/>
      </div>
  </div>
</div>
</div>
<?php
}
?>
</body>