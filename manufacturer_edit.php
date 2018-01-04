<?php
	require_once '../lib/db.php';

	$show_alert = 0;

	if (!isset($_GET["id"])) {
		header('Location: ../Admin_Hang.php');
	}

	if (isset($_POST["btnUpdate"])) {
		$u_id = $_POST["txtManID"];
		$u_name = $_POST["txtManName"];
		$u_sql = "update manufacturer set ManName = '$u_name' where ManID = $u_id";
		write($u_sql);
		$show_alert = 1;
	}

	if (isset($_POST["btnDelete"])) {
		$d_id = $_POST["txtManID"];
		$d_sql = "delete from manufacturer where ManID = $d_id";
		write($d_sql);
		header('Location: ../Admin_Hang.php');
	}


	$id = $_GET["id"];
	$sql = "select * from manufacturer where ManID = $id";
	$rs = load($sql);
	$name = "";
	while ($row = $rs->fetch_assoc()) {
		$name = $row["ManName"];
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh sửa danh mục</title>
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
					<strong>Xin chúc mừng!</strong> Bạn đã cập nhật thành công.
				</div>
			<?php endif; ?>
				<form method="post" action="" name="frmEdit">
					<div class="form-group">
						<label for="txtManID">Mã hãng</label>
						<input type="text" class="form-control" id="txtManID" name="txtManID" readonly value="<?= $id ?>">
					</div>
					<div class="form-group">
						<label for="txtManName">Tên hãng</label>
						<input type="text" class="form-control" id="txtManName" name="txtManName" placeholder="Tên hãng" value="<?= $name ?>">
					</div>
					<a class="btn btn-primary" href="../Admin_Hang.php" role="button" title="Về thôi">
						<span class="glyphicon glyphicon-backward"></span>
					</a>
					<button type="submit" class="btn btn-success" name="btnUpdate">
						<span class="glyphicon glyphicon-check"></span>
						Chỉnh sửa
					</button>
					<button type="submit" class="btn btn-danger" name="btnDelete">
						<span class="glyphicon glyphicon-remove"></span>
						Xoá luôn
					</button>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
		    $('#txtCatName').focus();
		});
	</script>
</body>
</html>