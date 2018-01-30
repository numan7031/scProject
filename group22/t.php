<html>
<head>
  <title>///\\\</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
  <input type="hidden" value="1000000" name="MAX_FILE_SIZE">
  <input type="file" name="uploadedfile">
  <input type="submit" name="submit" value="Upload">

  <?php
  if(isset($_POST['submit'])){
    $target_path="./img/";
    $target_path=$target_path.basename($_FILES['uploadedfile']['name']);
    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){
      $conn=mysqli_connect("localhost", "root", "","scdb");
    $sql="insert into users(`image`) values('$target_path')";
      if($conn -> query($sql)==TRUE){
        echo "<br><br>";
      }else {
        echo "Error:".$sql.$conn->error;
      }

      $sql1="select image from users order by userID desc limit 1";
      $objResult=$conn->query($sql1);
      if($objResult->num_rows>0){
        while ($row=$objResult->fetch_assoc()) {
          $image=$row['image'];
          echo "<img src='$image' height='150' width='190'>";
        }
      }

      $conn->close();

    }
  }
   ?>
</form>
</body>
</html>
