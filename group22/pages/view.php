<!DOCTYPE html>

<html>
<head>
<title>Attractions</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li><a class="cd-signin" href="../login.html">Sign in</a></li>
        <li><a class="cd-signup" href="../register.html">Sign up</a></li>
      </ul>
    </nav>
  </header>

<div class="wrapper row1">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="../index.html">SUT</a></h1>
      <p>Attractions in Thailand</p>
    </div>

		<nav id="mainav" class="fl_right">
			<ul class="clear">
				<li class="active"><a href="../index.html">Home</a></li>
				<li><a class="drop" href="#">ค้นหาสถานที่</a>
					<ul>
						<li><a href="../pages/view.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
						<li><a href="../pages/view1.php">ค้นหาร้านอาหาร</a></li>
						<li><a href="../pages/view2.php">ค้นหาร้านขายของที่ระลึก</a></li>
						<li><a href="../pages/view3.php">ค้นหาสถานที่พักผ่อน</a></li>
					</ul>
				</li>
				<li><a href="../pages/gallery.html">Gallery</a></li>
				<li><a href="../pages/aboutAs.html">About Me</a></li>
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
					<a href="#demo" class="btn small" data-toggle="collapse">ค้นหาสถานที่ท่องเที่ยวจาก</a>
					<div class="wrapper row0">
					  <div id="topbar" class="hoc clear">


					    <div class="fl_right">
					      <form class="clear" method="post" action="#">
					        <fieldset>
					          <legend>Search:</legend>
					          <input type="search" value="" placeholder="Search Here&hellip;">
					          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
					        </fieldset>
					      </form>
					    </div>
					  </div>
					</div>
  <div id="demo" class="collapse">
<table border='1' cellpadding='10' width=80%>
<tr>
<th><input type="checkbox" value="None" id="one" name="check1" checked />มีบริการห้องสุขา</th>
<th><input type="checkbox" value="None" id="four" name="check4" checked />Unseen Thailand</th>
<th><input type="checkbox" value="None" id="five" name="check5" checked />มีบริการนำเที่ยว</th></tr>
<tr>
<th><input type="checkbox" value="None" id="three" name="check3" checked />มี Wifi</th>
<th><input type="checkbox" value="None" id="two" name="check2" checked />มี 3G-4G</th>
<th><input type="checkbox" value="None" id="six" name="check6" checked />มีหน่วยบริการแพทย์</th></tr>
<tr>
<th><input type="checkbox" value="None" id="seven" name="check7" checked />สิ่งอำนวยความสะดวก</th>
<th><input type="checkbox" value="None" id="eight" name="check8" checked />มีเรื่องเล่า ประวัติ</th>
<th><input type="checkbox" value="None" id="nine" name="check9" checked />มีกิจกรรมให้ร่วมสนุก</th></tr>
<tr>
<th><input type="checkbox" value="None" id="ten" name="check10" checked />ช่วงเทศกาล</th>
<th><input type="checkbox" value="None" id="eleven" name="check11" checked />มีหน่วยบริการรักษาความปลอดภัย</th>
<th><input type="checkbox" value="None" id="twelve" name="check12" checked />สถานที่ท่องเที่ยวที่มีหลายบรรยากาศ</th></tr>
<tr>
<th><input type="checkbox" value="None" id="thirteen" name="check13" checked />สถานที่ท่องเที่ยวทดแทนต่างประเทศ</th>
<th><input type="checkbox" value="None" id="fourteen" name="check14" checked />สถานที่ท่องเที่ยวทดแทนในประเทศ</th>
<th></th></tr>
</table>
</div>

          <?php
	// connect to the database
	$conn=mysqli_connect("localhost", "root", "","RegisterDB");
	$conn->query("SET NAMES UTF8");
	// get results from database
	$sql="SELECT * FROM Register";
	$rs=$conn->query($sql);
	// Print Header of Table
	echo "<table border='1' cellpadding='10' width=80%>"; //open table
	echo "<tr>
			<th>ชื่อสถานที่ท่องเที่ยว</th>
			<th>วันเปิดทำการ</th>
			<th>เวลาเปิดทำการ</th>
			<th>ค่าเข้าชม</th>
			<th>ที่อยู่</th>
			<th>Photo</th>
			</tr>";
	// loop through results of database query, displaying them in the table
	while($row = $rs->fetch_assoc()) {
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['ID'] . '</td>';
		echo '<td>' . $row['FirstName'] . '</td>';
		echo '<td>' . $row['LastName'] . '</td>';
		echo '<td>' . $row['Age'] . '</td>';
		echo '<td>' . $row['Gender'] . '</td>';
    echo '<td><img src="'. $row['Photo'] .'" height="70" width="70"/></td>';
		echo '<td><a href="../pages/pattayaAubon.html.php?id=' . $row['ID'] . '">View</a> ';
		echo "</tr>";
	}
	echo "</table>"; // close table
	$conn->close(); // close database connection
	?>

        </figure>
      </div>
      <nav class="pagination">
        <ul>
          <li><a href="#">&laquo; Previous</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><strong>&hellip;</strong></li>
          <li><a href="#">6</a></li>
          <li class="current"><strong>7</strong></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><strong>&hellip;</strong></li>
          <li><a href="#">14</a></li>
          <li><a href="#">15</a></li>
          <li><a href="#">Next &raquo;</a></li>
        </ul>
      </nav>
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
