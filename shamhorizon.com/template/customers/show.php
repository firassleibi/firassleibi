				<script>
					init.push(function () {
						$('#jq-datatables-example').dataTable();
						$('#jq-datatables-example_wrapper .table-caption').text('قائمة العملاء');
						$('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'بحث ...');
					});
				</script>

<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">ادارة العملاء</span>
					</div>
					<div class="panel-body">
					<? if ($_GET['process'] == 'successfully') { ?>
                    <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							 تمت العملية بنجاح
						</div>
                     <? } ?>
                    <a href="?do=add" class="btn btn-primary btn-add">جديد</a>
						<div class="table-light">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
								<thead>
									<tr>
										<th>اسم العميل</th>
										<th>الشركة</th>
										<th>رقم الهاتف</th>
										<th>البريد الالكتروني</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?
                                    $sql = "SELECT * FROM `customers` ORDER BY `id` DESC";
                                    $rows = $pdo->pdoGetAll($sql);
                                    foreach($rows as $result) {
                                    ?>
									<tr class="odd gradeX">
										<td><?= $result['name'] ?></td>
										<td><?= $result['company'] ?></td>
										<td><?= $result['mobile'] ?></td>
										<td><?= $result['email'] ?></td>
										<td class="center">
                                        <a href="?do=send_message&id=<?= $result['id'] ?>" data-toggle="tooltip" data-placement="top" title="ارسال رسالة" data-original-title="تعديل"><i class="fa fa-envelope"></i></a>
                                        <a href="?do=details&id=<?= $result['id'] ?>" data-toggle="tooltip" data-placement="top" title="مشاهدة التفاصيل" data-original-title="تعديل"><i class="fa fa-file-text"></i></a>
                                        <a href="?do=edit&id=<?= $result['id'] ?>" data-toggle="tooltip" data-placement="top" title="تعديل" data-original-title="تعديل"><i class="fa fa-edit"></i></a>
                                        <a href="?del=<?= $result['id'] ?>" data-toggle="tooltip" data-placement="top" title="حذف" data-original-title="حذف" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>
                                        </td>
									</tr>
                                    <? } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>