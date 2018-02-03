<?php require_once('../confic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Live Data Search (Ajax, PHP and MySQLi)</title>

    <!-- Bootstrap Core Css -->
    <link href="css/bootstrap.css" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/app_style.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	.li-post-group {
		background: #f5f5f5;
		padding: 5px 10px;
		border-bottom: solid 1px #CFCFCF;
		margin-top: 5px;
	}
	.li-post-title {
		border-left: solid 4px #304d49;
		background: #a7d4d2;
		padding: 5px;
		color: #304d49;
	}
	.show-more {
	    background: #10c1b9;
	    width: 100%;
	    text-align: center;
	    padding: 10px;
	    border-radius: 5px;
	    margin: 5px;
	    color: #fff;
	    cursor: pointer;
	    font-size: 20px;
	    display: none;
	    margin: 0px;
    	margin-top: 25px;
	}
	.li-post-desc {
	    line-height: 15px !important;
	    font-size: 12px;
	    box-shadow: inset 0px 0px 5px #7d9c9b;
	    padding: 10px;
	}
	.panel-default {
	    margin-bottom: 100px;
	}
	.post-data-list {
	    max-height: 374px;
	    overflow-y: auto;
	}
	.radio-inline {
	    font-size: 20px;
	    color: #c36928;
	}
	</style>
</head>
<body>
    <div class="all-content-wrapper">
		<!-- Top Bar -->

		<!-- #END# Top Bar -->

		<section class="container">
			<div class="form-group custom-input-space has-feedback">
				<div class="page-heading">
					<h3 class="post-title">Live Data Search (Ajax, PHP and MySQLi) - Learn Infinity</h3>
				</div>
				<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading">Post Details:</div>
								<div class="panel-body">


									<div class="form-group">
										<label>Search Key:</label> <br/>
										<div class="radio-inline">
										  <label><input type="radio" value="single" name="search_type" checked>Single Key</label>
										</div>
										<div class="radio-inline">
										  <label><input type="radio" value="many" name="search_type">Random Key</label>
										</div>
									</div>

									<div class="form-group">
										<label>Search Key:</label>
										<input type="text" name="search-key" id="search-key" class="form-control" placeholder="Search Key like 'Laravel, 'PHP', 'Auth', 'auto load', 'CRUD' ect.,">
									</div>

									<div class="post-data-list">
									<?php
									//get rows query
									$query = mysqli_query($con, "SELECT * FROM attractions ORDER BY attracID DESC");
									//number of rows
									$rowCount = mysqli_num_rows($query);
									if($rowCount > 0){
										while($row = mysqli_fetch_assoc($query)){
									?>
										<div class="li-post-group">
											<h4 class="li-post-title"><?php echo ucfirst($row["atname"]); ?></h4>
											<p class="li-post-desc"><?php echo ucfirst($row["typeAttraction"]); ?></p>
										</div>
									<?php
										}
									}
									?>
									</div>

								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</section>
    </div>

	<!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>

	<script>

	$(document).ready(function(e){

		$(document).on('keyup', '#search-key', function(e){
			getPostList();
		});
		$(document).on('change', 'input[name="search_type"]', function(e){
			getPostList();
		});

		var jqxhr = {abort: function () {}};

		function getPostList(){
			$search_key = $('#search-key').val();
			$search_type = $("input[name='search_type']:checked").val();
			//$('.load-post').show();
			$('.post-data-list').html('');
			jqxhr.abort();
			jqxhr = $.ajax({
				type:'POST',
				dataType: "json",
				url:'ajax_search.php',
				data:{ 'action':'showPost', 'search_key':$search_key , 'search_type':$search_type},
				success:function(data){
					$('.load-post').hide();
					$.each(data, function(key, post){
						$('.post-data-list').append('<div class="li-post-group">\
										<h4 class="li-post-title">'+post.atname+'</h4>\
										<p class="li-post-desc">'+post.typeAttraction+'</p>\
									</div>');
				    });
				}
			});

		}

	});
	</script>
</body>
</html>
