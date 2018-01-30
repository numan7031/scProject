<?php
include("confic.php");
$content_per_page = 3;
$group_no  = strtolower(trim(str_replace("/","",$_REQUEST['group_no'])));
$start = ceil($group_no * $content_per_page);
$sql= "SELECT distinct * FROM `attractions` WHERE type_id";
    if(isset($_REQUEST['toilet']) && $_REQUEST['toilet']!="") :
		$toilet = explode(',',url_clean($_REQUEST['toilet']));
	    $sql.=" AND toilet IN ('".implode("','",$toilet)."')";
	endif;

    if(isset($_GET['threeGfourG']) && $_GET['threeGfourG']!="") :
		$threeGfourG = explode(',',url_clean($_REQUEST['threeGfourG']));
        $sql.=" AND threeGfourG IN ('".implode("','",$threeGfourG)."')";
    endif;

    if(isset($_GET['unseen']) && $_GET['unseen']!="") :
		$unseen = explode(',',$_REQUEST['unseen']);
        $sql.=" AND unseen IN (".implode(',',$unseen).")";
    endif;
    if(isset($_REQUEST['security']) && $_REQUEST['security']!="") :
		$security = explode(',',url_clean($_REQUEST['security']));
	    $sql.=" AND security IN ('".implode("','",$security)."')";
	endif;
  if(isset($_REQUEST['facilitiesfordisabled']) && $_REQUEST['facilitiesfordisabled']!="") :
  $facilitiesfordisabled = explode(',',url_clean($_REQUEST['facilitiesfordisabled']));
    $sql.=" AND facilitiesfordisabled IN ('".implode("','",$facilitiesfordisabled)."')";
endif;
if(isset($_REQUEST['advicefordisabled']) && $_REQUEST['advicefordisabled']!="") :
$advicefordisabled = explode(',',url_clean($_REQUEST['advicefordisabled']));
  $sql.=" AND advicefordisabled IN ('".implode("','",$advicefordisabled)."')";
endif;
if(isset($_REQUEST['wifi']) && $_REQUEST['wifi']!="") :
$wifi = explode(',',url_clean($_REQUEST['wifi']));
  $sql.=" AND wifi IN ('".implode("','",$wifi)."')";
endif;
if(isset($_REQUEST['history']) && $_REQUEST['history']!="") :
$history = explode(',',url_clean($_REQUEST['history']));
  $sql.=" AND history IN ('".implode("','",$history)."')";
endif;
if(isset($_REQUEST['tourdesk']) && $_REQUEST['tourdesk']!="") :
$tourdesk = explode(',',url_clean($_REQUEST['tourdesk']));
  $sql.=" AND tourdesk IN ('".implode("','",$tourdesk)."')";
endif;
if(isset($_REQUEST['festival']) && $_REQUEST['festival']!="") :
$festival = explode(',',url_clean($_REQUEST['festival']));
  $sql.=" AND festival IN ('".implode("','",$festival)."')";
endif;
if(isset($_REQUEST['variousnature']) && $_REQUEST['variousnature']!="") :
$variousnature = explode(',',url_clean($_REQUEST['variousnature']));
  $sql.=" AND variousnature IN ('".implode("','",$variousnature)."')";
endif;
if(isset($_REQUEST['replacein']) && $_REQUEST['replacein']!="") :
$replacein = explode(',',url_clean($_REQUEST['replacein']));
  $sql.=" AND replacein IN ('".implode("','",$replacein)."')";
endif;
if(isset($_REQUEST['replaceout']) && $_REQUEST['replaceout']!="") :
$replaceout = explode(',',url_clean($_REQUEST['replaceout']));
  $sql.=" AND replaceout IN ('".implode("','",$replaceout)."')";
endif;
if(isset($_REQUEST['Medical']) && $_REQUEST['Medical']!="") :
$Medical = explode(',',url_clean($_REQUEST['Medical']));
  $sql.=" AND Medical IN ('".implode("','",$Medical)."')";
endif;
	$sql.=" LIMIT $start, $content_per_page";
	$all_attractions=$db->query($sql);
    $rowcount=mysqli_num_rows($all_attractions);
	// echo $sql; exit;

    function url_clean($String)
    {
    	return str_replace('_',' ',$String);
    }
?>

<!-- listing -->
        <?php if(isset($all_attractions) && count($all_attractions) && $rowcount > 0) : $i = 0; ?>
            <?php foreach ($all_attractions as $key => $attractions) : ?>
                <article class="col-md-4 col-sm-6">
                    <div class="thumbnail product">
                        <figure>
                            <a href="#"><img src="product_images/<?php echo $attractions['image']; ?>" alt="<?php echo $attractions['atname']; ?>" /></a>
                        </figure>
                        <div class="caption">
                            <a href="" class="product-name"><?php echo $attractions['atname']; ?></a>
                            <div class="price">Rs.<?php echo $attractions['price']; ?>/-</div>
                            <h6>Address : <?php echo $attractions['adress']; ?></h6>
                            <h6>Traveladvice : <?php echo $attractions['traveladvice']; ?></h6>
                            <h6>AttracID : <?php echo $attractions['attracID']; ?></h6>
                            <h6>สิ่งที่มี : <?php echo $attractions['toilet']; ?></h6>
                            <h6> : <?php echo $attractions['threeGfourG']; ?></h6>
                            <h6> : <?php echo $attractions['wifi']; ?></h6>
                        </div>
                    </div>
                </article>
            <?php $i++; endforeach; ?>
        <?php endif; ?>

<!-- /.listing -->
