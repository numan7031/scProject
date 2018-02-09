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
	      <h1><a href="index2.php">SUT</a></h1>
	      <p>Attractions in Thailand</p>
	    </div>

			<nav id="mainav" class="fl_right">
				<ul class="clear">
					<li class="active"><a href="index2.php">Home</a></li>
					<li><a class="drop" href="#">ค้นหาสถานที่</a>
						<ul>
							<li><a href="pages/searchEmp1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
							<li><a href="search/EmpSearch2.php">ค้นหาร้านอาหาร</a></li>
							<li><a href="search/EmpSearch3.php">ค้นหาร้านขายของที่ระลึก</a></li>
							<li><a href="search/EmpSearch4.php">ค้นหาสถานที่พักผ่อน</a></li>
						</ul>
					</li>
					<li><a class="drop" href="#">Scope</a>
						<ul>
					<li><a href="InsertAttraction1.php">เพิ่มสถานที่ท่องเที่ยว</a></li>
					<li><a href="insertrestaurant1.php">เพิ่มร้านอาหาร</a></li>
					<li><a href="insertSouvenir1.php">เพิ่มร้านขายของที่ระลึก</a></li>
					<li><a href="insertCom1.php">เพิ่มสถานที่พักผ่อน</a></li>
				</ul>
				<li><a class="drop" href="#">ข้อมูลสถานที่</a>
					<ul>
				<li><a href="EmpSelectAtt.php">ข้อมูลสถานที่ท่องเที่ยว</a></li>
				<li><a href="EmpSelectRes.php">ข้อมูลร้านอาหาร</a></li>
				<li><a href="EmpSelectSou.php">ข้อมูลร้านขายของที่ระลึก</a></li>
				<li><a href="EmpSelectCom.php">ข้อมูลสถานที่พักผ่อน</a></li>

			</ul>
					<li><a href="#">Report</a></li>
					<li><a href="editRegEmployee.php">Profile</a></li>
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


			$sql = "SELECT * FROM attractions WHERE attracID=" . $id;
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result)

			?>
			<form name="form1" method="post" enctype="multipart/form-data" action="editAtt.php">
				<span class="login100-form-title">
					เพิ่มสถานที่ท่องเที่ยว
				</span>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="hidden" name="attracID" id="attracID" value="<?php echo $row["attracID"];?>">
					<span class="focus-input100"></span>
				</div>
				<div class="login100-pic js-tilt" data-tilt>
				<img src="<?php echo $row["image"];?>">
				</div>
				<div class="wrap-input100 validate-input">
					<input type="hidden" value="1000000" name="MAX_FILE_SIZE">
					<input type="file" name="upload" id="upload">
				</div>
<div class="container-login100-form-btn">
	<div class="wrap-input100 validate-input">
		<div>
			จุดเด่นของสถานที่:
			<select id="typeAttraction" name="typeAttraction" class="input100" value="<?php echo $row["typeAttraction"];?>">
	          <option value="Wifi">Wifi</option>
	          <option value="3G-4G">3G-4G</option>
	          <option value="Unseen Thailand">Unseen Thailand</option>
						<option value="บริการห้องสุขา">บริการห้องสุขา</option>
						<option value="บริการนำเที่ยว">บริการนำเที่ยว</option>
						<option value="หน่วยบริการแพทย์">หน่วยบริการแพทย์</option>
						<option value="สิ่งอำนวยความสะดวก">สิ่งอำนวยความสะดวก</option>
						<option value="เรื่องเล่า/ประวัต">เรื่องเล่า/ประวัต</option>
						<option value="กิจกรรมให้ร่วมสนุก">กิจกรรมให้ร่วมสนุก</option>
						<option value="ช่วงเทศกาล">ช่วงเทศกาล</option>
						<option value="หน่วยบริการรักษาความปลอดภัย">หน่วยบริการรักษาความปลอดภัย</option>
						<option value="สถานที่ท่องเที่ยวที่มีหลายบรรยากาศ">สถานที่ท่องเที่ยวที่มีหลายบรรยากาศ</option>
						<option value="สถานที่ท่องเที่ยวทดแทนต่างประเทศ">สถานที่ท่องเที่ยวทดแทนต่างประเทศ</option>
						<option value="สถานที่ท่องเที่ยวทดแทนในประเทศ">สถานที่ท่องเที่ยวทดแทนในประเทศ</option>
	        </select>
			<span class="focus-input100"></span>
			ประเภทของจุดเด่น:
			<select id="typeID" name="typeID" class="input100" value="<?php echo $row["type_id"];?>">
	          <option value="1">Wifi</option>
	          <option value="2">3G-4G</option>
	          <option value="3">Unseen Thailand</option>
						<option value="4">บริการห้องสุขา</option>
						<option value="5">บริการนำเที่ยว</option>
						<option value="6">หน่วยบริการแพทย์</option>
						<option value="7">สิ่งอำนวยความสะดวก</option>
						<option value="8">เรื่องเล่า/ประวัต</option>
						<option value="9">กิจกรรมให้ร่วมสนุก</option>
						<option value="10">ช่วงเทศกาล</option>
						<option value="11">หน่วยบริการรักษาความปลอดภัย</option>
						<option value="12">สถานที่ท่องเที่ยวที่มีหลายบรรยากาศ</option>
						<option value="13">สถานที่ท่องเที่ยวทดแทนต่างประเทศ</option>
						<option value="14">สถานที่ท่องเที่ยวทดแทนในประเทศ</option>
	        </select>
			<span class="focus-input100"></span>
		</div>
		<div><br></div>
		<table border='1' cellpadding='10' width=80%>
		<tr>
		<th><select id="typewifi" name="typewifi" class="input100" value="<?php echo $row["wifi"];?>">
					<option value="มีบริการ">มี Wifi</option>
					<option value="ไม่มีบริการ">ไม่มี Wifi</option>
				</select>
		</th>
		<th><select id="typeThreeG" name="typeThreeG" class="input100" value="<?php echo $row["threeGfourG"];?>">
					<option value="มีบริการ">มี 3G-4G</option>
					<option value="ไม่มีบริการ">ไม่มี 3G-4G</option>
				</select>
		</th>
		<th><select id="typeToilet" name="typeToilet" class="input100" value="<?php echo $row["toilet"];?>">
					<option value="มีบริการ">มีบริการห้องสุขา</option>
					<option value="ไม่มีบริการ">ไม่มีบริการห้องสุขา</option>
				</select>
		</th></tr>
		<tr>
			<th><select id="typeTourdesk" name="typeTourdesk" class="input100" value="<?php echo $row["tourdesk"];?>">
						<option value="มีบริการ">มีบริการนำเที่ยว</option>
						<option value="ไม่มีบริการ">ไม่มีบริการนำเที่ยว</option>
					</select>
			</th>
			<th><select id="typeMedical" name="typeMedical" class="input100" value="<?php echo $row["Medical"];?>">
						<option value="มีบริการ">มีหน่วยบริการแพทย์</option>
						<option value="ไม่มีบริการ">ไม่มีหน่วยบริการแพทย์</option>
					</select>
			</th>
			<th><select id="typeSecurity" name="typeSecurity" class="input100" value="<?php echo $row["security"];?>">
						<option value="มีบริการ">มีหน่วยรักษาความปลอดภัย</option>
						<option value="ไม่มีบริการ">ไม่มีหน่วยรักษาความปลอดภัย</option>
					</select>
			</th></tr>
			<tr>
				<th><select id="typefac" name="typefac" class="input100" value="<?php echo $row["facilitiesfordisabled"];?>">
							<option value="มีบริการ">มีสิ่งอำนวยความสะดวก</option>
							<option value="ไม่มีบริการ">ไม่มีสิ่งอำนวยความสะดวก</option>
						</select>
			</th>
			<th><select id="typeUnseen" name="typeUnseen" class="input100" value="<?php echo $row["unseen"];?>">
						<option value="เป็น">เป็น Unseen Thailand</option>
						<option value="ไม่เป็น">ไม่เป็น Unseen Thailand</option>
					</select>
		</th>
		<th></th></tr>
	</table>
	</div>
