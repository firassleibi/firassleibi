<form method="post" enctype="multipart/form-data" class="my-form">
<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">اضافة فاتورة جديده</span>
					</div>
					<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									عنوان الفاتورة
								</td>
								<td>
									<input name="title" type="text" class="form-control" id="title" value="<?= $result['title'] ?>">
								</td>
							</tr>

							<tr>
								<td>
									المبلغ
								</td>
								<td>
									<input name="price" type="text" class="form-control" id="price" value="<?= $result['price'] ?>">
								</td>
							</tr>

							<tr>
							  <td>العميل</td>
							  <td><select name="customer_id" class="form-control" id="jquery-select-customer">
							<option></option>
									<?
                                    $sql_co = "SELECT * FROM `customers` ORDER BY `id` DESC";
                                    $rows_co = $pdo->pdoGetAll($sql_co);
                                    foreach($rows_co as $result_co) {
                                    ?>
							<option <? if($result['customers_id'] == $result_co['id']){ echo 'selected="selected"'; } ?> value="<?= $result_co['id'] ?>"><?= $result_co['name']." - ".$result_co['company'] ?></option>
                            <? } ?>
						</select></td>
						  </tr>
							<tr>
								<td>
									الخدمات
								</td>
								<td>
                                	<table>
									<?
									$invoice_id = $_GET['id'];
                                    $sql_services = "SELECT * FROM `invoices_services` WHERE invoices_id = $invoice_id ORDER BY `id` DESC";
                                    $rows_services = $pdo->pdoGetAll($sql_services);
                                    foreach($rows_services as $result_service) {
                                    ?>
                                    <tr class="text-box">
                                        <td>
                                            <label for="box1">الخدمة </label>
                                            <input type="text" id="box1" value="<?= $result_service['service'] ?>" name="services[<?= $result_service['id'] ?>]" kl_virtual_keyboard_secure_input="on">
                                            
                                        </td>
                                        <td>
                                            <label for="box1">السعر </label>
                                            <input type="text" id="box1" value="<?= $result_service['service_price'] ?>" name="services_price[<?= $result_service['id'] ?>]" kl_virtual_keyboard_secure_input="on">
                                        </td>
                                    </tr>
                                    <? } ?>
           							 </table>
                                     <a href="#" class="add-box btn btn-info">اضافة خدمة</a>
                                </td>
							</tr>

							<tr>
								<td>
									شروط واحكام
								</td>
								<td>
				<textarea name="terms" rows="10" class="form-control" id="terms"><?= $result['terms'] ?>
				</textarea>
								</td>
							</tr>


							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnedit" id="btnedit" value="تعديل"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
                </form>
                
                <script>

					init.push(function () {
						// Single select
						$("#jquery-select-customer").select2({
							allowClear: true,
							placeholder: "Select a Customer"
						});

					});
				</script>
                
                
<!-- 5. $SUMMERNOTE_WYSIWYG_EDITOR =================================================================

		Summernote WYSIWYG-editor
-->
		<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js)-->
		<link rel="stylesheet" type="text/css" href="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
		<link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
		<link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">
		<script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
		<script src="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
		<script src="../cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>

		<!-- Javascript -->
		<script>
			init.push(function () {
				if (! $('html').hasClass('ie8')) {
					$('#services').summernote({
						height: 200,
						tabsize: 2,
						codemirror: {
							theme: 'monokai'
						}

					});
					
				}
								if (! $('html').hasClass('ie8')) {
					$('#terms').summernote({
						height: 200,
						tabsize: 2,
						codemirror: {
							theme: 'monokai'
						}

					});
					
				}
			});
		</script>
		<!-- / Javascript -->
        
        
 <script type="text/javascript" src="assets/javascripts/jquery.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var box_html = $('<tr><td class="text-box"><label for="box">الخدمة </label> <input type="text" name="new_services[]" value="" id="box" /> </td><td class="text-box"><label for="box">السعر  </label> <input type="text" name="new_services_price[]" value="" id="box" /> <input type="hidden" name="add_services[]" /><a href="#" class="remove-box btn btn-primary">ازالة</a></td></tr>');
        box_html.hide();
        $('.my-form tr.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
	
	
$('.my-form').on('click', '.remove-box', function(){
    $(this).parent().parent().css( 'background-color', '#FF6C6C' );
    $(this).parent().parent().fadeOut("slow", function() {
        $(this).remove();
    });
    return false;
});

});
</script>
