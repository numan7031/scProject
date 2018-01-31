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
        <li><a class="cd-signin" href="../login.html">Sign in</a></li>
        <li><a class="cd-signup" href="../register.html">Sign up</a></li>
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
				<li><a href="../pages/insertAttraction.html">เพิ่มสถานที่ท่องเที่ยว</a></li>
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
My-Image: <input type="file" name="my-image" id="image" accept="image/gif, image/jpeg, image/png" multiple>
<table>
<tr><td>Status: <select name="thelist" onChange="combo(this, 'theinput')"><br>
            <option>User</option>
            <option>Admin</option>
            <option>Employee</option>
          </select></td></tr><br>
<tr><td>FirstName: <input type="text" name="fnames" maxlength="20" size="20" placeholder="" multiple></td>
<td>LastName: <input type="text" name="lnames" maxlength="20" size="20" placeholder="" multiple></td></tr>
<tr><td>Username: <input type="text" name="username" maxlength="20" size="20" placeholder="" multiple></td>
<td>Password: <input type="text" name="psw" maxlength="20" size="20" placeholder="" multiple></td></tr>
<tr><td>E-Mail: <input type="email" placeholder="Email" name="em"></td>
<td>Confrim Password: <input type="text" name="cpsw" maxlength="20" size="20" placeholder="" multiple></td></tr>
</table>
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
