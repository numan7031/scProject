<?php
require '../connect.php';
//require 'processphp/timeago.php';//ฟังก์ชั้นเวลา
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
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>ที่พัก</title>
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

      $sql5 = "SELECT ac.acname,ac.adress,ac.description,ac.phone,ac.lat,ac.lng,ac.image,a.atname,a.attracID FROM `accommodation` ac JOIN attractions a ON ac.attracID = a.attracID WHERE ac.acID =  $_atid";
      $query5 = mysqli_query($con, $sql5);

      	while($result5 = mysqli_fetch_assoc($query5))
      	{

      			?>

      <h4><small>ที่พัก&nbsp;&nbsp;<?php echo $result5['acname']; ?></small></h4>

      <table>
        <tr>
          <td colspan="2"><div class="img-resize"><a href=".<?php echo $result5['image']; ?>"><img src=".<?php echo $result5['image']; ?>"/></a></td></div>
        </tr>
          <tr><td><p>ชื่อร้าน</p></td>
          <td><?php echo $result5['acname']; ?></td></tr>
          <tr><td>ที่อยู่</td>
            <td><?php echo $result5['adress']; ?></td></tr>
          <tr><td>รายละเอียด</td>
            <td><?php echo $result5['description']; ?></td></tr>
          <tr><td>เบอร์โทร</td>
            <td><?php echo $result5['phone']; ?></td></tr>
          <tr><td>สถานที่ท่องเที่ยวใกล้เคียง</td>
          <td><a href="actractionpage.php?id=<?php echo $result5["attracID"]; ?>"><?php echo $result5["atname"];?></a></td></tr>

      </table>

      <a class="btn small" href="stackmapAccom.php?attlat=<?php echo $result5['lat']; ?>&attlng=<?php echo $result5['lng']; ?>" target="_blank">แนะนำสถานที่ใกล้เคียง</a>
      <a class="btn small" href="https://maps.google.com/maps?q=loc:<?php echo $result5['lat']; ?>,<?php echo $result5['lng']; ?>" target="_blank">การเดินทาง</a>
      <?php
      }

      ?>



      <br><br>



    </div>

     <div class="col-sm-4 sidenav">

<!-- ช่องซ้าย -->
<h3><p>Gallery</p></h3>
<?php
//$folder_path = '../img/'; //image's folder path
$sql3 = "SELECT * FROM `accomimages` WHERE acID  = $_atid LIMIT 20";
$query3 = mysqli_query($con, $sql3);

	while($result3 = mysqli_fetch_assoc($query3))
	{
			?>
            <a href=".<?php echo $result3['imageURL']; ?>"><img src=".<?php echo $result3['imageURL']; ?>"  height="50px" width"50px"  /></a>
            <?php
	}

?>


    </div>
  </div>
</div>

<footer class="container-fluid">
  <p></p>
</footer>

</body>
</html>
