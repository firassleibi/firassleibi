<?php include("include/phrases.php");include("include/db.php");include("include/functions.php");checkSession();if(isset($_POST['submit'])){        $result=uploadBook($_FILES["pdf"],$_POST['name'],$_POST['price'],$_POST['description'],$_FILES["thumb"]);        if($result!="none")            $error=$result;    }?>
<!--Author: W3layoutsAuthor URL: http://w3layouts.comLicense: Creative Commons Attribution 3.0 UnportedLicense URL: http://creativecommons.org/licenses/by/3.0/--><!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Forms :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery.min.js"> </script><script src="js/bootstrap.min.js"> </script><!-- Mainly scripts --><script src="js/jquery.metisMenu.js"></script><script src="js/jquery.slimscroll.min.js"></script><!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script><script src="js/screenfull.js"></script><script>		$(function () {			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);			if (!screenfull.enabled) {				return false;			}						$('#toggle').click(function () {				screenfull.toggle($('#container')[0]);			});								});		</script><!----->
</head>
<body>
<div id="wrapper"> <!----->
  <? include("include/header.php")?>
  <div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main"> <!--banner-->
      <div class="banner">
        <h2> <a href="index.php">Home</a> <i class="fa fa-angle-right"></i> <span>
          <?= ADDMAGAZINE?>
          </span> </h2>
      </div>
      <!--//banner--> <!--grid-->
      <div class="grid-form">
        <div class="grid-form1"  >
          <h3 id="forms-example" class="">
            <?= ADDMAGAZINE ?>
          </h3>
          <form method="post" enctype="multipart/form-data">
            <? if(isset($error)){?>
            <div class="col-md-12 alert alert-danger">
              <?= $error?>
            </div>
            <?}?>
            <div class="form-group">
              <label for="exampleInputEmail1">Magazine Name:</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" required="">
            </div>
            <div class="form-group">
              <label for="description">Magazine Description:</label>
              <textarea  name="description" class="form-control" id="description" placeholder="Description" required=""></textarea>
            </div>
            <div class="form-group">
              <label for="Price">Magazine Price:</label>
              <input type="text" name="price" class="form-control" id="price" placeholder="Price" required="">
            </div>
            <div class="form-group col-md-3">
              <label for="thumb">Thumbnail</label>
              <input type="file" name="thumb"  id="thumb" placeholder="Image" accept="application/image" required="">
            </div>
            <div class="form-group col-md-9">
              <label for="pdf">Browse PDF</label>
              <input type="file" name="pdf"  id="pdf" placeholder="Password" accept="application/pdf" required="">
            </div>
            <button type="submit" name="submit" class="btn btn-default">Add Magazine</button>
          </form>
        </div>
        <!----> </div>
      <!--//grid--> <!---->
      <? include("include/footer.php")?>
    </div>
  </div>
  <div class="clearfix"> </div>
</div>
<!--scrolling js--> <script src="js/jquery.nicescroll.js"></script> <script src="js/scripts.js"></script> <!--//scrolling js--><!---->
</body>
</html>