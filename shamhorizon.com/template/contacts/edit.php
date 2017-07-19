<form method="post">
<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">اضافة عميل جديد</span>
					</div>
					<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									الاسم
								</td>
								<td>
									<input name="name" type="text" class="form-control" id="name" value="<?= $result['name'] ?>">
								</td>
							</tr>

							<tr>
							  <td>البريد الالكتروني</td>
							  <td><input name="email" type="text" class="form-control" id="email" value="<?= $result['email'] ?>"></td>
						  </tr>
							<tr>
							  <td> رقم الجوال</td>
							  <td><input name="mobile" type="text" class="form-control" id="mobile" value="<?= $result['mobile'] ?>"></td>
						  </tr>

							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnedit" id="btnedit" value="تعديل"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
                </form>