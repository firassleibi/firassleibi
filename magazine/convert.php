<?php
include("include/phrases.php");
include("include/db.php");
include("include/functions.php");
checkSession();
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Forms :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->

</head>
<body>
<div id="wrapper">
     <!----->
     <? include("include/header.php")?>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     
		<!--//banner-->
 	<!--grid-->
 	<div class="grid-form">
 		<div class="grid-form1"  >
 		<h3 id="forms-example" class="">Processing file. Please wait, this might take few minutes.</h3>
 		<div class="text text-center">
        	<img src="images/loader.gif"/>
        </div>
</div>


<!---->

 	</div>
 	<!--//grid-->
		<!---->
    <? include("include/footer.php")?>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     <!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
<!---->
<?php
if(isset($_GET['id'])&&is_numeric($_GET['id'])){
	$id=$_GET['id'];
	if(getBookPages($id)=="0"){
		$bookname=getBookName($id);
		mkdir("books/$bookname", 0777, true);
		$im = new imagick();
		$im->setResolution(200, 200);
		$im->readimage("books/$bookname.pdf");
		$im->setCompressionQuality(70);
		$num_pages = $im->getNumberImages();
		for($i = 0;$i < $num_pages; $i++) {
			$im->setIteratorIndex($i);
			$im->setImageFormat('jpeg');
			$im->writeImage("books/$bookname/$i.jpg");
		}
		$im->clear();
		$im->destroy();
		setPages($id,$num_pages);
		echo '<script>window.location = "books.php";</script>';
	}
	else
		echo '<script>window.location = "index.php";</script>';
    }
else
    echo '<script>window.location = "index.php";</script>';


?>
</body>
</html>

