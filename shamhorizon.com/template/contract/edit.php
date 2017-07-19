<form method="post" enctype="multipart/form-data">
<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">اضافة عقد جديد</span>
					</div>
					<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									عنوان الملف
								</td>
								<td>
									<input name="title" type="text" class="form-control" id="title" value="<?= $result['title'] ?>">
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
							<option <? if($result['customer_id'] == $result_co['id']){ echo 'selected="selected"'; } ?> value="<?= $result_co['id'] ?>"><?= $result_co['name']." - ".$result_co['company'] ?></option>
                            <? } ?>
						</select></td>
						  </tr>
							<tr>
							  <td>العقد الحالي</td>
							  <td><a href="upload/<?= $result['file'] ?>"><?= $result['file'] ?></a></td>
						  </tr>
							<tr>
							  <td>تحميل عقد جديد</td>
							  <td>
                              <input name="hdn_file" type="hidden" id="hdn_file" value="<?= $result['file'] ?>">
                              <input name="file" type="file" class="form-control" id="file"></td>
						  </tr>
							<tr>
								<td>
									ملاحظات
								</td>
								<td>
									<textarea name="note" rows="3" class="form-control" id="note"><?= $result['note'] ?>
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