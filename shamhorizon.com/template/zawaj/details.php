<form method="post">
<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">تفاصيل العميل</span>
					</div>
					<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									الاسم
								</td>
								<td><?= $result['name'] ?></td>
							</tr>

							<tr>
							  <td>البريد الالكتروني</td>
							  <td><?= $result['email'] ?></td>
						  </tr>
							<tr>
							  <td>كلمة المرور</td>
							  <td><?= $result['password'] ?></td>
						  </tr>
							<tr>
							  <td> رقم الجوال</td>
							  <td><?= $result['mobile'] ?></td>
						  </tr>
							<tr>
							  <td> اسم الشركة</td>
							  <td><?= $result['company'] ?></td>
						  </tr>
							<tr>
								<td>
									ملاحظات اخرى
								</td>
								<td><?= $result['note'] ?></td>
							</tr>

							<tr>
								<td><a href="?do=send_message&id=<?= $result['id'] ?>" class="btn btn-primary">ارسال رساله عبر البريد الالكتروني</a></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
                </form>