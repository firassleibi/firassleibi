				<script>
					init.push(function () {
						$('#jq-datatables-example').dataTable();
						$('#jq-datatables-example_wrapper .table-caption').text('قائمة الملفات');
						$('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'بحث...');
					});
				</script>

<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">ادارة الملفات</span>
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
										<th>العميل</th>
										<th>عدد الملفات</th>
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
										<td>
							<?
		$sql_count = "SELECT * FROM `files` WHERE customer_id=".$result['id']."";
        $exec = $pdo->pdoExecute($sql_count);
		$count_file = $pdo->pdoRowCount($exec);
		echo "<a href='?do=file_manager&id=".$result['id']."'>".$count_file." ملف </a>";
							  ?>

                                        </td>
										<td class="center">
                                        <a href="?del_allfile=<?= $result['id'] ?>" data-toggle="tooltip" data-placement="top" title="حذف كافة ملفات العميل" data-original-title="حذف كافة الملفات" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>
                                        </td>
									</tr>
                                    <? } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>