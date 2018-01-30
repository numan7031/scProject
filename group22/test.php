<?php
	session_start();
	require_once("connect.php");
  ?>
<html>
<head>
<title>///\\\</title>
</head>
<body>
<div class="row">
		<div class="navbar-collapse gallery">
			<ul>
			<?php
				$sql_query="SELECT userID, image FROM users WHERE userID";
				$resultset = mysqli_query($con, $sql_query) or die("database error:". mysqli_error($con));
				while($rows = mysqli_fetch_array($resultset) ) { ?>
				<li>
					<a href="http://localhost/coderszine/build-image-gallery-with-jquery-php-mysql/uploads/<?php echo $rows["image"]; ?>">
          <img src="http://localhost/coderszine/build-image-gallery-with-jquery-php-mysql/uploads/<?php echo $rows["image"]; ?>" class="images" width="200" height="200"></a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</body>
</html>
