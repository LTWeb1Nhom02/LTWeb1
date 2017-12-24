<?php 
require_once './lib/db.php';
if (isset($_POST["btnSave"])) {
	$name = $_POST["txtProName"];
	$price = $_POST["txtPrice"];
	$quantity =$_POST["txtQuantity"];
	$catId = $_POST["selCatID"];
	$tinyDes = $_POST["txtTinyDes"];
	$fullDes = $_POST["txtFullDes"];
	$manId=$_POST["selManID"];

	$sql = "insert into products(ProName, TinyDes, FullDes, Price, CatID, Quantity, ManID) values('$name', '$tinyDes', '$fullDes', $price, $catId, $quantity, $manId)";
	$id = write($sql);


	$f = $_FILES["fuMain"];
	if ($f["error"] > 0) {

	} else {

		mkdir("imgs/$id");

		$tmp_name = $f["tmp_name"];
		$name = $f["name"];
		$destination = "imgs/$id/main.jpg";

		move_uploaded_file($tmp_name, $destination);
	}

	$f = $_FILES["fuThumbs"];
	if ($f["error"] > 0) {

	} else {


		$tmp_name = $f["tmp_name"];
		$name = $f["name"];
		$destination = "imgs/$id/thumbs.jpg";

		move_uploaded_file($tmp_name, $destination);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm sản phẩm</title>
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
	<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	<br/>
	<br/>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-lg-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Sản phẩm mới</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
							<div class="form-group">
								<label for="txtProName" class="col-sm-2 control-label">Sản phẩm</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="txtProName" name="txtProName" placeholder="iPhone X">
								</div>
							</div>
							<div class="form-group">
								<label for="txtTinyDes" class="col-sm-2 control-label">Mô tả</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="txtTinyDes" name="txtTinyDes" placeholder="Điện thoại">
								</div>
							</div>
							<div class="form-group">
								<label for="txtPrice" class="col-sm-2 control-label">Giá</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="txtPrice" name="txtPrice" placeholder="30,000,000">
								</div>
							</div>
							<div class="form-group">
								<label for="selCatID" class="col-sm-2 control-label">Loại</label>
								<div class="col-sm-10">
									<select id="selCatID" name="selCatID" class="form-control">
										<?php 
											$sql = "select * from categories";
											$rs = load($sql);
											while ($row = $rs->fetch_assoc()) :
										?>
											<option value="<?= $row["CatID"] ?>"><?= $row["CatName"] ?></option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="selManID" class="col-sm-2 control-label">Hãng</label>
								<div class="col-sm-10">
									<select id="selManID" name="selManID" class="form-control">
										<?php 
											$sql = "select * from manufacturer";
											$rs = load($sql);
											while ($row = $rs->fetch_assoc()) :
										?>
											<option value="<?= $row["ManID"] ?>"><?= $row["ManName"] ?></option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="txtPrice" class="col-sm-2 control-label">Số lượng</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="txtQuantity" name="txtQuantity" placeholder="100">
								</div>
							</div>
							<div class="form-group">
								<label for="txtFullDes" class="col-sm-2 control-label">Chi tiết</label>
								<div class="col-sm-10">
									<textarea rows="6" id="txtFullDes" name="txtFullDes" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="fuThumbs" class="col-sm-2 control-label">Ảnh nhỏ</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="fuThumbs" name="fuThumbs">
								</div>
							</div>
							<div class="form-group">
								<label for="fuMain" class="col-sm-2 control-label">Ảnh lớn</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="fuMain" name="fuMain">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button name="btnSave" type="submit" class="hvr-shutter-in-vertical " style="width:150px; text-align: center;border: none;">
										Lưu
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> -->
	<script src="assets/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
		    selector: '#txtFullDes',
		    menubar: false,
		    toolbar1: "styleselect | bold italic | link image | alignleft aligncenter alignright | bullist numlist | fontselect | fontsizeselect | forecolor backcolor",
		    // toolbar2: "",
		    // plugins: 'link image textcolor',
		    //height: 300,
		    // encoding: "xml",
		});
	</script>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>