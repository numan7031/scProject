<!DOCTYPE html>

<html>
<head>
<title>Lolwork | Pages | Gallery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../css/style1.css">

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
      <h1><a href=".../index.html">Lolwork</a></h1>
      <p>Fusce iaculis feugiat</p>
    </div>

    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href = "../index.html">Home</a></li>
        <li><a class="drop" href="#">ค้นหาสถานที่</a>
          <ul>

            <li><a href="pages/full-width.html">ค้นหาสถานที่ท่องเที่ยว</a>
              <ul>
                <li><a href="#">มีบริการห้องสุขา</a></li>
                <li><a href="#">มี 3G-4G</a></li>
                <li><a href="#">มี Wifi</a></li>
                <li><a href="#">Unseen Thailand</a></li>
                <li><a href="#">มีบริการนำเที่ยว</a></li>
                <li><a href="#">มีหน่วยบริการแพทย์</a></li>
                <li><a href="#">สิ่งอำนวยความสะดวก</a></li>
                <li><a href="#">มีเรื่องเล่า ประวัติ</a></li>
                <li><a href="#">มีกิจกรรมให้ร่วมสนุก</a></li>
                <li><a href="#">มีหน่วยบริการรักษาความปลอดภัย</a></li>
                <li><a href="#">สถานที่ท่องเที่ยวที่มีหลายบรรยากาศ</a></li>
                <li><a href="#">สถานที่ท่องเที่ยวทดแทนต่างประเทศ</a></li>
                <li><a href="#">สถานที่ท่องเที่ยวทดแทนในประเทศ</a></li>
              </ul></li>
            <li><a href="pages/sidebar-left.html">ค้นหาร้านอาหาร</a>
              <ul>
                <li><a href="#">ร้านอาหารพื้นบ้าน</a></li>
              </ul></li>
            <li><a href="pages/sidebar-right.html">ค้นหาร้านขายของที่ระลึก</a></li>

            <li><a href="pages/basic-grid.html">ค้นหาสถานที่พักผ่อน</a></li>
          </ul>
        </li>
        <li><a href="pages/gallery.html">Gallery</a></li>
        <li><a class="drop" href="#">Dropdown</a>
          <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
              <ul>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
              </ul>
            </li>
            <li><a href="#">Level 2</a></li>
          </ul>
        </li>
        <li><a href="#">Add a Tourist Attraction</a></li>
        <li><a href="#">Link Text</a></li>
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
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Gender</th>
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
		echo '<td><a href="editForm.php?id=' . $row['ID'] . '">Edit</a> ';
		echo '<a href="delete.php?id=' . $row['ID'] . '" onclick="return ConfirmDelete(' . $row['ID'] . ');">Delete</a></td>';
		echo "</tr>";
	}
	echo "</table>"; // close table
	$conn->close(); // close database connection
	?>
          <figcaption>Gallery Description Goes Here</figcaption>
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
<div class="wrapper row4 bgded overlay" style="background-image:url('../images/demo/backgrounds/03.png');">
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