<?php include"../config.php";
//declaration array varible
$colour = array('product_color');
$brand = array();
$size  = array();

//finding query string value
if(isset($_REQUEST['colour'])){
	//query string value to array and removing empty index of array
	$colour = array_filter(explode("-",$_REQUEST['colour']));
}

if(isset($_REQUEST['brand'])){

	$brand = array_filter(explode("-",$_REQUEST['brand']));
}

if(isset($_REQUEST['size'])){

	$size = array_filter(explode("-",$_REQUEST['size']));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>



    <!-- Page Content -->
    <div class="container" style="padding-top:2%;" >

        <div class="row">
            <div class="col-md-3">
                <p class="lead">Product filter</p>

                <div class="list-group">
				<h3>Colour</h3>
				<?php
					$strSQL = "select distinct(product_color) from product where product_status = '1'";
					$objQuery = mysqli_query($con,$strSQL);
					$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


				?>
                    <a href="javascript:void(0);" class="list-group-item">
					<input type="checkbox" class="item_filter colour" value="<?php echo $colour["product_color"]; ?>" <?php if(in_array($colour["product_color"])){ echo"checked"; } ?> >
					&nbsp;&nbsp; <?php echo $colour["product_color"]; ?></a>

                </div>


				<div class="list-group">
				<h3>Brand</h3>
				<?php
					$strSQL = "select distinct(product_brand) from product where product_status = '1'";
					$objQuery = mysqli_query($con,$strSQL);
					$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


				?>
                    <a href="javascript:void(0);" class="list-group-item">
					<input type="checkbox" class="item_filter brand" value="<?php echo $brand['product_brand']; ?>" <?php if(in_array($brand['product_brand'])){ echo"checked"; } ?> >
					&nbsp;&nbsp; <?php echo $brand['product_brand']; ?></a>

                </div>

				<div class="list-group">
				<h3>Size</h3>
				<?php
					$strSQL = "select distinct(product_size) from product where product_status = '1'";
					$objQuery = mysqli_query($con,$strSQL);
					$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


				?>
                    <a href="javascript:void(0);" class="list-group-item">
					<input type="checkbox" class="item_filter size" value="<?php echo $size['product_size']; ?>" <?php if(in_array($size['product_size'])){ echo"checked"; } ?> >
					&nbsp;&nbsp; <?php echo $size['product_size']; ?></a>

                </div>


            </div>

            <div class="col-md-9">


                <div class="row">

				  <?php
				     $strSQL = "select * from product where product_status = '1'";
                      //filter query start
					  if(!empty($colour)){
						  $colordata =implode("','",$colour);
						  $strSQL  .= " and product_color in('$colordata')";
					  }

					   if(!empty($brand)){
						  $branddata =implode("','",$brand);
						  $strSQL  .= " and product_brand in('$branddata')";
					  }

					  if(!empty($size)){
						  $sizedata =implode("','",$size);
						  $strSQL  .= " and product_size in('$sizedata')";
					  }
                    //filter query end
										$objQuery = mysqli_query($con,$strSQL);
										$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


				  ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/<?php echo $product_data['product_image']; ?>" alt="">
                            <div class="caption">

                                <p><strong><a href="#"><?php echo $product_data['product_name']; ?></a>
                                </strong></p>
								 <h4 style="text-align:center;" >$ <?php echo $product_data['product_price']; ?></h4>
                                <p>Color : <?php echo $product_data['product_color']; ?> &nbsp; &nbsp; &nbsp; &nbsp;  Brand : <?php echo $product_data['product_brand']; ?> </p>

								<p>Size : <?php echo $product_data['product_size']; ?> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity : <?php echo $product_data['product_quantity']; ?> </p>

                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>



                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; PHP Cooker 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

	<script>
	$(function(){
		$('.item_filter').click(function(){
			var colour = multiple_values('colour');
			var brand  = multiple_values('brand');
			var size   = multiple_values('size');

			var url ="index.php?colour="+colour+"&brand="+brand+"&size="+size;
			window.location=url;
		});

	});


	function multiple_values(inputclass){
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});
	return val.join('-');
}

	</script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
