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

<div class="wrapper row3">
  <main class="hoc container clear">
    <!-- main body -->
    <div class="content">
      <div id="gallery">
        <figure>
          <header class="heading">ข้อมูลวิว</header>
          <?php
	// connect to the database
	$conn=mysqli_connect("localhost", "root", "","scdb");
	$conn->query("SET NAMES UTF8");
	// get results from database
	$sql="SELECT * FROM review";
	$rs=$conn->query($sql);
	// Print Header of Table
	echo "<table border='1' cellpadding='10' width=80%>"; //open table
	echo "<tr>
	<th>ID</th>
	<th>วัน/เวลา ที่รีวิว</th>
	<th>หัวข้อรีวิว</th>
	<th>คะแนน</th>
	<th>หมายเลขสถานที่</th>
	<th>ผู้รีวิว</th>
	<th>ลบข้อมูล</th>
			</tr>";
	// loop through results of database query, displaying them in the table
	while($row = $rs->fetch_assoc()) {
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['revID'] . '</td>';
		echo '<td>' . $row['datereview'] . '</td>';
		echo '<td>' . $row['reviewdes'] . '</td>';
		echo '<td>' . $row['score'] . '</td>';
		echo '<td>' . $row['attracID'] . '</td>';
    echo '<td>' . $row['userID'] . '</td>';
		echo '<nav class="main-nav">';
		echo '<td><figcaption><a class="btn small" href="delete.php?id=' . $row['revID'] . '" onclick="return ConfirmDelete(' . $row['revID'] . ');">Delete</a></figcaption></td>';
		echo '</nav>';
		echo "</tr>";
	}
	echo "</table>"; // close table
	$conn->close(); // close database connection
	?>

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
