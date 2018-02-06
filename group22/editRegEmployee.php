<?php
	session_start();
	require_once("connect.php");

	if(!isset($_SESSION['userID']))
	{
		echo "Please Login!";
		exit();
	}

	//*** Update Last Stay in Login System
	$sql = "UPDATE users SET LastUpdate = NOW() WHERE userID = '".$_SESSION["userID"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM users WHERE userID = '".$_SESSION['userID']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/jquery.bxslider.css">
<link rel="stylesheet" href="css/style1.css">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>

<body id="top">
  <header role="banner">


    <nav class="main-nav">
      <ul>
        <!-- inser more links here -->

        <?php echo $objResult["email"];?>
        <li><a class="cd-signup" href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

<div class="wrapper row1">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="index.php">SUT</a></h1>
      <p>Attractions in Thailand</p>
    </div>

    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a class="drop" href="#">ค้นหาสถานที่</a>
          <ul>
            <li><a href="pages/view.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
            <li><a href="pages/view1.php">ค้นหาร้านอาหาร</a></li>
            <li><a href="pages/view2.php">ค้นหาร้านขายของที่ระลึก</a></li>
            <li><a href="pages/view3.php">ค้นหาสถานที่พักผ่อน</a></li>
          </ul>
        </li>
        <li><a href="pages/gallery.php">Gallery</a></li>
        <li><a href="pages/aboutAs.php">About Me</a></li>
				<li><a href="editRegister.php">Profile</a></li>
      </ul>
    </nav>

  </header>
</div>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">

			<form name="form1" class="login100-form validate-form" enctype="multipart/form-data" method="post" action="save.php">
				<span class="login100-form-title">
					MY PROFILE
				</span>
					<input type="hidden" name="iduser" value="<?php echo $objResult["userID"];?>">

				<div class="wrap-input100 validate-input">
					<input type="hidden" value="1000000" name="MAX_FILE_SIZE">
					<input type="file" name="uploadedfile" id="uploadedfile">
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="textUsername" id="textUsername" placeholder="Username" value="<?php echo $objResult["username"];?>">
					<span class="focus-input100"></span>
				</div>

				<div>
					<input class="input100" type="text" name="textFirstName" id="textFirstName" placeholder="FirstName" value="<?php echo $objResult["fname"];?>">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="textLastName" id="textLastName" placeholder="LastName" value="<?php echo $objResult["lname"];?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="txtUsername" id="txtUsername" placeholder="Email" value="<?php echo $objResult["email"];?>">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="txtPassword" id="txtPassword" placeholder="Password" value="<?php echo $objResult["password"];?>">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" name="Submit" value="Update Profile">
				</div>
			</form>
			<div class="login100-pic js-tilt" data-tilt>
			<img src="<?php echo $objResult["image"];?>">
		</div>
		</div>
	</div>
</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



	<div class="wrapper row4 bgded overlay">
	  <footer id="footer" class="hoc clear">

	    <div class="one_quarter">
	      <h6 class="title">ที่อยู่:</h6>
	      <ul class="nospace linklist contact">
	        <li><i class="fa fa-map-marker"></i>
	          <address>
	          111, ถนน มหาวิทยาลัย ตำบล สุรนารี อำเภอเมืองนครราชสีมา นครราชสีมา 30000
	          </address>
	        </li>
	        <li><i class="fa fa-phone"></i> +(089) 716 8790<br>
	          +(061) 928 3739</li>
	        <li><i class="fa fa-fax"></i> +(000) 000 0000</li>
	        <li><i class="fa fa-envelope-o"></i> group@hotmail.com</li>
	      </ul>
	    </div>
	    <div class="one_quarter">
	      <h6 class="title">Facebook</h6>
	      <ul class="nospace linklist">
	        <li><a href="https://www.facebook.com/papatson.singsom">Nong Singsom</a></li>
	        <li><a href="https://www.facebook.com/numan7031">Nu'man Arsengbaramae</a></li>
	        <li><a href="https://www.facebook.com/nmo.wongtripipat">Chanut Wongtripipat</a></li>
	        <li><a href="https://www.facebook.com/wasuddd">Wachirakan Sueabua</a></li>
	        <li><a href="https://www.facebook.com/bb.chananin">Chananin Be</a></li>
	      </ul>
	    </div>

	  </footer>
	</div>

	<div class="wrapper row5">
	  <div id="copyright" class="hoc clear">

	    <p class="fl_left"> 204334-SCRIPTING LANGUAGE PROGRAMMING/ 2-2560</p>
	    <p class="fl_right">By Group22</a></p>

	  </div>
	</div>

	<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
	<!-- JAVASCRIPTS -->
	<script src="layout/scripts/jquery.min.js"></script>
	<script src="layout/scripts/jquery.backtotop.js"></script>
	<script src="layout/scripts/jquery.mobilemenu.js"></script>

	<script src="layout/scripts/jquery.placeholder.min.js"></script>
	<script src="js/jquery-2.1.1.min.js"></script>
	  <!-- Include all compiled plugins (below), or include individual files as needed -->
	  <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
	  <script  src="js/index.js"></script>
	</body>
	</html>
	<?
		mysqli_close($con);
	?>
