<?php
require 'connect.php';
$id = $_REQUEST['id'];
//$var_value = $_REQUEST['varname'];
session_start();
ob_start();

if (isset($id)) {
  $_SESSION['abc']=$id;
}


$sql = "SELECT u.image,CONCAT(u.fname,' ',u.lname) AS fullname,DATE_FORMAT(datereview,'%d/%l/%Y') AS dater,TIME_FORMAT(datereview,'%H:%i:%s') AS timer,r.reviewdes,r.score FROM review r JOIN users u ON r.userID=u.userID WHERE r.attracID = ".$_SESSION['abc']."";
	//$rs = mysqli_query($conn,$sql);
  //$sql = "SELECT*FROM review";

  $rs=$con->query($sql);

	$num_rows = mysqli_num_rows($rs);

	$per_page = 3;   // Per Page
	$page  = 1;

	if(isset($_GET["Page"]))
	{
		$page = $_GET["Page"];
	}

	$prev_page = $page-1;
	$next_page = $page+1;

	$row_start = (($per_page*$page)-$per_page);
	if($num_rows<=$per_page)
	{
		$num_pages =1;
	}
	else if(($num_rows % $per_page)==0)
	{
		$num_pages =($num_rows/$per_page) ;
	}
	else
	{
		$num_pages =($num_rows/$per_page)+1;
		$num_pages = (int)$num_pages;
	}
	$row_end = $per_page * $page;
	if($row_end > $num_rows)
	{
		$row_end = $num_rows;
	}


	$sql .= " ORDER BY r.revID ASC LIMIT $row_start ,$row_end ";
	//$rs = mysqli_query($conn,$sql);
  $rs=$con->query($sql);

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $id ?></title>

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

</head>
<body>

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
      								<div class="status-upload">
      									<form name="review" method="post" action="processphp/insert.php">
                          <!--<input type="text" class="form-control" id="topic" placeholder="หัวข้อ">-->
      										<textarea name="rev" placeholder="Add review" ></textarea>
      										<ul>
                            <li>ให้คะแนน </li>
      											<li><label class="radio-inline"><input type="radio" name="poin" value="1">1 คะแนน</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="2">2 คะแนน</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="3">3 คะแนน</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="4">4 คะแนน</label></li>
                            <li><label class="radio-inline"><input type="radio" name="poin" value="5">5 คะแนน</label></li>

      										</ul>
                          <input type="hidden" id="hid" name="att" value="<?php echo $id ?>">
      										<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>รีวิว</button>
      									</form>
      								</div><!-- Status Upload  -->
      							</div><!-- Widget Area -->
      						</div>

          </div>

      <br><br>


      <p><span class="badge"><?php echo $num_rows;?></span> ความคิดเห็น:</p><br>

      <div class="row">
        <?php
        //$i = 0;
        //$arrayName = array('one_third first','one_third','one_third');//เก็บอาเรย์เรียงจากขวาไปซ้าย
        //$numOfCols = 3;
        //$rowCount = 0;
        //$bootstrapColWidth = 12 / $numOfCols;
        while($row=$rs->fetch_assoc())
        {
         ?>
        <div class="col-sm-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="../img/<?php echo $row['image']; ?>" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b><?php echo $row['fullname']; ?></b></a>
                            made a post.&nbsp;<?php echo $row['dater']; ?>
                        </div>
                        <h6 class="text-muted time"><?php echo $row['timer']; ?>&nbsp;น.</h6>
                    </div>
                </div>
                <div class="post-description">
                    <p><?php echo $row['reviewdes']; ?></p>
                    <div class="stats">
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-up icon"></i>2
                        </a>
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-down icon"></i>12
                        </a>
                    </div>
                </div>
            </div>
        </div>
      <?php } ?>
    </div>


    Total <?php echo $num_rows;?> Record : <?php echo $num_pages;?> Page :
    <?php
    if($prev_page)
    {
    	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$prev_page'><< Back</a> ";
    }

    for($i=1; $i<=$num_pages; $i++){
    	if($i != $page)
    	{
    		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
    	}
    	else
    	{
    		echo "<b> $i </b>";
    	}
    }
    if($page!=$num_pages)
    {
    	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$next_page'>Next>></a> ";
    }
    $conn = null;
    ?>

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
