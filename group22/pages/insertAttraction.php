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
<title>Attractions</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../css/style1.css">

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
						<li><a href="../pages/view.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
						<li><a href="../pages/view1.php">ค้นหาร้านอาหาร</a></li>
						<li><a href="../pages/view2.php">ค้นหาร้านขายของที่ระลึก</a></li>
						<li><a href="../pages/view3.php">ค้นหาสถานที่พักผ่อน</a></li>
					</ul>
				</li>
				<li><a class="drop" href="#">Scope</a>
					<ul>
				<li><a href="../pages/insertAttraction.php">เพิ่มสถานที่ท่องเที่ยว</a></li>
				<li><a href="../pages/editRegister.html">กำหนดสิทธิการเข้าใช้</a></li>
			</ul>
				<li><a href="../pages/selectReview.php">Report</a></li>
			</ul>
		</nav>


  </header>
</div>

<div class="wrapper row3">
  <main class="hoc container clear">
    <!-- main body -->
    <div class="content">
      <div id="gallery">
        <figure>
รูปภาพ: <input type="file" name="my-image" id="image" accept="image/jpeg">
ประเภทสถานที่:<select name="aType">
<option value="1">สถานที่ท่องเที่ยว</option>
<option value="2">ร้านอาหาร</option>
<option value="3">ร้านขายของที่ระลึก</option>
<option value="4">ที่พัก</option>
</select>
ชื่อสถานที่: <input type="text" name="nLocation" maxlength="20" size="20" placeholder="" multiple>
่วันเปิดทำการ: <input type="date" placeholder="วว/ดด/ปปปป">
เวลาเปิดทำการ: <input type="time"autocomplete="">
ค่าเข้าชม: <input type="number" name="b" value="0">
ที่อยู่: <input type="address" name="adress" maxlength="200" size="48" placeholder="" multiple>
เบอร์โทรศัพท์: <input type="number" name="phones" value="">
รายละเอียด: <textarea name="textarea" rows="10" cols="50">Write something here</textarea>
<input class="btn" type="submit" name="submit" value="Save">
        </figure>
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
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
  <script src="../layout/scripts/jquery.min.js"></script>
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  <!-- IE9 Placeholder Support -->
  <script src="../layout/scripts/jquery.placeholder.min.js"></script>

  <script  src="../js/index.js"></script>
  </body>
  </html>
  <?
  	mysqli_close($con);
  ?>
