<?php
	session_start();
	require_once("../../connect.php");

	if(!isset($_SESSION['userID']))
	{
		echo "Please Login!";
		exit();
	}
   include("../processphp/fusioncharts.php");
	//******************** Get Counter ************************//
  date_default_timezone_set("Asia/Bangkok");
	// Today //
	$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '".date("Y-m-d")."' ";
	$objQuery = mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_assoc($objQuery)){
	$strToday = $objResult["CounterToday"];
	}

	// Yesterday //
	$strSQL = " SELECT NUM FROM daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
	$objQuery =mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_assoc($objQuery)){
	$strYesterday = $objResult["NUM"];
	}

	// This Month //
	$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
	$objQuery = mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_assoc($objQuery)){
	$strThisMonth = $objResult["CountMonth"];
	}

	// Last Month //
	$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m',strtotime("-1 month"))."' ";
	$objQuery = mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_assoc($objQuery)){
	$strLastMonth = $objResult["CountMonth"];
	}

	// This Year //
	$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";
	$objQuery = mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_assoc($objQuery)){
	$strThisYear = $objResult["CountYear"];
	}

	// Last Year //
	$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y',strtotime("-1 year"))."' ";
	$objQuery = mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_assoc($objQuery)){
	$strLastYear = $objResult["CountYear"];
	}

	// All //
	$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily";
	$objQuery = mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_assoc($objQuery)){
	$strAll = $objResult["CountYear"];
	}

	//*** Close MySQL ***//
	mysqli_close($con);
?>

<!DOCTYPE html>

<html>
<head>
<title>รายงาน</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../../css/style1.css">

<link href="../css/extension-page-style.css" rel="stylesheet" type="text/css"  />
<link href="../css/chart1.css" rel="stylesheet" type="text/css"  />

<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>


</head>
<body id="top">
  <header role="banner">


    <nav class="main-nav">
      <ul>
        <!-- inser more links here -->

      </ul>
    </nav>
  </header>

