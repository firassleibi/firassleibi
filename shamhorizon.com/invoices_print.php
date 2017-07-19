<?
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/function.php");

    if(isset($_GET['id'])){
        $sql = "SELECT * FROM `invoices` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">
<link rel="stylesheet" media="screen" href="http://openfontlibrary.org/face/droid-arabic-kufi" rel="stylesheet" type="text/css"/>

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


<body class="right-to-left page-invoice">
	<script>
		window.onload = function () {
			window.print();
		};
	</script>

<div class="panel invoice">
			<div class="invoice-header">
				<h3>
					<div>
						<small>Fahad kh</small><br>
						فاتورة رقم #<?= $result['id'] ?>
				  </div>
				</h3>
				<address>
					فهد للبرمجيات.<br>
					جدة - حي الرحاب شارع الاشراف<br>
					90080 SA, RSA
			  </address>
				<div class="invoice-date">
					<small><strong>التاريخ</strong></small><br>
					<?= date("F j, Y"); ?>
			  </div>
			</div> <!-- / .invoice-header -->
			<div class="invoice-info">
				<div class="invoice-recipient">
					<strong>Mr. John Smith</strong>
				</div> <!-- / .invoice-recipient -->
				<div class="invoice-total">
					المبلغ:
				  <span>$<?= $result['price'] ?></span>
				</div> <!-- / .invoice-total -->
			</div> <!-- / .invoice-info -->
			<hr>
			<div class="invoice-table">
				<table>
					<thead>
						<tr>
							<th>
								الخدمة المقدمة
							</th>
							<th>
								السعر
							</th>
						</tr>
					</thead>
					<tbody>
                    <?php
						$invoice_id = $_GET['id'];
                        $sql2 = "SELECT * FROM `invoices_services` WHERE `invoices_id` = $invoice_id ORDER BY `id` DESC";
                        $rows2 = $pdo->pdoGetAll($sql2);
                        foreach($rows2 as $result2) {
                                 ?>

						<tr>
                        	<td><?= $result2['service'] ?></td>
                            <td><?= $result2['service_price'] ?></td>
                        </tr>
						<?php }?>
					</tbody>
				</table>
			</div>

			<hr>
            <div class="invoice-table">
				<table>
					<thead>
						<tr>
							<th>
								شروط وأحكام
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<?= $result['terms'] ?>
							</td>
						</tr>
						<tr></tr>
					</tbody>
				</table>
			</div>
			 
			<!-- / .invoice-table -->

		<div class="logo-invoices"><img src="logo-print.jpg" width="100"  alt=""/>
        <div class="clearfix"></div>
        </div>            
		</div>
        </body>
        </html>