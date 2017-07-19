				<script>
					init.push(function () {
						$('#jq-datatables-example').dataTable();
						$('#jq-datatables-example_wrapper .table-caption').text('قائمة العقود');
						$('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
					});
				</script>

<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">ادارة العقود</span>
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
										<th>عنوان الملف</th>
										<th>رابط العقد</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?
                                    $sql = "SELECT * FROM `contract` ORDER BY `id` DESC";
                                    $rows = $pdo->pdoGetAll($sql);
                                    foreach($rows as $result) {
                                    ?>
									<tr class="odd gradeX">
										<td><?= $result['title'] ?></td>
										<td>
										<a data-toggle="modal" data-target="#myModal<?= $result['id'] ?>" class="btn btn-default" role="button">مشاهدة</a>
                                        <!-- Modal -->
<div class="modal fade" id="myModal<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $result['title'] ?></h4>
      </div>
      <div class="modal-body">
        <img src="upload/<?= $result['file'] ?>" class="img-responsive" alt=""/>
      </div>
    </div>
  </div>
</div>
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