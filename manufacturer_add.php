<?php
	require_once '../lib/db.php';

	$show_alert = 0;

	if (isset($_POST["btnAddHang"])) {
		$name = $_POST["txtManName"];
		$sql = "insert into manufacturer(ManName) values('$name')";
		write($sql);

		$show_alert = 1;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<br>
	<br>
	<div class="container-fluid" style="margin-left: 33%;margin-top: 80px">
		<div class="row">
			<div class="col-md-6">
			<?php if ($show_alert == 1) : ?>
				<div class="alert alert-success" role="alert">
					<strong>Xin chúc mừng!</strong> Bạn đã tạo mới thành công.
				</div>
			<?php endif; ?>
				<form method="post" action="" name="frmAdd">
					<div class="form-group">
						<label for="txtManName">Tên hãng</label>
						<input type="text" class="form-control" id="txtManName" name="txtManName" placeholder="Tên hãng">
					</div>
					<a class="btn btn-primary" href="../Admin_Hang.php" role="button" title="Về thôi">
						<span class="glyphicon glyphicon-backward"></span>
					</a>
					<button type="submit" class="btn btn-success" name="btnAddHang">
						<span class="glyphicon glyphicon-check"></span>
						Thêm mới
					</button>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
		    $('#txtManName').focus();
		});
	</script>
</body>
</html>