<div class="wrapper row1">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="../../index1.php">SUT</a></h1>
      <p>Report and Charts</p>
    </div>

		<nav id="mainav" class="fl_right">
			<ul class="clear">
				<li class="active"><a href="../../index1.php">Home</a></li>
				<li><a class="drop" href="#">ค้นหาสถานที่</a>
					<ul>
						<li><a href="../../pages/adSearch1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
						<li><a href="../../search/AdSearch2.php">ค้นหาร้านอาหาร</a></li>
						<li><a href="../../search/AdSearch3.php">ค้นหาร้านขายของที่ระลึก</a></li>
						<li><a href="../../search/AdSearch4.php">ค้นหาสถานที่พักผ่อน</a></li>
					</ul>
				</li>
				<li><a class="drop" href="#">Scope</a>
					<ul>
				<li><a href="../../AdminInsertAttraction.php">เพิ่มสถานที่ท่องเที่ยว</a></li>
				<li><a href="../../insertrestaurant.php">เพิ่มร้านอาหาร</a></li>
				<li><a href="../../insertSouvenir.php">เพิ่มร้านขายของที่ระลึก</a></li>
				<li><a href="../../insertCom.php">เพิ่มสถานที่พักผ่อน</a></li>
				<li><a href="../../index1.php">กำหนดสิทธิการเข้าใช้</a></li>
			</ul>
			<li><a class="drop" href="#">ข้อมูลสถานที่</a>
				<ul>
			<li><a href="../../selectAtt.php">ข้อมูลสถานที่ท่องเที่ยว</a></li>
			<li><a href="../../selectRes.php">ข้อมูลร้านอาหาร</a></li>
			<li><a href="../../selectSou.php">ข้อมูลร้านขายของที่ระลึก</a></li>
			<li><a href="../../selectCom.php">ข้อมูลสถานที่พักผ่อน</a></li>

		</ul>
		<li><a href="../../pages/html/ChartAdmin.php">Report</a></li>
				<li><a href="../../editRegAdmin.php">Profile</a></li>
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
          <header class="heading">สถิติการเข้าชมเว็บไซต์</header>
        <!--dfheroggporjgpoj-->
				<table width="183" border="1">
				  <tr>
				    <td colspan="2"><div align="center">Statistics</div></td>
				  </tr>
				  <tr>
				    <td width="98">Today</td>
				    <td width="75"><div align="center"><?php echo number_format($strToday,0);?></div></td>
				  </tr>
				  <tr>
				    <td>Yesterday</td>
				    <td><div align="center"><?php echo number_format($strYesterday,0);?></div></td>
				  </tr>
				  <tr>
				    <td>This Month </td>
				    <td><div align="center"><?php echo number_format($strThisMonth,0);?></div></td>
				  </tr>
				  <tr>
				    <td>Last Month </td>
				    <td><div align="center"><?php echo number_format($strLastMonth,0);?></div></td>
				  </tr>
				  <tr>
				    <td>This Year </td>
				    <td><div align="center"><?php echo number_format($strThisYear,0);?></div></td>
				  </tr>
				  <tr>
				    <td>Last Year </td>
				    <td><div align="center"><?php echo number_format($strLastYear,0);?></div></td>
				  </tr>
					<tr>
				    <td>All the time </td>
				    <td><div align="center"><?php echo number_format($strAll,0);?></div></td>
				  </tr>
				</table>

        </figure>
      </div>


			<div id="gallery">
        <figure>
          <header class="heading">สถิติการเข้าชมเว็บไซต์</header>
        <!--dfheroggporjgpoj-->
				<?php
				$columnChart = new FusionCharts("column2d", "ex1" , "100%", 400, "chart-1", "json", '{
				      "chart": {
				        "caption": "จำนวนผู้เข้าชมเว็บไซต์",
				        "subCaption": "ในช่วงเวลาต่างๆ",
				        "rotatevalues": "0",
				        "numberPrefix": "",
				        "plotToolText": "<div><b>$label</b><br/>Amount : <b>$value</b></div>",
				        "theme": "fint"
				      },
				      "data": [{
				        "label": "Today",
				        "value": '.number_format($strToday,0).'
				      }, {
				        "label": "Yesterday",
				        "value": '.number_format($strYesterday,0).'
				      }, {
				        "label": "This Month",
				        "value": '.number_format($strThisMonth,0).'
				      }, {
				        "label": "Last Month",
				        "value": '.number_format($strLastMonth,0).'
				      }, {
				        "label": "This Year",
				        "value": '.number_format($strThisYear,0).'
				      }, {
				        "label": "Last Year",
				        "value": '.number_format($strLastYear,0).'
				      }]
				    }');
				    // Render the chart
				    $columnChart->render();
				?>

				<div id="chart-1"><!-- Fusion Charts will render here--></div>

        </figure>
      </div>


			<div id="gallery">
        <figure>
          <header class="heading">คะแนนรีวิวของแต่ละสถานที่ท่องเที่ยว</header>
        <!--dfheroggporjgpoj-->
				<?php

				/* Include the fusioncharts.php file that contains functions to embed the charts. */

				//include("../src/fusioncharts.php");

				/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

				$hostdb = "localhost"; // MySQl host
				$userdb = "root"; // MySQL username
				$passdb = ""; // MySQL password
				$namedb = "scdb"; // MySQL database name

				// Establish a connection to the database
				$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

				/*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
				if ($dbhandle->connect_error) {
				exit("There was an error with your connection: ".$dbhandle->connect_error);
				}
				?>


				<!-- You need to include the following JS file to render the chart.
				When you make your own charts, make sure that the path to this JS file is correct.
				Else, you will get JavaScript errors. -->



				<?php

				    // Form the SQL query that returns the top 10 most populous countries
				    $strQuery = "SELECT a.atname,sum(r.score) as sumcor FROM review r JOIN attractions a ON r.attracID = a.attracID GROUP BY a.attracID ORDER BY sumcor DESC LIMIT 10";

				    // Execute the query, or else return the error message.
				    $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

				    // If the query returns a valid response, prepare the JSON string
				    if ($result) {
				        // The `$arrData` array holds the chart attributes and data
				        $arrData = array(
				            "chart" => array(
				              "caption" => "Top 10 Attractions Score",
				              "paletteColors" => "#0075c2",
				              "bgColor" => "#ffffff",
				              "borderAlpha"=> "20",
				              "canvasBorderAlpha"=> "0",
				              "usePlotGradientColor"=> "0",
				              "plotBorderAlpha"=> "10",
				              "showXAxisLine"=> "1",
				              "xAxisLineColor" => "#999999",
				              "showValues" => "0",
				              "divlineColor" => "#999999",
				              "divLineIsDashed" => "1",
				              "showAlternateHGridColor" => "0"
				            )
				        );

				        $arrData["data"] = array();

				// Push the data into the array
				        while($row = mysqli_fetch_array($result)) {
				        array_push($arrData["data"], array(
				            "label" => $row["atname"],
				            "value" => $row["sumcor"]
				            )
				        );
				        }

				        /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

				        $jsonEncodedData = json_encode($arrData);

				/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

				        $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-2", "json", $jsonEncodedData);

				        // Render the chart
				        $columnChart->render();

				        // Close the database connection
				        $dbhandle->close();
				    }

				?>

				<div id="chart-2"><!-- Fusion Charts will render here--></div>


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
