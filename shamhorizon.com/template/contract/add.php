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
									<input name="title" type="text" class="form-control" id="title">
								</td>
							</tr>

							<tr>
							  <td>العميل</td>
							  <td><select name="customer_id" class="form-control" id="jquery-select-customer">
							<option></option>
									<?
                                    $sql = "SELECT * FROM `customers` ORDER BY `id` DESC";
                                    $rows = $pdo->pdoGetAll($sql);
                                    foreach($rows as $result) {
                                    ?>
							<option value="<?= $result['id'] ?>"><?= $result['name']." - ".$result['company'] ?></option>
                            <? } ?>
						</select></td>
						  </tr>
							<tr>
							  <td>الملف</td>
							  <td><input name="file" type="file" class="form-control" id="file"></td>
						  </tr>
							<tr>
								<td>
									ملاحظات
								</td>
								<td>
									<textarea name="note" rows="3" class="form-control" id="note"></textarea>
								</td>
							</tr>

							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnadd" id="btnadd" value="اضافة"></td>
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