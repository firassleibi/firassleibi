<form method="post">
<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">اعددات النظام</span>
					</div>
					<div class="panel-body">
                    					<? if ($_GET['process'] == 'successfully') { ?>
                    <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							 تمت العملية بنجاح
						</div>
                     <? } ?>

						<ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
							<li class="active">
								<a href="#general_settings" data-toggle="tab">اعددات عامة</a>
							</li>
							<li class="">
								<a href="#admin_data" data-toggle="tab">بيانات المدير </a>
							</li>
							<li class="">
								<a href="#supervisor_data" data-toggle="tab">بيانات المشرف </a>
							</li>
                            <li class="">
								<a href="#sms" data-toggle="tab">اعددات SMS </a>
							</li>
                            <li class="">
								<a href="#backup" data-toggle="tab">النسخ الاحتياطي </a>
							</li>
                            
						</ul>

						<div class="tab-content tab-content-bordered">
							<div class="tab-pane fade active in" id="general_settings">
								<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									اسم النظام
								</td>
								<td>
									<input name="sitename" type="text" class="form-control" id="sitename" value="<?= $result['sitename'] ?>">
								</td>
							</tr>

							<tr>
							  <td>رابط النظام</td>
							  <td><input name="site_url" type="text" class="form-control" id="site_url" value="<?= $result['site_url'] ?>"></td>
						  </tr>
							<tr>
							  <td> مجلد رفع الملفات</td>
							  <td><input name="upload_folder" type="text" class="form-control" id="upload_folder" value="<?= $result['upload_folder'] ?>"></td>
						  </tr>
                          <tr>
							  <td> الامتددات المسموحة</td>
							  <td><input name="types_fileupload" type="text" class="form-control" id="types_fileupload" value="<?= $result['types_fileupload'] ?>"></td>
						  </tr>
							<tr>
							  <td> ألوان القالب</td>
							  <td>
                              <select name="theme_color" id="theme_color" class="form-control">
                                <option value="theme-adminflare">theme-adminflare</option>
                                <option value="theme-asphalt">theme-asphalt</option>
                                <option value="theme-clean">theme-clean</option>
                                <option value="theme-default">theme-default</option>
                                <option value="theme-dust">theme-dust</option>
                                <option value="theme-fresh">theme-fresh</option>
                                <option value="theme-frost">theme-frost</option>
                                <option value="theme-purple-hills">theme-purple-hills</option>
                                <option value="theme-silver">theme-silver</option>
                                <option value="theme-white">theme-white</option>
                              </select>
                              </td>
						  </tr>

							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnedit" id="btnedit" value="تعديل"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
							</div> <!-- / .tab-pane -->
							<div class="tab-pane fade" id="admin_data">
								<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									اسم المستخدم
								</td>
								<td>
									<input name="admin_username" type="text" class="form-control" id="admin_username" value="<?= $result['admin_username'] ?>">
								</td>
							</tr>

							<tr>
							  <td>كلمة المرور</td>
							  <td><input name="admin_password" type="password" class="form-control" id="admin_password" value="<?= $result['admin_password'] ?>"></td>
						  </tr>
							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnedit" id="btnedit" value="تعديل"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
							</div> <!-- / .tab-pane -->
                            <div class="tab-pane fade" id="supervisor_data">
								<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									اسم المستخدم
								</td>
								<td>
									<input name="supervisor_username" type="text" class="form-control" id="supervisor_username" value="<?= $result['supervisor_username'] ?>">
								</td>
							</tr>

							<tr>
							  <td>كلمة المرور</td>
							  <td><input name="supervisor_password" type="password" class="form-control" id="supervisor_password" value="<?= $result['supervisor_password'] ?>"></td>
						  </tr>
							<tr>
							  <td>صلاحيات</td>
							  <td class="permissions">
									<label class="checkbox-inline">
								<input name="customers" type="checkbox" class="px" id="customers" value="yes" <?= $result['customers'] == 'yes' ? "checked" : "" ?>>
								<span class="lbl">ادارة العملاء</span>
							</label>
						<br>

                        <label class="checkbox-inline">
								<input name="customers_message" type="checkbox" class="px" id="customers_message" value="yes" <?= $result['customers_message'] == 'yes' ? "checked" : "" ?>>
								<span class="lbl">مراسلة كافة العملاء</span>
							</label>
                            <br>

                            <label class="checkbox-inline">
								<input name="contacts" type="checkbox" class="px" id="contacts" value="yes" <?= $result['contacts'] == 'yes' ? "checked" : "" ?>>
								<span class="lbl">جهات الاتصال</span>
							</label>
                            <br>

                            <label class="checkbox-inline">
								<input name="files" type="checkbox" class="px" id="files" value="yes" <?= $result['files'] == 'yes' ? "checked" : "" ?>>
								<span class="lbl">ادارة ملفات العملاء</span>
							</label>
                            <br>

                            <label class="checkbox-inline">
								<input name="contract" type="checkbox" class="px" id="contract" value="yes" <?= $result['contract'] == 'yes' ? "checked" : "" ?>>
								<span class="lbl">العقود</span>
							</label>
                            <br>

                            <label class="checkbox-inline">
								<input name="invoices" type="checkbox" class="px" id="invoices" value="yes" <?= $result['invoices'] == 'yes' ? "checked" : "" ?>>
								<span class="lbl">الفواتير</span>
							</label>
                        </td>
						  </tr>
							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnedit" id="btnedit" value="تعديل"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
							</div>
							<div class="tab-pane fade" id="sms">
<table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									Sms Gateway
								</td>
								<td>
									<input name="sms_gateway" type="text" class="form-control" id="sms_gateway" value="<?= $result['sms_gateway'] ?>">
								</td>
							</tr>

							<tr>
							  <td>Sms Username</td>
							  <td><input name="sms_username" type="text" class="form-control" id="sms_username" value="<?= $result['sms_username'] ?>"></td>
						  </tr>
                          <tr>
							  <td>Sms Password</td>
							  <td><input name="sms_password" type="text" class="form-control" id="sms_password" value="<?= $result['sms_password'] ?>"></td>
						  </tr>
                          <tr>
							  <td>Sms Sender</td>
							  <td><input name="sms_sender" type="text" class="form-control" id="sms_sender" value="<?= $result['sms_sender'] ?>"></td>
						  </tr>
							<tr>
								<td><input type="submit" class="btn btn-primary" name="btnedit" id="btnedit" value="تعديل"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>							</div> <!-- / .tab-pane -->
                    
                    
                    <div class="tab-pane fade" id="backup">
			<a href="?do=backup" data-toggle="tooltip" data-placement="top" title="حذف" data-original-title="حذف" onclick="return confirm('سوف يتم اخذ نسخة احتياطية لقاعدة البيانات بتاريخ اليوم, اذا كنت متأكد من هذا الاجراء اضغط موافق')" class="btn btn-danger btn-flat btn-lg btn-labeled">
            اضغط هنا لحفظ نسخة احتياطية لقاعدة البيانات
            </a>

							</div>
                    
							 <!-- / .tab-pane -->
						</div> <!-- / .tab-content -->
					</div>
				</div>
                </form>