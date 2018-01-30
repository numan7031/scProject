<?php
include("confic.php");
$all_toilet=$db->query("SELECT toilet FROM `attractions` WHERE type_id GROUP BY toilet");
$all_threeGfourG=$db->query("SELECT threeGfourG FROM `attractions` WHERE type_id GROUP BY threeGfourG");
$all_unseen=$db->query("SELECT unseen FROM `attractions` WHERE type_id GROUP BY unseen");
$all_security=$db->query("SELECT security FROM `attractions` WHERE type_id GROUP BY security");
$all_facilitiesfordisabled=$db->query("SELECT facilitiesfordisabled FROM `attractions` WHERE type_id GROUP BY facilitiesfordisabled");
$all_advicefordisabled=$db->query("SELECT advicefordisabled FROM `attractions` WHERE type_id GROUP BY advicefordisabled");
$all_wifi=$db->query("SELECT wifi FROM `attractions` WHERE type_id GROUP BY wifi");
$all_history=$db->query("SELECT history FROM `attractions` WHERE type_id GROUP BY history");
$all_tourdesk=$db->query("SELECT tourdesk FROM `attractions` WHERE type_id GROUP BY tourdesk");
$all_festival=$db->query("SELECT festival FROM `attractions` WHERE type_id GROUP BY festival");
$all_variousnature=$db->query("SELECT variousnature FROM `attractions` WHERE type_id GROUP BY variousnature");
$all_replacein=$db->query("SELECT replacein FROM `attractions` WHERE type_id GROUP BY replacein");
$all_replaceout=$db->query("SELECT replaceout FROM `attractions` WHERE type_id GROUP BY replaceout");
$all_Medical=$db->query("SELECT Medical FROM `attractions` WHERE type_id GROUP BY Medical");
// Filter query
    $sql= "SELECT attracID FROM `attractions` WHERE type_id";
    if(isset($_GET['toilet']) && $_GET['toilet']!="") :
        $toilet = $_GET['toilet'];
        $sql.=" AND toilet IN ('".implode("','",$toilet)."')";
    endif;

    if(isset($_GET['threeGfourG']) && $_GET['threeGfourG']!="") :
        $threeGfourG = $_GET['threeGfourG'];
        $sql.=" AND threeGfourG IN ('".implode("','",$threeGfourG)."')";
    endif;

    if(isset($_GET['unseen']) && $_GET['unseen']!="") :
        $unseen = $_GET['unseen'];
        $sql.=" AND unseen IN (".implode(',',$unseen).")";
    endif;

    if(isset($_GET['security']) && $_GET['security']!="") :
        $security = $_GET['security'];
        $sql.=" AND security IN (".implode(',',$security).")";
    endif;

    if(isset($_GET['facilitiesfordisabled']) && $_GET['facilitiesfordisabled']!="") :
        $facilitiesfordisabled = $_GET['facilitiesfordisabled'];
        $sql.=" AND facilitiesfordisabled IN (".implode(',',$facilitiesfordisabled).")";
    endif;

    if(isset($_GET['advicefordisabled']) && $_GET['advicefordisabled']!="") :
        $advicefordisabled = $_GET['advicefordisabled'];
        $sql.=" AND advicefordisabled IN (".implode(',',$advicefordisabled).")";
    endif;

    if(isset($_GET['wifi']) && $_GET['wifi']!="") :
        $wifi = $_GET['wifi'];
        $sql.=" AND wifi IN (".implode(',',$wifi).")";
    endif;

    if(isset($_GET['history']) && $_GET['history']!="") :
        $history = $_GET['history'];
        $sql.=" AND history IN (".implode(',',$history).")";
    endif;

    if(isset($_GET['tourdesk']) && $_GET['tourdesk']!="") :
        $tourdesk = $_GET['tourdesk'];
        $sql.=" AND tourdesk IN (".implode(',',$tourdesk).")";
    endif;

    if(isset($_GET['festival']) && $_GET['festival']!="") :
        $festival = $_GET['festival'];
        $sql.=" AND festival IN (".implode(',',$festival).")";
    endif;

    if(isset($_GET['variousnature']) && $_GET['variousnature']!="") :
        $variousnature = $_GET['variousnature'];
        $sql.=" AND variousnature IN (".implode(',',$variousnature).")";
    endif;

    if(isset($_GET['replacein']) && $_GET['replacein']!="") :
        $replacein = $_GET['replacein'];
        $sql.=" AND replacein IN (".implode(',',$replacein).")";
    endif;

    if(isset($_GET['replaceout']) && $_GET['replaceout']!="") :
        $replaceout = $_GET['replaceout'];
        $sql.=" AND replaceout IN (".implode(',',$replaceout).")";
    endif;

    if(isset($_GET['Medical']) && $_GET['Medical']!="") :
        $Medical = $_GET['Medical'];
        $sql.=" AND Medical IN (".implode(',',$Medical).")";
    endif;


    $all_attractions=$db->query($sql);
    $content_per_page = 3;
    $rowcount=mysqli_num_rows($all_attractions);
    $total_data = ceil($rowcount / $content_per_page);
    function data_clean($str)
    {
        return str_replace(' ','_',$str);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content='Karthick muthu' name='author'/>
        <link href='http://www.mostlikers.com/favicon.ico' rel='icon' type='image/x-icon'/>
        <title>Product Brand,Size,Material Checkbox Search Filtering Using PHP And Jquery</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type='text/css' href="_/plugins/bootstrap.min.css">
        <link rel="stylesheet" type='text/css' href="_/plugins/font-awesome.css">
        <link rel="stylesheet" type='text/css' href="_/css/style.css">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <script src="_/plugins/jquery.js"></script>
    </head>
    <body>

        <!-- content -->
        <div class="container-fluid">
            <form method="get" id="search_form">

                <div class="row">
                    <!-- sidebar -->
                    <aside class="col-lg-3 col-md-4">
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_toilet as $key => $new_toilet) :
                                    if(isset($_GET['toilet'])) :
                                        if(in_array(data_clean($new_toilet['toilet']),$_GET['toilet'])) :
                                            $check='checked="checked"';
                                        else : $check="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_toilet['toilet']);?>" <?=@$check?> name="toilet[]" class="sort_rang brand"><?=ucfirst($new_toilet['toilet']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelTwo" aria-expanded="true">Shop by Material</h3></div>
                            <div class="panel-body collapse in" id="panelTwo">
                                <ul class="list-group">
                                <?php foreach ($all_threeGfourG as $key => $new_threeGfourG) :
                                    if(isset($_GET['threeGfourG'])) :
                                        if(in_array(data_clean($new_threeGfourG['threeGfourG']),$_GET['threeGfourG'])) :
                                            $threeGfourG_check='checked="checked"';
                                        else : $threeGfourG_check="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_threeGfourG['threeGfourG']); ?>" <?=@$threeGfourG_check?>  name="threeGfourG[]" class="sort_rang material"><?=ucfirst($new_threeGfourG['threeGfourG']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelThree" aria-expanded="true">Shop by Size</h3></div>
                            <div class="panel-body collapse out" id="panelThree">
                                <ul class="list-group">
                                    <?php foreach ($all_unseen as $key => $new_unseen) :
                                        if(isset($_GET['unseen'])) :
                                            if(in_array($new_unseen['unseen'],$_GET['unseen'])) :
                                                $unseen_check='checked="checked"';
                                            else : $unseen_check="";
                                            endif;
                                        endif;
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_unseen['unseen']; ?>" <?=@$unseen_check?>  name="unseen[]" class="sort_rang size"><?=$new_unseen['unseen']; ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_security as $key => $new_security) :
                                    if(isset($_GET['security'])) :
                                        if(in_array(data_clean($new_security['security']),$_GET['security'])) :
                                            $check_security='checked="checked"';
                                        else : $check_security="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_security['security']);?>" <?=@$check_security?> name="security[]" class="sort_rang brand"><?=ucfirst($new_security['security']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_facilitiesfordisabled as $key => $new_facilitiesfordisabled) :
                                    if(isset($_GET['facilitiesfordisabled'])) :
                                        if(in_array(data_clean($new_facilitiesfordisabled['facilitiesfordisabled']),$_GET['facilitiesfordisabled'])) :
                                            $check_fac='checked="checked"';
                                        else : $check_fac="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_facilitiesfordisabled['facilitiesfordisabled']);?>" <?=@$check_fac?> name="facilitiesfordisabled[]" class="sort_rang brand"><?=ucfirst($new_facilitiesfordisabled['facilitiesfordisabled']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_advicefordisabled as $key => $new_advicefordisabled) :
                                    if(isset($_GET['advicefordisabled'])) :
                                        if(in_array(data_clean($new_advicefordisabled['advicefordisabled']),$_GET['advicefordisabled'])) :
                                            $check_adv='checked="checked"';
                                        else : $check_adv="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_advicefordisabled['advicefordisabled']);?>" <?=@$check_adv?> name="advicefordisabled[]" class="sort_rang brand"><?=ucfirst($new_advicefordisabled['advicefordisabled']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_wifi as $key => $new_wifi) :
                                    if(isset($_GET['wifi'])) :
                                        if(in_array(data_clean($new_wifi['wifi']),$_GET['wifi'])) :
                                            $check_wifi='checked="checked"';
                                        else : $check_wifi="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_wifi['wifi']);?>" <?=@$check_wifi?> name="wifi[]" class="sort_rang brand"><?=ucfirst($new_wifi['wifi']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_history as $key => $new_history) :
                                    if(isset($_GET['history'])) :
                                        if(in_array(data_clean($new_history['history']),$_GET['history'])) :
                                            $check_history='checked="checked"';
                                        else : $check_history="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_history['history']);?>" <?=@$check_history?> name="history[]" class="sort_rang brand"><?=ucfirst($new_history['history']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_tourdesk as $key => $new_tourdesk) :
                                    if(isset($_GET['tourdesk'])) :
                                        if(in_array(data_clean($new_tourdesk['tourdesk']),$_GET['tourdesk'])) :
                                            $check_tourdesk='checked="checked"';
                                        else : $check_tourdesk="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_tourdesk['tourdesk']);?>" <?=@$check_tourdesk?> name="tourdesk[]" class="sort_rang brand"><?=ucfirst($new_tourdesk['tourdesk']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_festival as $key => $new_festival) :
                                    if(isset($_GET['festival'])) :
                                        if(in_array(data_clean($new_festival['festival']),$_GET['festival'])) :
                                            $check_festival='checked="checked"';
                                        else : $check_festival="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_festival['festival']);?>" <?=@$check_festival?> name="festival[]" class="sort_rang brand"><?=ucfirst($new_festival['festival']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_variousnature as $key => $new_variousnature) :
                                    if(isset($_GET['variousnature'])) :
                                        if(in_array(data_clean($new_variousnature['variousnature']),$_GET['variousnature'])) :
                                            $check_var='checked="checked"';
                                        else : $check_var="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_variousnature['variousnature']);?>" <?=@$check_var?> name="variousnature[]" class="sort_rang brand"><?=ucfirst($new_variousnature['variousnature']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_replacein as $key => $new_replacein) :
                                    if(isset($_GET['replacein'])) :
                                        if(in_array(data_clean($new_replacein['replacein']),$_GET['replacein'])) :
                                            $check_rep='checked="checked"';
                                        else : $check_rep="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_replacein['replacein']);?>" <?=@$check_rep?> name="replacein[]" class="sort_rang brand"><?=ucfirst($new_replacein['replacein']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_replaceout as $key => $new_replaceout) :
                                    if(isset($_GET['replaceout'])) :
                                        if(in_array(data_clean($new_replaceout['replaceout']),$_GET['replaceout'])) :
                                            $check_out='checked="checked"';
                                        else : $check_out="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_replaceout['replaceout']);?>" <?=@$check_out?> name="replaceout[]" class="sort_rang brand"><?=ucfirst($new_replaceout['replaceout']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_Medical as $key => $new_Medical) :
                                    if(isset($_GET['Medical'])) :
                                        if(in_array(data_clean($new_Medical['Medical']),$_GET['Medical'])) :
                                            $check_Medical='checked="checked"';
                                        else : $check_Medical="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_Medical['Medical']);?>" <?=@$check_Medical?> name="Medical[]" class="sort_rang brand"><?=ucfirst($new_Medical['Medical']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </aside> <!-- /.sidebar -->
                    <section class="col-lg-9 col-md-8">
                        <div class="row">
                            <div id="results"></div>
                        </div>
                    </section>
                </div>
            </form>
        </div> <!-- /.content -->
        <!-- external -->
    </div>
        <script src="_/plugins/bootstrap.min.js"></script>
        <script src="_/js/script.js"></script>
    </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
    var total_record = 0;
    var toilet=check_box_values('toilet');
    var threeGfourG=check_box_values('threeGfourG');
    var unseen=check_box_values('unseen');
    var security=check_box_values('security');
    var facilitiesfordisabled=check_box_values('facilitiesfordisabled');
    var advicefordisabled=check_box_values('advicefordisabled');
    var wifi=check_box_values('wifi');
    var history=check_box_values('history');
    var tourdesk=check_box_values('tourdesk');
    var festival=check_box_values('festival');
    var variousnature=check_box_values('variousnature');
    var replacein=check_box_values('replacein');
    var replaceout=check_box_values('replaceout');
    var Medical=check_box_values('Medical');
    var total_groups = <?php echo $total_data; ?>;

    $('#results').load("auload.php?group_no="+total_record+"&toilet="+toilet+"&threeGfourG="+threeGfourG+"&unseen="+unseen+"&security="+security+"&facilitiesfordisabled="+facilitiesfordisabled+"&advicefordisabled="+advicefordisabled+"&wifi="+wifi+"&history="+history+"&tourdesk="+tourdesk+"&festival="+festival+"&variousnature="+variousnature+"&replacein="+replacein+"&replaceout="+replaceout+"&Medical="+Medical,
     function() {
        total_record++;
    });
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height())

        {
            if(total_record <= total_groups)
            {
                loading = true;
                $('.loader').show();
                $.get("auload.php?group_no="+total_record+"&toilet="+toilet+"&threeGfourG="+threeGfourG+"&unseen="+unseen+"&security="+security+"&facilitiesfordisabled="+facilitiesfordisabled+"&advicefordisabled="+advicefordisabled+"&wifi="+wifi+"&history="+history+"&tourdesk="+tourdesk+"&festival="+festival+"&variousnature="+variousnature+"&replacein="+replacein+"&replaceout="+replaceout+"&Medical="+Medical,
                function(data){
                if (data != "") {
                    $("#results").append(data);
                    $('.loader').hide();
                    total_record++;
                }
                });
            }
                // total_record ++;
        }
    });
    function check_box_values(check_box_class){
        var values = new Array();
            $("."+check_box_class+":checked").each(function() {
               values.push($(this).val());
            });
        return values;
    }
    $('.sort_rang').change(function(){
        $("#search_form").submit();
        return false;
    });
});
</script>
