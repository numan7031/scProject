<?php
require '../../connect.php';

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
<h2>เพิ่มรูปภาพสถานที่ร้านอาหาร</h2>
<br>
  <form action="../../insertGaloryRes.php" method="post" enctype="multipart/form-data">
          <input name="upload[]" type="file" multiple="multiple" />
          <input type="text" name="att" placeholder="รหัสร้าน"/>
          <input type="submit" name="submit" value="UPLOAD" />
      </form>
      <br>
      <hr>
      <br>

      <h2>คลิกรูปภาพเพื่อลบ</h2>
      <?php
//this is were images displayed


            $sql3 = "SELECT * FROM `resimages` WHERE 1";
            $query3 = mysqli_query($con, $sql3);

           while($result3 = mysqli_fetch_assoc($query3)){
                    ?>
                  <a href="../../deleteGaloryRes.php?delete=<?php echo $result3['imageID']?>" onclick = "return ConfirmDelete()"><img src="../.<?php echo $result3['imageURL']?>" id="AEDbutton"></a>
            <?php   }


?>

</body>
</html>
