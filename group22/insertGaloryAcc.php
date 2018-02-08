<?php
require_once("connect.php");
$_att = $_POST["att"];
if(isset($_POST['submit'])) {
    for ($i=0; $i<count($_FILES['upload']['name']); $i++) {
        $path = "./img_accom/";//
        $ext = explode('.', basename( $_FILES['upload']['name'][$i]));
        $path = $path . md5(uniqid()) . "." . $ext[count($ext)-1];



        $quotequery = "INSERT INTO `accomimages` (`imageURL`,`acID`) VALUES ('$path',$_att)";
        if (mysqli_query($con, $quotequery) == TRUE) {
            move_uploaded_file($_FILES['upload']['tmp_name'][$i], $path);
            echo "File uploaded.";
            //header("location:pages/html/insertGalaryAtt.php");
        } else {
            echo "Upload failed.". mysqli_error($con);
        }
    }
}
header("location:pages/html/insertGalaryAcc.php");
?>
