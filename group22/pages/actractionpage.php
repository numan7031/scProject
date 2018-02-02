<?php
require 'connect.php';
//$id = 12;
if( isset($_REQUEST['id']) ){
  $id = $_REQUEST['id'];
}


session_start();
ob_start();
if (isset($id)) {
  $_SESSION['abc']=$id;
}
//date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();
//echo date("Y-m-d H:i:s");
 $perpage = 3;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }

 $start = ($page - 1) * $perpage;


  $sql = "SELECT u.image,CONCAT(u.fname,' ',u.lname) AS fullname,DATE_FORMAT(datereview,'%d %M %Y') AS dater,TIME_FORMAT(datereview,'%H:%i:%s') AS timer,r.reviewdes,r.score FROM review r JOIN users u ON r.userID=u.userID WHERE r.attracID = ".$_SESSION['abc']." LIMIT $start ,$perpage";

  $query = mysqli_query($con, $sql);


 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>สถานที่ท่องเที่ยวยอดนิยม</title>

  <link rel="stylesheet" type="text/css" href="css/attpage.css">

  <link rel="stylesheet" type="text/css" href="css/comment_box.css">
  <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">

  <link rel="stylesheet" type="text/css" href="css/comments2.css">
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
  <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
  <header role="banner">


    <nav class="main-nav">
      <ul>
        <!-- inser more links here
        <li><a class="cd-signin" href="../login.html">Sign in</a></li>
        <li><a class="cd-signup" href="../register.html">Sign up</a></li>-->
      </ul>
    </nav>
  </header>

  <div class="wrapper row1">
    <header id="header" class="hoc clear">

  		<div id="logo" class="fl_left">
        <h1><a href="../index4.php">SUT</a></h1>
        <p>Attractions in Thailand</p>
      </div>

  		<nav id="mainav" class="fl_right">
  			<ul class="clear">
  				<li class="active"><a href="../index4.php">Home</a></li>
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

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-8">
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>I Love Food</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
      <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
      <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br><br>

      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Officially Blogging</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
      <h5><span class="label label-success">Lorem</span></h5><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>


      <div class="row">

          <div class="col-md-12">

          						<div class="widget-area no-padding blank">
                        <h7><p>แสดงความคิดเห็น:</p></h7>
      								<div class="status-upload">
      									<form name="review" method="post" action="processphp/insert.php">
                          <!--<input type="text" class="form-control" id="topic" placeholder="หัวข้อ">-->
      										<textarea name="rev" placeholder="Add review" required ></textarea>
      										<ul>
                            <li>ให้คะแนน &nbsp;</li>
      											<li><label class="radio-inline"><input type="radio" name="poin" value="-2" >แย่&nbsp;</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="-1">ไม่ชอบ&nbsp;</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="0" checked="checked">เฉยๆ&nbsp;</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="1">ชอบ&nbsp;</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="2">ชอบมาก</label></li>

      										</ul>
                          <input type="hidden" id="hid" name="att" value="<?php echo $id ?>">
      										<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>รีวิว</button>
      									</form>
      								</div><!-- Status Upload  -->
      							</div><!-- Widget Area -->
      						</div>

          </div>

      <br><br>


      <p><span class="badge"><?php //echo $total_record;?></span> ความคิดเห็น:</p><br>

      <div class="row">
        <?php
        //$i = 0;
        //$arrayName = array('one_third first','one_third','one_third');//เก็บอาเรย์เรียงจากขวาไปซ้าย
        //$numOfCols = 3;
        //$resultCount = 0;
        //$bootstrapColWidth = 12 / $numOfCols;
        while ($result = mysqli_fetch_assoc($query))
        {
         ?>
        <div class="col-sm-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="../img/<?php echo $result['image']; ?>" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b><?php echo $result['fullname']; ?></b></a>
                            <h12 class="text-muted time">เขียนเมื่อวันที่.&nbsp;<?php echo $result['dater']; ?></h12>
                        </div>
                        <h14 class="text-muted time"><?php echo $result['timer']; ?>&nbsp;น.</h14>
                    </div>
                </div>
                <div class="post-description">
                    <p><?php echo $result['reviewdes']; ?></p>

                </div>
            </div>
        </div>
      <?php } ?>
    </div>


    <?php
$sql2 = "SELECT u.image,CONCAT(u.fname,' ',u.lname) AS fullname,DATE_FORMAT(datereview,'%d %M %Y') AS dater,TIME_FORMAT(datereview,'%H:%i:%s') AS timer,r.reviewdes,r.score FROM review r JOIN users u ON r.userID=u.userID WHERE r.attracID = ".$_SESSION['abc']."";
$query2 = mysqli_query($con, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>
<nav>
<ul class="pagination">
<li>
<a href="actractionpageTest.php?page=1" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<?php for($i=1;$i<=$total_page;$i++){ ?>
<li><a href="actractionpageTest.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php } ?>
<li>
<a href="actractionpageTest.php?page=<?php echo $total_page;?>" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul>
</nav>
    </div>

     <div class="col-sm-4 sidenav">
      <h4>John's Blog</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li><a href="#section2">Friends</a></li>
        <li><a href="#section3">Family</a></li>
        <li><a href="#section3">Photos</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
