<?php
	// session_start();
	if (!isset($_GET["id"])) {
		header('Location: index.php');
	}

	if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	} 

	if ($_SESSION["dang_nhap_chua"] == 0) {
		if(isset($_COOKIE["auth_user_id"])) {
			// tái tạo session
			$user_id = $_COOKIE["auth_user_id"];
			$sql = "select * from users where f_ID = $user_id";
			$rs = load($sql);
			$_SESSION["current_user"] = $rs->fetch_object();
			$_SESSION["dang_nhap_chua"] = 1;
			

		}

		// } else {
		// 	header("Location: dangnhap.php");
		// }
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	
	<div class="container" style="margin-top: 30px">
		
		<div class="content">
			<?php include 'LayoutGeneral/menu.php'; ?>
			<div class="col-md-9 top-single" >
					
						<h3 class="future" style="width: 930px">Lịch sử mua hàng</h3>
						
							<table class="table table-hover" style="margin-top: 20px">
							<thead>
								<tr>
									<th>Khách hàng</th>
									<th>Ngày</th>
									<th class="col-md-2">Thành tiền</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$id = $_GET["id"];
								$sql = "select * from orders where UserID = $id";
								$rs = load($sql);
								if ($rs->num_rows > 0){ 
									while ($row = $rs->fetch_assoc()){
										
									
							?>

								<tr>
									<td><?= $_SESSION["current_user"]->f_Name ?></td>
									<td><?= $row["OrderDate"] ?></td>
									<td><?= number_format($row["Total"]) ?> VND</td>
									<!-- <td><?= $q ?></td> -->
									<td style="margin-right: -20px">
										<a class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" style="margin-right: -95px;margin-left: 50px" href="chitietLS.php?id=<?= $row["OrderID"] ?>" >
											Xem chi tiết
										</a>
									</td>
									
								</tr>

							<?php 
								}
							}
							else{
								
							 ?>
							<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 15px;margin-left: 0%">
								<strong>Xin lỗi!</strong> Bạn không có lịch sử mua hàng nào.
							</div>
					
							<?php
								} 
							 ?>
							</tbody>
						</table>
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Ngày sinh</label>
									<input class="col-sm-10" id="txtngay" name="txtngay" type="text" value="" style="width: 400px;border-radius: 10px;color: blue;font-weight: bold;">
										
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tên đăng nhập</label>
									<input class="col-sm-10" id="txttendangnhap" name="txttendangnhap" type="text" value="" style="width: 400px;color: blue;font-weight: bold;">

							</div> -->
						
			</div>
		</div>
	</div>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>