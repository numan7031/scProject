
<!DOCTYPE html>

<html>
<head>
<title>Attractions</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../css/jquery.bxslider.css">
<link rel="stylesheet" href="../css/style1.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>

<body id="top">
  <header role="banner">


    <nav class="main-nav">
      <ul>
        <!-- inser more links here -->

				<li><a class="cd-signin" href="../index3.php">Sign in</a></li>
				<li><a class="cd-signup" href="../register.php">Sign up</a></li>
      </ul>
    </nav>
  </header>

<div class="wrapper row1">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="../index4.php">SUT</a></h1>
      <p>Attractions in Thailand</p>
    </div>

    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="../index4.php">Home</a></li>
        <li><a class="drop" href="#">ค้นหาสถานที่</a>
          <ul>
            <li><a href="../pages/publicSearch1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
            <li><a href="../pages/publicSearch2.php">ค้นหาร้านอาหาร</a></li>
            <li><a href="../pages/publicSearch3.php">ค้นหาร้านขายของที่ระลึก</a></li>
            <li><a href="../pages/publicSearch4.php">ค้นหาสถานที่พักผ่อน</a></li>
          </ul>
        </li>
        <li><a href="../pages/gallery1.php">Gallery</a></li>
        <li><a href="../pages/aboutAs.php">About Me</a></li>
      </ul>
    </nav>

  </header>
</div>

<?php
    $db=new mysqli('localhost','root','','scdb');
    $db->query("SET NAMES UTF8");
    $all_row=$db->query("SELECT * FROM attractions");
?>
<div class="container">
     <div class="row">
       <div class="fl_right">
         <form class="clear" method="post" action="#">
           <fieldset>
             <legend>Search:</legend>
             <input type="search" value="" placeholder="Search Here&hellip;">
             <button class="fa fa-search" type="submit" title="Search" name="Submit"><em>Search</em></button>
           </fieldset>
         </form>
       </div>
    </div>
    <div class="row">
      <div class="ajax_result">
      <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
        <?php foreach ($all_row as $key => $product) { ?>
        <div class="col-sm-3 col-md-3">
        	<div class="well">
            <a href="#"><img src="product_images/<?php echo $product['image']; ?>"></a>
        		<h2 class="text-info"><?php echo $product['atname']; ?></h2>
        		<p><span class="label label-info">ประเภทของจุดเด่น : <?php echo $product['type_id']; ?></span></p>
        		<p>ที่อยู่: <?php echo $product['adress']; ?></p>
        		<hr>
        		<h3>จุดเด่น: <?php echo $product['typeAttraction']; ?></h3>
        		<hr>
              <p><a class="btn btn-default btn-lg" href="#"><i class="icon-ok"></i>รายละเอียด</a></p>
        	</div>
        </div>
        <?php } ?>
      <?php endif; ?>
     </div>
	</div>
</div>
<div class="wrapper row4 bgded overlay">
  <footer id="footer" class="hoc clear">

    <div class="one_quarter">
      <h6 class="title">ที่อยู่:</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          111, ถนน มหาวิทยาลัย ตำบล สุรนารี อำเภอเมืองนครราชสีมา นครราชสีมา 30000
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +(089) 716 8790<br>
          +(061) 928 3739</li>
        <li><i class="fa fa-fax"></i> +(000) 000 0000</li>
        <li><i class="fa fa-envelope-o"></i> group@hotmail.com</li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Facebook</h6>
      <ul class="nospace linklist">
        <li><a href="https://www.facebook.com/papatson.singsom">Nong Singsom</a></li>
        <li><a href="https://www.facebook.com/numan7031">Nu'man Arsengbaramae</a></li>
        <li><a href="https://www.facebook.com/nmo.wongtripipat">Chanut Wongtripipat</a></li>
        <li><a href="https://www.facebook.com/wasuddd">Wachirakan Sueabua</a></li>
        <li><a href="https://www.facebook.com/bb.chananin">Chananin Be</a></li>
      </ul>
    </div>

  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear">

    <p class="fl_left"> 204334-SCRIPTING LANGUAGE PROGRAMMING/ 2-2560</p>
    <p class="fl_right">By Group22</a></p>

  </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

<script src="layout/scripts/jquery.placeholder.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/fliplightbox.min.js"></script>
<script src="js/functions.js"></script>
<script type="text/javascript">$('.portfolio').flipLightBox()</script>
  <script  src="js/index.js"></script>
</body>
</html>

<script type="text/javascript">
$(document).on('change','.sort_rang',function(){
   var url = "../ajax_search.php";
   $.ajax({
     type: "POST",
     url: url,
     data: $("#search_form").serialize(),
     success: function(data)
     {
        $('.ajax_result').html(data);
     }
   });
  return false;
});
</script>
