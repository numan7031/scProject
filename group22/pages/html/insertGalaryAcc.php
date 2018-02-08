<?php
require '../../connect.php';
session_start();
ob_start();

if( isset($_REQUEST['resid']) ){
  $resid = $_REQUEST['resid'];
}

if (isset($resid)) {
  $_SESSION['resgal']=$resid;
}
if(!isset($_SESSION['resgal'])){
  header("location:../../selectAtt.php");
}

$_resgalid = $_SESSION['resgal'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>เพิ่มลบรูปภาพในแกลลอรี่สถานที่ท่องเที่ยว</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="js/imgbox.js"></script><!--กล่องรูปภาพ-->
  <link rel="stylesheet" type="text/css" href="../css/imgbox.css"><!--กล่องรูปภาพ-->
  <link rel="stylesheet" type="text/css" href="../css/imgbox2.css"><!--กล่องรูปภาพ-->
  <link rel="stylesheet" type="text/css" href="../css/imgbox3.css"><!--กล่องรูปภาพ-->

  <link rel="stylesheet" type="text/css" href="../css/imgresize.css"><!--กล่องรูปภาพ-->
  <script type="text/javascript">
  function ConfirmDelete()
  {

    var x = confirm("Are you sure to delete this picture ?");
    if (x)
        return true;
    else
      return false;
  }
  </script>
</head>

<body>
<h2>เพิ่มรูปภาพสถานทีพัก</h2>
<br>
  <form action="../../insertGaloryAcc.php" method="post" enctype="multipart/form-data">
          <input name="upload[]" type="file" multiple="multiple" />
          <input type="text" name="att" placeholder="รหัสร้าน" value="<?php echo $_resgalid ?>" readonly/>
          <input type="submit" name="submit" value="UPLOAD" />
      </form>
      <br>
      <hr>
      <br>

      <h2>คลิกรูปภาพเพื่อลบ</h2>
      <?php
//this is were images displayed


            $sql3 = "SELECT * FROM `accomimages` WHERE acID = $_resgalid";
            $query3 = mysqli_query($con, $sql3);

           while($result3 = mysqli_fetch_assoc($query3)){
                    ?>
                  <a href="../../deleteGaloryAcc.php?delete=<?php echo $result3['imageID']?>" onclick = "return ConfirmDelete()"><img src="../.<?php echo $result3['imageURL']?>" id="AEDbutton"></a>
            <?php   }


?>

</body>
</html>
