<?php
$database = "scdb";

if( isset($_REQUEST['attlat'])&&isset($_REQUEST['attlng']) ){
  $attlat = $_REQUEST['attlat'];
	$attlng = $_REQUEST['attlng'];
}else {
	header("location:restaurantpage.php");
	exit();
}

$conn=mysqli_connect("localhost", "root", "","$database");
	$conn->query("SET NAMES UTF8");
  if (!$conn) {
    die('Not connected : ' . mysql_error());
  }
?>

    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>พื้นที่ใกล้เคียง</title>
        <style type="text/css">
            body { font: normal 10pt Helvetica, Arial; }
            #map { width: 100%; height: 100%; border: 0px; padding: 0px; }
        </style>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyCKqy4qiRmJfaljrynUVX6ZnA8a0IbdQ34&sensor=false" type="text/javascript"></script>
        <script type="text/javascript">

            //Sample code written by August Li
           var icon = new google.maps.MarkerImage();

                      /* var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
                                   new google.maps.Size(32, 32), new google.maps.Point(0, 0),
                                   new google.maps.Point(16, 32));*/



            //var center = null;
            var map = null;
            var currentPopup;

            //var bounds = new google.maps.LatLngBounds();

            function addMarker(lat, lng, info) {
                var pt = new google.maps.LatLng(lat, lng);
                //bounds.extend(pt);

                var marker = new google.maps.Marker({
                    position: pt,
                    icon: icon,
                    map: map
                });
                var popup = new google.maps.InfoWindow({
                    content: info,
                    maxWidth: 300
                });
                google.maps.event.addListener(marker, "click", function() {
                    if (currentPopup != null) {
                        currentPopup.close();
                        currentPopup = null;
                    }
                    popup.open(map, marker);
                    currentPopup = popup;
                });
                google.maps.event.addListener(popup, "closeclick", function() {
                    map.panTo(center);
                    currentPopup = null;
                });
            }
            function initMap() {

                //var uluru = {lat: -33.879917, lng: 151.210449};
                map = new google.maps.Map(document.getElementById("map"), {

                    center: {
                             lat: parseFloat(<?php echo $attlat ?>),
                             lng: parseFloat(<?php echo $attlng ?>)},
                    zoom: 17,

                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                    },
                    navigationControl: true,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.ZOOM_PAN
                    }
                });


<?php
$query = "SELECT * FROM accommodation";
//$result = mysql_query($query);
$result=$conn->query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


while($row = $result->fetch_assoc())
{
  $name = $row['acname'];
  $lat = $row['lat'];
  $lon = $row['lng'];
  $desc = $row['description'];



  echo("addMarker($lat, $lon, '<b>$name</b><br />$desc');\n");

}

?>

 //center = bounds.getCenter();
     //map.fitBounds(bounds);

     }
     </script>
     </head>
     <body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
     <div id="map"></div>
     </body>
     </html>
