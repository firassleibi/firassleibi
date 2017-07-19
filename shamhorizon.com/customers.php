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
		$data['name']		          	= trim($_POST['name']);
		$data['mobile']		          	= trim($_POST['mobile']);
		$data['email']		          	= trim($_POST['email']);
		$data['company']				= trim($_POST['company']);
		$data['password']				= trim($_POST['password']);
		$data['note']		          	= trim($_POST['note']);
		$insert 						= $pdo->pdoInsUpd('customers', $data);
		header('Location: ?do=show&process=successfully');
    }

#############################################################
# Edit AND Show
#############################################################

    if($_GET['do'] == 'edit' or $_GET['do'] == 'details'){
        $sql = "SELECT * FROM `customers` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
		$data['name']		          	= trim($_POST['name']);
		$data['mobile']		          	= trim($_POST['mobile']);
		$data['email']		          	= trim($_POST['email']);
		$data['company']				= trim($_POST['company']);
		$data['password']				= trim($_POST['password']);
		$data['note']		          	= trim($_POST['note']);
		$where[id] = $_GET['id'];
		$update = $pdo->pdoInsUpd('customers', $data, 'update', $where);
		header('Location: ?do=show&process=successfully');
    }

#############################################################
# Delete
#############################################################

	if(isset($_GET['del'])){
        $sql = "DELETE FROM `customers` WHERE `id`=:id";
        $data[id] = $_GET['del'];
        $delete = $pdo->pdoExecute($sql, $data);
		header('Location: ?do=show&process=successfully');
    }
    
#############################################################
# Send Message All User
#############################################################

	if(isset($_POST['btn-sendall'])) {
		$sql = "SELECT * FROM `customers` ORDER BY `id` DESC";
		$rows = $pdo->pdoGetAll($sql);
		foreach($rows as $result) {
			$to  = $result['email'];
			$subject = $_POST['subject'];
			$message = '
			<html>
			<head>
			  <title>'.$_POST['subject'].'</title>
			</head>
			<body>'. $_POST['message'].'</body>
			</html>
			';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-utf-8' . "\r\n";
			$headers .= $site_email . "\r\n";
			mail($to, $subject, $message, $headers);
		}
		header('Location: customers.php?do=send_all_message&process=successfully');
	}

#############################################################
# Send Message One User
#############################################################

	if(isset($_POST['btn-sendone'])) {
        $sql = "SELECT * FROM `customers` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
			$to  = $result['email'];
			$subject = $_POST['subject'];
			$message = '
			<html>
			<head>
			  <title>'.$_POST['subject'].'</title>
			</head>
			<body>'. $_POST['message'].'</body>
			</html>
			';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-utf-8' . "\r\n";
			$headers .= $site_email . "\r\n";
			mail($to, $subject, $message, $headers);
		header('Location: customers.php?do=send_all_message&process=successfully');
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
        case "show":
        include("template/customers/show.php");
        break;
        case "add":
        include("template/customers/add.php");
        break;
        case "edit":
        include("template/customers/edit.php");
        break;
        case "details":
        include("template/customers/details.php");
        break;
        case "send_message":
        include("template/customers/send_message.php");
        break;
        case "send_all_message":
        include("template/customers/send_all_message.php");
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