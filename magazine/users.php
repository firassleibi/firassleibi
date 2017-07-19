<?php
include("include/phrases.php");
include("include/db.php");
include("include/functions.php");
checkSession();

usersToJson();


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
<link type="text/css" rel="stylesheet" href="bootstraptable/bootstrap-table.css" />
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
		     <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span><?= USERS;?></span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="grid-form">
 		<div class="grid-form1"  >
 		<h3 id="forms-example" class=""><?= USERS ?></h3>
 		<table id="table" class="table table-striped table-bordered table-hover" data-toggle="table" data-url="json/users.json"  data-cache="false" data-pagination="true" data-search="true">
							<thead>
                            
							<tr>             
                            	<th data-align="center" data-valign="middle" data-sortable="true" data-field="username">
									Username
								</th>
                                <th data-align="center" data-valign="middle" data-sortable="true" data-field="email">
                                    Email
                                </th>
								<th data-align="center" data-valign="middle" data-field="gendre" data-sortable="true" >
									 Gendre
								</th>
                                <th data-align="center" data-valign="middle" data-field="birth_date" data-sortable="true" >
                                    Birth Date
                                </th>
                                <!--th data-align="center" data-valign="middle" data-field="pages" data-formatter="approvedOperator" data-events="operateEvents">
                                	PDF
                                </th>
                                <th data-align="center" data-valign="middle" data-field="pages" data-formatter="pages" data-events="operateEvents">
                                	Pages
                                </th-->
								

							</tr>
							</thead>
							</table>
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
    <script src="bootstraptable/bootstrap-table.js"></script>
    <script>
		function approvedOperator(value, row, index) {
			return "<a class='approve' href='books/"+row['bookname']+".pdf' title='PDF File'><i class='fa fa-download' ></i></a>";
	}
	function pages(value, row, index) {
			return "<a class='approve' href='books/"+row['bookname']+"' title='Pages'><i class='fa fa-file' ></i></a>";
	}
	</script>
	<!--//scrolling js-->
<!---->

</body>
</html>

