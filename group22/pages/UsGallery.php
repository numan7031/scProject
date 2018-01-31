<?php
	session_start();
	require_once("../connect.php");

	if(!isset($_SESSION['userID']))
	{
		echo "Please Login!";
		exit();
	}

	//*** Update Last Stay in Login System
	//$sql = "UPDATE users SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ";
	//$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM users WHERE userID = '".$_SESSION['userID']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css"  type="text/css" media="all">
<link rel="stylesheet" href="../css/style1.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome1.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css">

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/function.js"></script>
<title>Creating an Image Gallery From Folder using PHP</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
</head>

<style type="text/css">
*{margin:0;padding:0;}
body
{
	background:#fff;
}
img
{
	width:auto;
	box-shadow:0px 0px 20px #cecece;
	-moz-transform: scale(0.7);
	-moz-transition-duration: 0.6s;
	-webkit-transition-duration: 0.6s;
	-webkit-transform: scale(0.7);

	-ms-transform: scale(0.7);
	-ms-transition-duration: 0.6s;
}
img:hover
{
	 box-shadow: 20px 20px 20px #dcdcdc;
	-moz-transform: scale(0.8);
	-moz-transition-duration: 0.6s;
	-webkit-transition-duration: 0.6s;
	-webkit-transform: scale(0.8);

	-ms-transform: scale(0.8);
	-ms-transition-duration: 0.6s;

}

#body
{
	margin:0 auto;
	text-align:center;
}
</style>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>


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
<style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #FFCCFF;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #FFCCFF}

.button:active {
  background-color: #FFCCFF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
</head>
	<body id="top">
	  <header role="banner">


	    <nav class="main-nav">
	      <ul>
	        <!-- inser more links here -->

          <?php echo $objResult["email"];?>
          <li><a class="cd-signup" href="../logout.php">Logout</a></li>
	      </ul>
	    </nav>
	  </header>

		<div id="wrap">
			<header>
				<div class="inner relative">
					<a class="logo" href="../index.php"><img src="../img/Capture.jpg" alt="fresh design web"></a>
					<a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
					<nav id="navigation">
						<ul id="main-menu">
							<li class="current-menu-item"><a href="../index.php">Home</a></li>


							<li class="parent">
								<a href="#">ค้นหาสถานที่</a>
								<ul class="sub-menu">
                  <li><a href="../pages/UserSearch1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
      						<li><a href="#">ค้นหาร้านอาหาร</a></li>
      						<li><a href="#">ค้นหาร้านขายของที่ระลึก</a></li>
      						<li><a href="#">ค้นหาสถานที่พักผ่อน</a></li>
								</ul>
							</li>
							<li><a href="../pages/UsGallery.php">Gallery</a></li>
							<li><a href="../editRegister.php">Profile</a></li>
						</ul>
					</nav>
					<div class="clear"></div>
				</div>
			</header>
		</div>


<div id="header">
	<br><center><h1><label>Image Gallery Attractions in Thailand</label></h1></center><br>
</div>
<div id="body">
<?php
$folder_path = '../img/'; //image's folder path

$num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

$folder = opendir($folder_path);

if($num_files > 0)
{
	while(false !== ($file = readdir($folder)))
	{
		$file_path = $folder_path.$file;
		$extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
		if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp')
		{
			?>
            <a href="<?php echo $file_path; ?>"><img src="<?php echo $file_path; ?>"  height="180" /></a>
            <?php
		}
	}
}
else
{
	echo "the folder was empty !";
}
closedir($folder);
?>

</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

</body>
</html>
<?
	mysqli_close($con);
?>
