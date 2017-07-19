<?
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/function.php");
	if($_SESSION['type'] != 'admin' && $_SESSION['type'] != 'supervisor') {
		header('Location: login.php');
	}

#############################################################
# Add
############################################################# 

    if(isset($_POST['btnadd'])) {
		$data['title']		          	= trim($_POST['title']);
		$data['price']		          	= trim($_POST['price']);
		$data['customers_id']		    = trim($_POST['customer_id']);
		$data['terms']		          	= trim($_POST['terms']);
		$insert 						= $pdo->pdoInsUpd('invoices', $data);
		
		$services = $_POST['services'];
		$services_price = $_POST['services_price'];
		$invoices_id = $id = $pdo->pdoLastInsertId();
		$i = 0;
		
		foreach ($services as $service){

			$data2['service']		    = $service;
			$data2['service_price']		    = $services_price[$i];
			$data2['invoices_id']		    = $invoices_id;

			
			$insert2 						= $pdo->pdoInsUpd('invoices_services', $data2);
			$i++;
		}


		header('Location: ?do=show&process=successfully');
    }

#############################################################
# Edit
#############################################################

    if($_GET['do'] == 'edit' or $_GET['do'] == 'invoices'){
        $sql = "SELECT * FROM `invoices` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
		$data['title']		          	= trim($_POST['title']);
		$data['price']		          	= trim($_POST['price']);
		$data['customers_id']		    = trim($_POST['customer_id']);
		$data['services']		        = trim($_POST['services']);
		$data['terms']		          	= trim($_POST['terms']);
		$where[id] = $_GET['id'];
		$update = $pdo->pdoInsUpd('invoices', $data, 'update', $where);
		
				###################  edit seveses #######################
				foreach($_POST['services'] as $service_id => $service) {
					$data2['service']		          	= $_POST['services'][$service_id];
					$data2['service_price']		        = $_POST['services_price'][$service_id];
					
					$where2[id] = $service_id;
					$update2 = $pdo->pdoInsUpd('invoices_services', $data2, 'update', $where2);
				}
				
				###################  add new seveses #######################
				
				
				if(isset($_POST['add_services'])){
					$new_services = $_POST['new_services'];
					$new_services_price = $_POST['new_services_price'];
					$invoices_id = $_GET['id'];
					$i = 0;
					
					foreach ($new_services as $service){
						$data2['service']		    = $service;
						$data2['service_price']		    = $new_services_price[$i];
						$data2['invoices_id']		    = $invoices_id;
						$insert2 						= $pdo->pdoInsUpd('invoices_services', $data2);
						$i++;
					}
				}
		header('Location: ?do=show&process=successfully');
    }

#############################################################
# Delete
#############################################################

	if(isset($_GET['del'])){
        $sql = "DELETE FROM `invoices` WHERE `id`=:id";
        $data[id] = $_GET['del'];
        $delete = $pdo->pdoExecute($sql, $data);
		header('Location: ?do=show&process=successfully');
    }
  
  
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

<body class="<?= $theme_color ?> main-menu-animated right-to-left page-invoice">

<script>var init = [];</script>

<div id="main-wrapper">

<? include('main-menu.php') ?>

	<div id="content-wrapper">

		<div class="page-header">
			<h1>إدارة الملفات</h1>
            <? if($_GET['do'] == 'invoices') { ?>
            			<a href="invoices_print.php?id=<?= $_GET['id'] ?>" class="pull-right btn btn-primary" style="display: block;" target="_blank"><i class="fa fa-print"></i>&nbsp;&nbsp;طباعة الفاتورة</a>
			<? } ?>
		</div> <!-- / .page-header -->
        

    <?
        $do = $_GET["do"];
        switch($do)
        {
        case "show":
        include("template/invoices/show.php");
        break;
        case "add":
        include("template/invoices/add.php");
        break;
        case "edit":
        include("template/invoices/edit.php");
        break;
        case "invoices":
        include("template/invoices/invoices.php");
        break;
        }
    
    ?>
		
		

	</div> <!-- / #content-wrapper -->
	<div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

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