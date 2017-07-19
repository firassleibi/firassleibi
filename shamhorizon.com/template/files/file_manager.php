<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">ملفات</span>
					</div>
					<div class="panel-body">
                    					<? if ($_GET['process'] == 'successfully') { ?>
                    <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							 تمت العملية بنجاح
						</div>
                     <? } ?>
                    <a href="?do=add&customer=<?= $_GET['id'] ?>" class="btn btn-primary btn-add">اضافة ملف جديد</a>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>عنوان الملف</th>
									<th>حول الملف</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
                            									<?
                                    $sql = "SELECT * FROM `files` WHERE customer_id=".$_GET['id']."";
                                    $rows = $pdo->pdoGetAll($sql);
                                    foreach($rows as $result) {
                                    ?>

								<tr>
									<td><?= $result['id'] ?></td>
									<td><a href="upload/<?= $result['file'] ?>"><?= $result['title'] ?></a></td>
									<td><?= $result['note'] ?></td>
									<td>
                                    <a href="" data-toggle="modal" data-target="#myModal<?= $result['id'] ?>"><i class="fa fa-download"></i></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <?= $result['title'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

                                    </td>
									<td><a href="?del=<?= $result['id'] ?>&id=<?= $_GET['id'] ?>" data-toggle="tooltip" data-placement="top" title="حذف" data-original-title="حذف الملف" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>
</td>
								</tr>
                                <? } ?>
							</tbody>
						</table>
					</div>
				</div>
                
                <!-- Button trigger modal -->
