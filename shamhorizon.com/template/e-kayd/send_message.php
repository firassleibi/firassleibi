
<!-- 5. $SUMMERNOTE_WYSIWYG_EDITOR =================================================================

		Summernote WYSIWYG-editor
-->
		<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js)-->
		<link rel="stylesheet" type="text/css" href="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
		<link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
		<link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">
		<script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
		<script src="../cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
		<script src="../cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>

		<!-- Javascript -->
		<script>
			init.push(function () {
				if (! $('html').hasClass('ie8')) {
					$('#message').summernote({
						height: 200,
						tabsize: 2,
						codemirror: {
							theme: 'monokai'
						}
					});
				}
			});
		</script>
		<!-- / Javascript -->
<form method="post">
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">كتابة رسالة</span>
				 <!-- / .panel-heading-controls -->
			</div>
			<div class="panel-body">
            					<? if ($_GET['process'] == 'successfully') { ?>
                    <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							 تمت العملية بنجاح
						</div>
                     <? } ?>

            <table class="table" id="inputs-table">
						<tbody>
							<tr>
								<td>
									عنوان الرسالة
								</td>
								<td>
									<input name="subject" type="text" class="form-control" id="subject">
								</td>
							</tr>
							<tr>
								<td>
									الرسالة
								</td>
								<td><textarea name="message" rows="10" class="form-control" id="message"></textarea></td>
							</tr>

							<tr>
								<td><input type="submit" class="btn btn-primary" name="btn-sendone" id="btn-sendone" value="ارسال"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>
        </form>
<!-- /5. $SUMMERNOTE_WYSIWYG_EDITOR -->
