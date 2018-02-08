<?php
	session_start();
	require_once("connect.php");

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
<title>Attractions</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/style1.css">
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
<script type="text/javascript">
function ConfirmDelete(id)
{
	var y = id;
  var x = confirm("Are you sure to delete #id "+y+" ?");
  if (x)
      return true;
  else
    return false;
}
</script>
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
      <h1><a href="index1.php">SUT</a></h1>
      <p>Attractions in Thailand</p>
    </div>

		<nav id="mainav" class="fl_right">
			<ul class="clear">
				<li class="active"><a href="index1.php">Home</a></li>
				<li><a class="drop" href="#">ค้นหาสถานที่</a>
					<ul>
						<li><a href="pages/adminSearch1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
						<li><a href="pages/adminSearch2.php">ค้นหาร้านอาหาร</a></li>
						<li><a href="pages/adminSearch3.php">ค้นหาร้านขายของที่ระลึก</a></li>
						<li><a href="pages/adminSearch4.php">ค้นหาสถานที่พักผ่อน</a></li>
					</ul>
				</li>
				<li><a class="drop" href="#">Scope</a>
					<ul>
				<li><a href="pages/insertAttraction.php">เพิ่มสถานที่ท่องเที่ยว</a></li>
				<li><a href="pages/editRegister.html">กำหนดสิทธิการเข้าใช้</a></li>
			</ul>

				<li><a href="pages/selectMember.php">Report</a></li>
				<li><a href="editRegAdmin.php">Profile</a></li>
			</ul>
		</nav>

  </header>
</div>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<?php
			$conn = mysqli_connect("localhost","root","","scdb");
			$conn->query("SET NAMES UTF8");

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

					$id = $_REQUEST['id'];


			$sql = "SELECT * FROM restaurant WHERE resID=" . $id;
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result)

			?>
			<form name="form1" method="post" enctype="multipart/form-data" action="editRes.php">
				<span class="login100-form-title">
					เพิ่มร้านอาหาร
				</span>
<div class="container-login100-form-btn">
	<div class="wrap-input100 validate-input">
		<div class="wrap-input100 validate-input">
			<input class="input100" type="hidden" name="resID" id="resID" value="<?php echo $row["resID"];?>">
			<span class="focus-input100"></span>
		</div>
		<div class="login100-pic js-tilt" data-tilt>
		<img src="<?php echo $row["image"];?>">
		</div>
		<div class="wrap-input100 validate-input">
			<input type="hidden" value="1000000" name="MAX_FILE_SIZE">
			<input type="file" name="upload" id="upload">
		</div>
		<div>
			รหัสสถานที่ใกล้เคียง:
			<div class="wrap-input100 validate-input">
				<input class="input100" type="text" name="attID" id="attID" placeholder="รหัสสถานที่ท่องเที่ยว" value="<?php echo $row["attracID"];?>">
				<span class="focus-input100"></span>
			</div>
	</div>
</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="textresname" id="textresname" placeholder="ชื่อร้านอาหาร" value="<?php echo $row["resname"];?>">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
				<textarea class="input100" id="textadress" name="textadress" placeholder="...ที่อยู่..." value="<?php echo $row["adress"];?>"></textarea>
				<span class="focus-input100"></span>
			</div>
			<div class="wrap-input100 validate-input">
				<input class="input100" type="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="textphone" id="textphone" placeholder="xxx-xxx-xxxx" value="<?php echo $row["phone"];?>">
				<span class="focus-input100"></span>
			</div>
				<div class="wrap-input100 validate-input">
				<textarea class="input100" id="textDescription" name="textDescription" placeholder="รายละเอียด" value="<?php echo $row["description"];?>"></textarea>
				<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="float" name="textLat" id="textLat" placeholder="Latitude" value="<?php echo $row["lat"];?>">
					<span class="focus-input100"></span>

					<input class="input100" type="float" name="textLong" id="textLong" placeholder="Longitude" value="<?php echo $row["lng"];?>">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" name="Submit" value="เพิ่มร้านอาหาร">
				</div>
			</form>
		</div>
	</div>
</div>


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
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="../layout/scripts/jquery.placeholder.min.js"></script>

<script  src="../js/index.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
	<?php
					}
		mysqli_close($conn);
	?>
</body>
</html>
<?
	mysqli_close($con);
?>