</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="textAtname" id="textAtname" placeholder="ชื่อสถานที่ท่องเที่ยว" value="<?php echo $row["atname"];?>">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
				<textarea class="input100" id="history" name="history" placeholder="ประวัติความเป็นมา/เรื่องเล่า" value="" cols="40" rows="3" ><?php echo $row["history"]; ?></textarea>
				<span class="focus-input100"></span>
			</div>
				<div class="wrap-input100 validate-input">
				<textarea class="input100" id="adress" name="adress" value="" cols="40" rows="3" placeholder="...ที่อยู่..." ><?php echo $row["adress"]; ?></textarea>
				<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="float" name="textLat" id="textLat" placeholder="Latitude" value="<?php echo $row["lat"];?>">
					<span class="focus-input100"></span>

					<input class="input100" type="float" name="textLong" id="textLong" placeholder="Longitude" value="<?php echo $row["lng"];?>">
					<span class="focus-input100"></span>
				</div>
				<div>
					<textarea class="input100" id="traveladvice" name="traveladvice" placeholder="คำแนะนำ" value="" cols="40" rows="3" ><?php echo $row["traveladvice"]; ?></textarea>
					<span class="focus-input100"></span>
					<textarea class="input100" id="advicefordisabled" name="advicefordisabled" placeholder="คำแนะนำสำหรับผู้พิการ เด็ก สตรีมีครรต์" value="" cols="40" rows="3" ><?php echo $row["advicefordisabled"]; ?></textarea>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="textPrice" id="textPrice" placeholder="ค่าใช้จ่าย" value="<?php echo $row["price"];?>">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
				<textarea class="input100" id="activities" name="activities" placeholder="กิจกรรม" value="" cols="40" rows="3" ><?php echo $row["activities"]; ?></textarea>
				<span class="focus-input100"></span>
			</div>
			<div class="wrap-input100 validate-input">
				<input class="input100" type="text" name="textfestival" id="textfestival" placeholder="ช่วงเทศกาล" value="<?php echo $row["festival"];?>">
				<span class="focus-input100"></span>
			</div>
			<div>
				<textarea class="input100" id="variousnature" name="variousnature" placeholder="สถานที่หลากหลายบรรยากาศ" value="" cols="40" rows="3" ><?php echo $row["variousnature"]; ?></textarea>
				<span class="focus-input100"></span>
				<textarea class="input100" id="replacein" name="replacein" placeholder="ทดแทนในประเทศ" value="" cols="40" rows="3" ><?php echo $row["replacein"]; ?></textarea>
				<span class="focus-input100"></span>
				<textarea class="input100" id="replaceout" name="replaceout" placeholder="ทดแทนในต่างประเทศ" value="" cols="40" rows="3" ><?php echo $row["replaceout"]; ?></textarea>
				<span class="focus-input100"></span>
			</div>
				<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" name="Submit" value="เพิ่มสถานที่ท่องเที่ยว">
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
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>

<script  src="js/index.js"></script>
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
	<?php
					}
		mysqli_close($conn);
	?>
</body>
</html>
<?
	mysqli_close($con);
?>
