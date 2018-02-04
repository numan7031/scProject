<?php
require '../connect.php';
require 'processphp/timeago.php';//ฟังก์ชั้นเวลา
//$id = 12;
if( isset($_REQUEST['id']) ){
  $id = $_REQUEST['id'];
}


session_start();
ob_start();
if (isset($id)) {
  $_SESSION['abc']=$id;
}

$_atid = $_SESSION['abc'];

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


  $sql = "SELECT u.email,u.image,r.datereview,CONCAT(u.fname,' ',u.lname) AS fullname,r.reviewdes,r.score FROM review r JOIN users u ON r.userID=u.userID WHERE r.attracID = ".$_SESSION['abc']." LIMIT $start ,$perpage";

  $query = mysqli_query($con, $sql);

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>สถานที่ท่องเที่ยวยอดนิยม</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <!--<link rel="stylesheet" href="../css/jquery.bxslider.css">-->
  <link rel="stylesheet" href="../css/style1.css">

  <link rel="stylesheet" type="text/css" href="css/starability-css/starability-all.css"/><!--ดาว-->

  <link rel="stylesheet" type="text/css" href="css/attpage.css"><!--เฉพาะหน้า actractionpage-->

  <link rel="stylesheet" type="text/css" href="css/comment_box.css"><!--กล่อง คอมเม้น-->
  <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css"><!--กล่อง คอมเม้น-->

  <link rel="stylesheet" type="text/css" href="css/comments2.css"><!--ตัวแสดงคอมเม้น-->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"><!--ตัวแสดงคอมเม้น-->


  <script src="js/imgbox.js"></script><!--กล่องรูปภาพ-->
  <link rel="stylesheet" type="text/css" href="css/imgbox.css"><!--กล่องรูปภาพ-->
  <link rel="stylesheet" type="text/css" href="css/imgbox2.css"><!--กล่องรูปภาพ-->
  <link rel="stylesheet" type="text/css" href="css/imgbox3.css"><!--กล่องรูปภาพ-->

  <link rel="stylesheet" type="text/css" href="css/imgresize.css"><!--กล่องรูปภาพ-->

  <style>
  table {
      border-collapse: collapse;
      width: 100%;
  }

  th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
  }

  tr:hover {background-color:#f5f5f5;}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index4.php">Easy Travel</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../index4.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ค้นหาสถานที่<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="pages/publicSearch1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
          <li><a href="pages/publicSearch2.php">ค้นหาร้านอาหาร</a></li>
          <li><a href="pages/view2.php">ค้นหาร้านขายของที่ระลึก</a></li>
          <li><a href="pages/view3.php">ค้นหาสถานที่พักผ่อน</a></li>
        </ul>
      </li>
      <!--<li><a href="#">Page 2</a></li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
      if( !isset($_SESSION["userID"]) ){?>
        <li><a href="../register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="../index3.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php  }else {

      $usein = $_SESSION["userID"];
      $sql6 = "SELECT CONCAT(fname,' ',lname) AS fullname1,email FROM `users` WHERE userID  = $usein";
      $query6 = mysqli_query($con, $sql6);

        while($result6 = mysqli_fetch_assoc($query6))
        {

      ?>

        <li><a href="../editRegister.php"><?php echo $result6['email']; ?></a></li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
    <?php  }
    }

                  ?>
    </ul>
  </div>
</nav>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-8">
      <?php
      //$folder_path = '../img/'; //image's folder path

      $sql5 = "SELECT * FROM `attractions` WHERE attracID  =  $_atid";
      $query5 = mysqli_query($con, $sql5);

      	while($result5 = mysqli_fetch_assoc($query5))
      	{

      			?>

      <h4><small><?php echo $result5['atname']; ?></small></h4>

      <table>
        <tr>
          <td colspan="2"><div class="img-resize"><a href="../img/<?php echo $result5['image']; ?>"><img src="../img/<?php echo $result5['image']; ?>"/></a></td></div>
        </tr>
          <tr><td><p>ประวัติความเป็นมา</p></td>
          <td><?php echo $result5['history']; ?></td></tr>
          <tr><td>ที่อยู่</td>
            <td><?php echo $result5['adress']; ?></td></tr>
          <tr><td>คำแนะนำ</td>
            <td><?php echo $result5['traveladvice']; ?></td></tr>
          <tr><td>คำแนะนำสำหรับผู้พิการ</td>
            <td><?php echo $result5['advicefordisabled']; ?></td></tr>
          <tr><td>กิจกรรม</td>
            <td><?php echo $result5['activities']; ?></td></tr>
            <tr><td>บรรยากาศสไตร์</td>
              <td><?php echo $result5['variousnature']; ?></td></tr>
              <tr><td>สถานที่ในไทยทีบรรยากาศใกล้เคียง</td>
                <td><?php echo $result5['replacein']; ?></td></tr>
                <tr><td>สถานที่ต่างประเทศทีบรรยากาศใกล้เคียง</td>
                <td><?php echo $result5['replaceout']; ?></td></tr>
      </table>

      <a class="btn small" href="stackmap.php?attlat=<?php echo $result5['lat']; ?>&attlng=<?php echo $result5['lng']; ?>" target="_blank">แนะนำสถานที่ใกล้เคียง</a>
      <a class="btn small" href="https://maps.google.com/maps?q=loc:<?php echo $result5['lat']; ?>,<?php echo $result5['lng']; ?>" target="_blank">การเดินทาง</a>
      <?php
      }

      ?>

      <div class="row">

          <div class="col-md-12">

          						<div class="widget-area no-padding blank">
                        <h7><p>แสดงความคิดเห็น:</p></h7>
      								<div class="status-upload">
      									<form name="review" method="post" action="processphp/insert.php">
                          <!--<input type="text" class="form-control" id="topic" placeholder="หัวข้อ">-->
      										<textarea name="rev" placeholder="Add review" required ></textarea>
      										<ul>

                            <fieldset class="starability-slot">

                              <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />

                              <input type="radio" id="rate1" name="rating" value="1" />
                              <label for="rate1">1 star.</label>

                              <input type="radio" id="rate2" name="rating" value="2" />
                              <label for="rate2">2 stars.</label>

                              <input type="radio" id="rate3" name="rating" value="3" />
                              <label for="rate3">3 stars.</label>

                              <input type="radio" id="rate4" name="rating" value="4" />
                              <label for="rate4">4 stars.</label>

                              <input type="radio" id="rate5" name="rating" value="5" />
                              <label for="rate5">5 stars.</label>

                              <span class="starability-focus-ring"></span>
                            </fieldset>
      										</ul>
                          <input type="hidden" id="hid" name="att" value="<?php echo $id ?>">
      										<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>รีวิว</button>
      									</form>
      								</div><!-- Status Upload  -->
      							</div><!-- Widget Area -->
      						</div>

          </div>

      <br><br>


      <p><span class="badge"><?php  ?></span> ความคิดเห็น:</p><br>

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
                        <img src=".<?php echo $result['image']; ?>" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b><?php echo $result['fullname']; ?></b></a>
                            <h12 class="text-muted time">&nbsp;&nbsp;<?php echo $result['email']; ?></h12>
                        </div>
                        <h14 class="text-muted time"><?php echo time_elapsed_string($result['datereview']);?></h14>
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
$sql2 = "SELECT u.email,u.image,r.datereview,CONCAT(u.fname,' ',u.lname) AS fullname,r.reviewdes,r.score FROM review r JOIN users u ON r.userID=u.userID WHERE r.attracID = ".$_SESSION['abc']."";
$query2 = mysqli_query($con, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);



?>
<nav>
<ul class="pagination">
<li>
<a href="actractionpage.php?page=1" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<?php for($i=1;$i<=$total_page;$i++){ ?>
<li><a href="actractionpage.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php } ?>
<li>
<a href="actractionpage.php?page=<?php echo $total_page;?>" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul>
</nav>
    </div>

     <div class="col-sm-4 sidenav">

<!-- ช่องซ้าย -->
<h3><p>Gallery</p></h3>
<?php
//$folder_path = '../img/'; //image's folder path
$sql3 = "SELECT * FROM `attracimages` WHERE attracID  = $_atid LIMIT 9";
$query3 = mysqli_query($con, $sql3);

	while($result3 = mysqli_fetch_assoc($query3))
	{
			?>
            <a href="../img/<?php echo $result3['imageURL']; ?>"><img src="../img/<?php echo $result3['imageURL']; ?>"  height="180" /></a>
            <?php
	}

?>

<?php
//$folder_path = '../img/'; //image's folder path

$sql4 = "SELECT * FROM `attractions` WHERE attracID  =  $_atid";
$query4 = mysqli_query($con, $sql4);

	while($result4 = mysqli_fetch_assoc($query4))
	{
			?>

<table>
  <thead>
    <tr>
      <th colspan="2">รายละเอียดสถานที่ท่องเที่ยว</th>
    </tr>
    <tr>
      <th>บริการ</th>
      <th>สถานะ</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>ห้องน้ำ</td>
      <td><?php echo $result4['toilet'];?></td>
    </tr>
    <tr>
      <td>4G/3G</td>
      <td><?php echo $result4['threeGfourG'];?></td>
    </tr>
    <tr>
      <td>Unseen</td>
      <td><?php echo $result4['unseen'];?></td>
    </tr>
    <tr>
      <td>ราคา</td>
      <td><?php echo $result4['price'];?></td>
    </tr>
    <tr>
      <td>Security</td>
      <td><?php echo $result4['security'];?></td>
    </tr>
    <tr>
      <td>สิ่งอานวยความสะดวกแก่ผู้พิการ คนชรา สตรีมีครรภ์</td>
      <td><?php echo $result4['facilitiesfordisabled'];?></td>
    </tr>
    <tr>
      <td>WiFi</td>
      <td><?php echo $result4['wifi'];?></td>
    </tr>
    <tr>
      <td>บริการนำเที่ยว</td>
      <td><?php echo $result4['tourdesk'];?></td>
    </tr>
    <tr>
      <td>สถานพยาบาล</td>
      <td><?php echo $result4['Medical'];?></td>
    </tr>
  </tbody>
</table>

<?php
}

?>

    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
