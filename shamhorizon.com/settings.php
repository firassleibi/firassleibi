<?
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/function.php");
	if($_SESSION['type'] != 'admin' && $_SESSION['type'] != 'supervisor') {
		header('Location: login.php');
	}


#############################################################
# Edit AND Show
#############################################################

    if($_GET['do'] == 'edit'){
        $sql = "SELECT * FROM `settings` where id=:id";
        $data[id] = '1';
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
		$data['sitename']		          	= trim($_POST['sitename']);
		$data['site_url']		          	= trim($_POST['site_url']);
		$data['site_email']		          	= trim($_POST['site_email']);
		$data['upload_folder']		        = trim($_POST['upload_folder']);
		$data['types_fileupload']		    = trim($_POST['types_fileupload']);
		$data['theme_color']		        = trim($_POST['theme_color']);
		$data['admin_username']		        = trim($_POST['admin_username']);
		$data['admin_password']		        = trim($_POST['admin_password']);
		$data['supervisor_username']		= trim($_POST['supervisor_username']);
		$data['supervisor_password']		= trim($_POST['supervisor_password']);
		$data['sms_gateway']		        = trim($_POST['sms_gateway']);
		$data['sms_username']		        = trim($_POST['sms_username']);
		$data['sms_password']		        = trim($_POST['sms_password']);
		$data['sms_sender']		          	= trim($_POST['sms_sender']);
		$data['customers']		          	= isset($_POST['customers']) ? "yes" : "no" ;
		$data['customers_message']		          	= isset($_POST['customers_message']) ? "yes" : "no" ;
		$data['contacts']		          	= isset($_POST['contacts']) ? "yes" : "no" ;
		$data['files']		          	= isset($_POST['files']) ? "yes" : "no" ;
		$data['contract']		          	= isset($_POST['contract']) ? "yes" : "no" ;
		$data['invoices']		          	= isset($_POST['invoices']) ? "yes" : "no" ;
		
		$where[id] = '1';
		$update = $pdo->pdoInsUpd('settings', $data, 'update', $where);
		header('Location: ?do=edit&process=successfully');
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
			<h1>إدارة العملاء</h1>
		</div> <!-- / .page-header -->

    <?
        $do = $_GET["do"];
        switch($do)
        {
        case "edit":
        include("template/settings/edit.php");
        break;
        case "backup":
        include("template/settings/backup.php");
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