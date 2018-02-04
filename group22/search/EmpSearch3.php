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
<?php
	//$rs = mysqli_query($conn,$sql);

  $perpage = 6;
  if (isset($_GET['page'])) {
  $page = $_GET['page'];
  } else {
  $page = 1;
  }

  $start = ($page - 1) * $perpage;


  $sql = "SELECT * FROM souvenir ORDER BY servID ASC LIMIT $start ,$perpage";

	//$sql .= " ORDER BY sumcor DESC ,r.revID ASC LIMIT $start ,$perpage";
	//$rs = mysqli_query($conn,$sql);
  $query = mysqli_query($con, $sql);

 ?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="../css/jquery.bxslider.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
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
          <h1><a href="../index2.php">SUT</a></h1>
          <p>Attractions in Thailand</p>
        </div>

    		<nav id="mainav" class="fl_right">
    			<ul class="clear">
    				<li class="active"><a href="../index2.php">Home</a></li>
    				<li><a class="drop" href="#">ค้นหาสถานที่</a>
    					<ul>
    						<li><a href="../pages/searchEmp1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
    						<li><a href="../search/EmpSearch2.php">ค้นหาร้านอาหาร</a></li>
    						<li><a href="../search/EmpSearch3.php">ค้นหาร้านขายของที่ระลึก</a></li>
    						<li><a href="../search/EmpSearch4.php">ค้นหาสถานที่พักผ่อน</a></li>
    					</ul>
    				</li>
    				<li><a class="drop" href="#">Scope</a>
    					<ul>
    				<li><a href="../pages/insertAttraction.php">เพิ่มสถานที่ท่องเที่ยว</a></li>
    				<li><a href="#">เพิ่มร้านอาหาร</a></li>
    				<li><a href="#">เพิ่มร้านขายของที่ระลึก</a></li>
    				<li><a href="#">เพิ่มสถานที่พักผ่อน</a></li>
    			</ul>
    				<li><a href="../pages/selectReview.php">Report</a></li>
    				<li><a href="../editRegEmployee.php">Profile</a></li>
    			</ul>
    		</nav>

      </header>
    </div>
				<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading">ค้นหาร้านขายของที่ระลึก</div>
								<div class="panel-body">


									<div class="form-group">
										<label>Search Key:</label> <br/>

										<div class="radio-inline">
										  <label><input type="radio" value="many" name="search_type" checked>Random Key</label>
										</div>
									</div>

									<div class="form-group">
										<label>Search Key:</label>
										<input type="text" name="search-key" id="search-key" class="form-control" placeholder="โปรดกรอกชื่อร้านที่คุณต้องการค้นหา">
									</div>

									<div class="post-data-list">
										<?php
										 $i = 0;
										 $arrayName = array('one_third first','one_third','one_third');//เก็บอาเรย์เรียงจากขวาไปซ้าย
										 $numOfCols = 3;
										 $rowCount = 0;
										 //$bootstrapColWidth = 12 / $numOfCols;
										 while ($result = mysqli_fetch_assoc($query))
										 {
										 ?>

											 <?php

											 if($rowCount == 0) echo '<ul class="nospace group btmspace-50">';
											 $rowCount++;

											 ?>
											 <li class="<?php echo $arrayName[$i] ?>"><!--//นับอาเรย์-->
												 <article class="element">
													 <figure><img src="img/<?php echo $result['image']; ?>" style="width:320px;height:210px;" alt="<?php echo $result["name"]; ?>">
														 <figcaption><a class="btn small" href="pages/actractionpage.php?id=<?php echo $result["servID"]; ?>">More</a></figcaption>
													 </figure>
													 <div class="excerpt">
														 <text name="Top1"><strong>รหัสสถานที่: <?php echo $result["servID"];  ?></strong></text>
														 <h6 class="heading"><a href="pages/actractionpage.php?id=<?php echo $result["servID"]; ?>"><?php echo $result["name"];?></a></h6>
														 <p><?php echo $result["phone"];?>&hellip;</p>
														 <p><?php echo $result["adress"];?>&hellip;</p>
													 </div>
												 </article>
											 </li>

										 <?php
										 //$rowCount++;
										 $i++;
										 if($rowCount== 3) echo '</ul>';
										 if ($rowCount == 3) $rowCount = 0;
										 if ($i==3) $i=0;

											}
										 ?>
									</div>

								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</section>
    </div>
		<?php
		$sql2 = "SELECT * FROM souvenir ORDER BY servID ASC";


		//$sql2 .= " ORDER BY sumcor DESC ,r.revID ASC";
		$query2 = mysqli_query($con, $sql2);
		$total_record = mysqli_num_rows($query2);
		$total_page = ceil($total_record / $perpage);



		?>
		<nav>
		<ul class="pagination">
		<li>
		<a href="EmpSearch3.php?page=1" aria-label="Previous">
		<span aria-hidden="true">&laquo;</span>
		</a>
		</li>
		<?php for($i=1;$i<=$total_page;$i++){ ?>
		<li><a href="EmpSearch3.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php } ?>
		<li>
		<a href="EmpSearch3.php?page=<?php echo $total_page;?>" aria-label="Next">
		<span aria-hidden="true">&raquo;</span>
		</a>
		</li>
		</ul>
		</nav>
	<!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>

	<script>

	$(document).ready(function(e){

		$(document).on('keyup', '#search-key', function(e){
			getPostList();
		});
		$(document).on('change', 'input[name="search_type"]', function(e){
			getPostList();
		});

		var jqxhr = {abort: function () {}};

		function getPostList(){
			$search_key = $('#search-key').val();
			$search_type = $("input[name='search_type']:checked").val();
			//$('.load-post').show();
			$('.post-data-list').html('');
			jqxhr.abort();
			jqxhr = $.ajax({
				type:'POST',
				dataType: "json",
				url:'souvenir3.php',
				data:{ 'action':'showPost', 'search_key':$search_key , 'search_type':$search_type},
				success:function(data){
					$('.load-post').hide();
					$.each(data, function(key, post){
						$('.post-data-list').append('<div class="li-post-group">\
										<h4 class="li-post-title">'+post.name+'</h4>\
                    <figure><img src="../img/'+post.image+'" style="width:320px;height:210px;">\
</figure>\
										<p class="li-post-desc">'+post.adress+'</p>\
                    <p class="li-post-desc">'+post.phone+'</p>\
                    <figcaption><a class="btn small" href="restaurant.php?id='+post.servID+'">More</a></figcaption>\
									</div>');
				    });
				}
			});

		}

	});
	</script>
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
  <script src="layout/scripts/jquery.min.js"></script>
  <script src="layout/scripts/jquery.backtotop.js"></script>
  <script src="layout/scripts/jquery.mobilemenu.js"></script>

  <script src="layout/scripts/jquery.placeholder.min.js"></script>
  <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="js/fliplightbox.min.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">$('.portfolio').flipLightBox()</script>
    <script  src="js/index.js"></script>
  </body>
  </html>
