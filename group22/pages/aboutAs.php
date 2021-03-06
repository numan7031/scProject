
<!DOCTYPE html>

<html>
<head>
<title>Attractions</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../css/jquery.bxslider.css">
<link rel="stylesheet" href="../css/style1.css">
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
        <li><a href="../index4.php">Home</a></li>
        <li><a class="drop" href="#">ค้นหาสถานที่</a>
          <ul>
            <li><a href="../pages/publicSearch1.php">ค้นหาสถานที่ท่องเที่ยว</a></li>
            <li><a href="../search/publicSearch2.php">ค้นหาร้านอาหาร</a></li>
            <li><a href="../search/publicSearch3.php">ค้นหาร้านขายของที่ระลึก</a></li>
            <li><a href="../search/publicSearch4.php">ค้นหาสถานที่พักผ่อน</a></li>
          </ul>
          <li><a class="drop" href="#">ข้อมูลสถานที่</a>
            <ul>

              <li><a href="../indexRes.php">ร้านอาหาร</a></li>
              <li><a href="../indexSurv.php">ร้านขายของที่ระลึก</a></li>
              <li><a href="../indexAccom.php">สถานที่พักผ่อน</a></li>
            </ul>
          </li>
        </li>
      
        <li><a href="../pages/aboutAs.php">About Me</a></li>
      </ul>
    </nav>


  </header>
</div>
<center>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../img/gg.jpg" style="width:50%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../img/dd.jpg" style="width:50%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../img/ds.jpg" style="width:50%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
</center>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>
<table width="50" height="100" align ="center">
  <tr><td><p>สถานที่ท่องเที่ยวในประเทศไทย</p></td>
    <td>เป็นส่วนหนึ่งของรายวิชา 204334-SCRIPTING LANGUAGE PROGRAMMING<br>
    โดยจัดทำขึ้นเพื่อ แนะนำสถานที่ท่องเที่ยวภายในประเทศ ถือเป็นการส่งเสริมการท่องเที่ยวภายในประเทศ<br>
    และเป็นการพัฒนาสู่ความเป็นมืออาชีพในการทำเว็บไซต์ เพื่อนำไปประกอบอาชีพเมื่อจบการศึกษา</td>
    <tr><td><p>โดยสมาชิกประกอบด้วย</p></td>
    <td>1. นายชนุตร์ วงศ์ไตรพิพัฒน์ รหัสนักศึกษา B5577736<br>
    2. นางสาวประภัสสร  สิงห์ซอม รหัสนักศึกษา B5771653<br>
    3. นายนุมาน อาเซ็งบาราแม รหัสนักศึกษา B5774500<br>
    4. นางสาววชิรกาญจน์ เสือบัว รหัสนักศึกษา B5871612<br>
    5. นางสาวชนานินทร์ สุขแสนสุข รหัสนักศึกษา B5871940</td></tr>
    <tr><td></td><td>สำนักวิชาเทคโนโลยีสังคม สาขาวิชาเทคโนโลยีสารสนเทศ<br>
    มหาวิทยาลัยเทคโนโลยีสุรนารี</td></tr>
  </table>
<div class="wrapper row4 bgded overlay" style="background-image:url('images/demo/backgrounds/03.png');">
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
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>

<script src="../layout/scripts/jquery.placeholder.min.js"></script>
<script src="../js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../js/bootstrap.min.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="../js/fliplightbox.min.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript">$('.portfolio').flipLightBox()</script>
  <script  src="../js/index.js"></script>
</body>
</html>
