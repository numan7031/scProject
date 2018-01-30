
<!DOCTYPE html>

<html>
<head>
<title>Attractions</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../css/util.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
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

        <li><a class="cd-signup" href="../logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

<div class="wrapper row1">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="../index1.php">SUT</a></h1>
      <p>Attractions in Thailand</p>
    </div>

		<nav id="mainav" class="fl_right">
			<ul class="clear">
				<li class="active"><a href="../index1.php">Home</a></li>
				<li><a class="drop" href="#">ค้นหาสถานที่</a>
					<ul>
						<li><a href="../pages/adminSearch1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
						<li><a href="../pages/adminSearch2.php">ค้นหาร้านอาหาร</a></li>
						<li><a href="../pages/adminSearch3.php">ค้นหาร้านขายของที่ระลึก</a></li>
						<li><a href="../pages/adminSearch4.php">ค้นหาสถานที่พักผ่อน</a></li>
					</ul>
				</li>
				<li><a class="drop" href="#">Scope</a>
					<ul>
				<li><a href="../pages/insertAttraction.php">เพิ่มสถานที่ท่องเที่ยว</a></li>
				<li><a href="../pages/editRegister.html">กำหนดสิทธิการเข้าใช้</a></li>
			</ul>

				<li><a href="../pages/selectMember.php">Report</a></li>
				<li><a href="../editRegAdmin.php">Profile</a></li>
			</ul>
		</nav>

  </header>
</div>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form name="form1" method="post" action="../pages/AdminInsertAtt.php">
				<span class="login100-form-title">
					เพิ่มสถานที่ท่องเที่ยว
				</span>
<div class="container-login100-form-btn">
	<div class="wrap-input100 validate-input">
		<div>
			จุดเด่นของสถานที่:
			<select id="typeAttraction" name="typeAttraction" class="input100">
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
			<select id="typeID" name="typeID" class="input100">
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
		<th><input value="Wifi" name="txtWifi[]" id="txtWifi" type="checkbox"> Wifi</th>
		<th><input value="3G-4G" name="txtThreeG[]" id="txtThreeG" type="checkbox"> 3G-4G</th>
		<th><input value="Unseen Thailand" name="txtUnseen[]" id="txtUnseen" type="checkbox"> Unseen Thailand</th><tr>
		<tr>
		<th><input value="บริการห้องสุขา" name="txtToilet[]" id="txtToilet" type="checkbox"> บริการห้องสุขา</th>
		<th><input value="บริการนำเที่ยว" name="txtTourdesk[]" id="txtTourdesk" type="checkbox"> บริการนำเที่ยว</th>
		<th><input value="หน่วยบริการแพทย์" name="txtMedical[]" id="txtMedical" type="checkbox"> หน่วยบริการแพทย์</th></tr>
		<tr>
		<th><input value="สิ่งอำนวยความสะดวก" name="txtFac[]" id="txtFac" type="checkbox"> สิ่งอำนวยความสะดวก</th>
		<th><input value="เรื่องเล่า/ประวัต" name="txtHistory[]" id="txtHistory" type="checkbox"> เรื่องเล่า/ประวัต</th>
		<th><input value="กิจกรรมให้ร่วมสนุก" name="txtActivities[]" id="txtActivities" type="checkbox"> กิจกรรมให้ร่วมสนุก</th></tr>
		<tr>
		<th><input value="ช่วงเทศกาล" name="txtFestival" id="txtFestival[]" type="checkbox"> ช่วงเทศกาล</th>
		<th><input value="หน่วยบริการรักษาความปลอดภัย" name="txtSecurity[]" id="txtSecurity" type="checkbox"> หน่วยบริการรักษาความปลอดภัย</th>
		<th><input value="สถานที่ท่องเที่ยวที่มีหลายบรรยากาศ" name="txtVar[]" id="txtVar" type="checkbox"> สถานที่ท่องเที่ยวที่มีหลายบรรยากาศ</th></tr>
		<tr>
		<th><input value="สถานที่ท่องเที่ยวทดแทนต่างประเทศ" name="txtOut[]" id="txtOut" type="checkbox"> สถานที่ท่องเที่ยวทดแทนต่างประเทศ</th>
		<th><input value="สถานที่ท่องเที่ยวทดแทนในประเทศ" name="txtIn[]" id="txtIn" type="checkbox"> สถานที่ท่องเที่ยวทดแทนในประเทศ</th>
		<th></th></tr>
		</table>

	</div>
</div>

				<div class="wrap-input100 validate-input">
					<input type="hidden" value="1000000" name="MAX_FILE_SIZE">
					<input type="file" name="uploadedfile" id="uploadedfile">
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="textAtname" id="textAtname" placeholder="ชื่อสถานที่ท่องเที่ยว">
					<span class="focus-input100"></span>
				</div>

				<div>
					<input class="input100" type="text" name="textTravel" id="textTravel" placeholder="คำแนะนำ">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="number" name="textPrice" id="textPrice" placeholder="ค่าใช้จ่าย">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="number" name="textLat" id="textLat" placeholder="Latitude">
					<span class="focus-input100"></span>

					<input class="input100" type="number" name="textLong" id="textLong" placeholder="Longitude">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input">
				<textarea class="input100" id="textAdress" name="textAdress" placeholder="...ที่อยู่..."></textarea>
				<span class="focus-input100"></span>
			</div>

				<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" name="Submit" value="Insert">
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
</body>
</html>
