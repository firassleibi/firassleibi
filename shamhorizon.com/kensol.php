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
		$data['a1']		          	= trim($_POST['a1']);
		$data['a2']		          	= trim($_POST['a2']);
		$data['a3']		          	= trim($_POST['a3']);
		$data['a4']		          	= trim($_POST['a4']);
		$data['a5']		          	= trim($_POST['a5']);
		$data['a6']		          	= trim($_POST['a6']);
		$data['a7']		          	= trim($_POST['a7']);
		$data['a8']		          	= trim($_POST['a8']);
		$data['a9']		          	= trim($_POST['a9']);
		$data['a10']		          	= trim($_POST['a10']);
		$data['a11']		          	= trim($_POST['a11']);
		$data['a12']		          	= trim($_POST['a12']);
		$data['a13']		          	= trim($_POST['a13']);
		$data['a14']		          	= trim($_POST['a14']);
		$data['a15']		          	= trim($_POST['a15']);
		$data['a16']		          	= trim($_POST['a16']);
		$data['a17']		          	= trim($_POST['a17']);
		$data['a18']		          	= trim($_POST['a18']);
		$insert 						= $pdo->pdoInsUpd('kayd', $data);
		header('Location: ?do=show&process=successfully');
    }

#############################################################
# Edit AND Show
#############################################################

    if($_GET['do'] == 'edit' or $_GET['do'] == 'details'){
        $sql = "SELECT * FROM `kayd` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
		$data['a1']		          	= trim($_POST['a1']);
		$data['a2']		          	= trim($_POST['a2']);
		$data['a3']		          	= trim($_POST['a3']);
		$data['a4']		          	= trim($_POST['a4']);
		$data['a5']		          	= trim($_POST['a5']);
		$data['a6']		          	= trim($_POST['a6']);
		$data['a7']		          	= trim($_POST['a7']);
		$data['a8']		          	= trim($_POST['a8']);
		$data['a9']		          	= trim($_POST['a9']);
		$data['a10']		          	= trim($_POST['a10']);
		$data['a11']		          	= trim($_POST['a11']);
		$data['a12']		          	= trim($_POST['a12']);
		$data['a13']		          	= trim($_POST['a13']);
		$data['a14']		          	= trim($_POST['a14']);
		$data['a15']		          	= trim($_POST['a15']);
		$data['a16']		          	= trim($_POST['a16']);
		$data['a17']		          	= trim($_POST['a17']);
		$data['a18']		          	= trim($_POST['a18']);
		$where[id] = $_GET['id'];
		$update = $pdo->pdoInsUpd('kayd', $data, 'update', $where);
		header('Location: ?do=show&process=successfully');
    }

#############################################################
# Delete
#############################################################

	if(isset($_GET['del'])){
        $sql = "DELETE FROM `kayd` WHERE `id`=:id";
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
			<h1>التمديد القنصلي</h1>
		</div> <!-- / .page-header -->
		<form method="get" action="kensol/index.php">
		<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									الرقم
								</td>
								<td>
									<input name="num" type="text" class="form-control" id="num">
								</td>
							</tr>
							<tr>
								<td>
									التاريخ
								</td>
								<td>
									<input name="date" type="text" class="form-control" id="date">
								</td>


							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnadd" id="btnadd" value="موافق"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
		</form>
		
		

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