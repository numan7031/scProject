<?php
include("config.php");
$all_brand=$db->query("SELECT distinct brand FROM `products` WHERE category_id = '1' GROUP BY brand");
$all_material=$db->query("SELECT distinct material FROM `products` WHERE category_id = '1' GROUP BY material");
$all_size=$db->query("SELECT distinct size FROM `products` WHERE category_id = '1' GROUP BY size");
// Filter query
    $sql= "SELECT distinct id FROM `products` WHERE category_id = '1'";
    if(isset($_GET['brand']) && $_GET['brand']!="") :
        $brand = $_GET['brand'];
        $sql.=" AND brand IN ('".implode("','",$brand)."')";
    endif;

    if(isset($_GET['material']) && $_GET['material']!="") :
        $material = $_GET['material'];
        $sql.=" AND material IN ('".implode("','",$material)."')";
    endif;

    if(isset($_GET['size']) && $_GET['size']!="") :
        $size = $_GET['size'];
        $sql.=" AND size IN (".implode(',',$size).")";
    endif;
    $all_product=$db->query($sql);
    $content_per_page = 3;
    $rowcount=mysqli_num_rows($all_product);
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
    <div class="content"> <!-- content -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle -->
                    <div class="navbar-header" id="branding">
                        <h1><a class="navbar-brand" href="http://www.mostlikers.com/2016/10/brand-size-checkbox-search-filter-using-php-jquery.html">Mostlikers</a></h1>
                    </div>
                    <!-- nav links -->
                    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                       <form action="http://www.google.com/search" class="searchform" method="get" name="searchform" target="_blank">
                            <input name="sitesearch" type="hidden" value="www.mostlikers.com">
                            <input autocomplete="on" class="form-controls search" name="q" placeholder="Search in mostlikers.com..." required="required" style="border: 1px solid #ccc;border-radius: 3px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);padding: 6.7px 27px;     min-width: 13px;" type="text">
                            <input name="cof" type="hidden" value="FORID:11">
                            <input name="ie" type="hidden" value="ISO-8859-1">
                            <button class="btn btn-primary" type="submit">Search <i class="icon icon-search"></i></button>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>

        <!-- content -->
        <div class="container-fluid">
            <form method="get" id="search_form">
                <div class="row">
                    <div class="panel list">
                      <div class="col-sm-12">
                         <!-- remove this google ads -->
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                    <!-- header_responsive_ads -->
                                    <ins class="adsbygoogle"
                                         style="display:block"
                                         data-ad-client="ca-pub-9665679251236729"
                                         data-ad-slot="9239985429"
                                         data-ad-format="auto"></ins>
                                    <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                         <!-- remove this google ads -->
                      </div>
                    </div>
                </div>
                <div class="row">
                    <!-- sidebar -->
                    <aside class="col-lg-3 col-md-4">
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_brand as $key => $new_brand) :
                                    if(isset($_GET['brand'])) :
                                        if(in_array(data_clean($new_brand['brand']),$_GET['brand'])) :
                                            $check='checked="checked"';
                                        else : $check="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_brand['brand']);?>" <?=@$check?> name="brand[]" class="sort_rang brand"><?=ucfirst($new_brand['brand']); ?></label></div>
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
    var brand=check_box_values('brand');
    var material=check_box_values('material');
    var size=check_box_values('size');
    var total_groups = <?php echo $total_data; ?>;
    $('#results').load("autoload.php?group_no="+total_record+"&brand="+brand+"&material="+material+"&size="+size,  function() {
        total_record++;
    });
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height())

        {
            if(total_record <= total_groups)
            {
                loading = true;
                $('.loader').show();
                $.get("autoload.php?group_no="+total_record+"&brand="+brand+"&material="+material+"&size="+size,
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
