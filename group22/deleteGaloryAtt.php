<?php
    include('connect.php');

    if( isset($_REQUEST['delete']) ){
      $delete = $_REQUEST['delete'];
    }

    if( isset($_REQUEST['delete']) ){


        $sql3 = "SELECT * FROM attracimages WHERE imageID='".$delete."'";
        $query3 = mysqli_query($con, $sql3);

      while($result3 = mysqli_fetch_assoc($query3)){
            $image = $result3['imageURL'];
            $file= $image;
            unlink($file);
        }

        $sql = "DELETE FROM attracimages WHERE imageID='".$delete."'";
        if ($con->query($sql) === TRUE) {
           echo "Record deleted successfully";
         } else {
            echo "Error deleting record: " . $con->error;
         }

          $con->close();
          header("location:pages/html/insertGalaryAtt.php");
    }
?>
