<?php
    $db=new mysqli('localhost','root','','scdb');
    $db->query("SET NAMES UTF8");
    $sql="SELECT * FROM attractions";
    extract($_POST);
    if(isset($type_id))
    	$sql.=" WHERE type_id IN (".implode(',', $type_id).")";
    $all_row=$db->query($sql);
?>
<?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
    <?php foreach ($all_row as $key => $product) { ?>
    <div class="col-sm-3 col-md-3">
    	<div class="well">
        <figure><a href="#"><img src="../img/<?php echo $product['image']; ?>" style="width:320px;height:210px;"></a>
        </figure>
    		<h2 class="text-info"><?php echo $product['atname']; ?></h2>
    		<p><span class="label label-info">ประเภทของจุดเด่น : <?php echo $product['type_id']; ?></span></p>
    		<p>ที่อยู่: <?php echo $product['adress']; ?></p>
    		<hr>
    		<h3>จุดเด่น: <?php echo $product['typeAttraction']; ?></h3>
    		<hr>
          <figcaption><a class="btn small" href="actractionpage.php?id=<?php echo $product["attracID"]; ?>">ดูรายละเอียด</a></figcaption>
    	</div>
    </div>
   <?php } ?>
<?php endif; ?>
