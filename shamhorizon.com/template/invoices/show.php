				<script>
					init.push(function () {
						$('#jq-datatables-example').dataTable();
						$('#jq-datatables-example_wrapper .table-caption').text('قائمة الفواتير');
						$('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
					});
				</script>

<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">ادارة الفواتير</span>
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
									  <th>ID</th>
										<th>عنوان الفاتورة</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?
                                    $sql = "SELECT * FROM `invoices` ORDER BY `id` DESC";
                                    $rows = $pdo->pdoGetAll($sql);
                                    foreach($rows as $result) {
                                    ?>
									<tr class="odd gradeX">
									  <td><?= $result['id'] ?></td>
										<td><a href="?do=invoices&id=<?= $result['id'] ?>"><?= $result['title'] ?></a></td>
										<td class="center">
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