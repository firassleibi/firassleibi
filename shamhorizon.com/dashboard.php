<?
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/function.php");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?= $site_name ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

	<!-- LanderApp's stylesheets -->
	<link href="assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/landerapp.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->
</head>
<body class="<?= $theme_color ?> main-menu-animated right-to-left">
<script>var init = [];</script>


<div id="main-wrapper">

    <? include('main-menu.php') ?>

	<div id="content-wrapper">
		
		<div class="page-header">
			
			<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;ملفاتي</h1>

				
			</div>
		</div> 


		<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">قائمة ملفاتي</span>
					</div>
					<div class="panel-body">
                    <table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>عنوان الملف</th>
									<th>الوصف</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?
								$i = 1;
                                $sql = "SELECT * FROM `files` WHERE customer_id=".$_SESSION['customer_id']."";
                                $rows = $pdo->pdoGetAll($sql);
                                foreach($rows as $result) {
                                ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $result['title'] ?></td>
									<td><?= $result['note'] ?></td>
									<td>
                                    <? if($result['file_type'] == "image/jpeg" || $result['file_type'] == "image/png") { ?>
                                    <a data-toggle="modal" data-target="#myModal<?= $result['id'] ?>" class="btn btn-default" role="button">مشاهدة</a>
                                    <? } else { ?>
                                    <a href="upload/<?= $result['file'] ?>" class="btn btn-default" role="button">مشاهدة</a>
                                    <? } ?>
                                    <a href="download.php?file=<?= $result['file'] ?>" class="btn btn-primary" role="button">تحميل</a>
                                    
<!-- Modal -->
<div class="modal fade" id="myModal<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $result['title'] ?></h4>
      </div>
      <div class="modal-body">
        <img src="upload/<?= $result['file'] ?>" class="img-responsive" alt=""/>
      </div>
    </div>
  </div>
</div>

                                    </td>
								</tr>
                                <? $i++; } ?>
							</tbody>
						</table>


					</div>
				</div>
				
		
	</div> 
    
	<div id="main-menu-bg"></div>
</div>
<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
	<script type="text/javascript"> window.jQuery || document.write('<script src="assets/javascripts/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<!-- LanderApp's javascripts -->
<script src="assets/javascripts/bootstrap.min.js"></script>
<script src="assets/javascripts/landerapp.min.js"></script>

<script type="text/javascript">
	init.push(function () {
		// Javascript code here
	})
	window.LanderApp.start(init);
</script>

</body>
</html>