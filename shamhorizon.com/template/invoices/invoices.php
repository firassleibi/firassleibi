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

		<div class="logo-invoices"><img src="assets/demo/avatars/1.jpg" width="100"  alt=""/>
        <div class="clearfix"></div>
        </div>            
		</div>