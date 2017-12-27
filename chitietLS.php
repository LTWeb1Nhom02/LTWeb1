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
					
						<h3 class="future" style="width: 930px" >Lịch sử mua hàng</h3>
						
							<table class="table table-hover" style="margin-top: 20px">
							<thead>
								<tr>
									<th class="col-md-4">Tên sản phẩm</th>
									<th class="col-md-3">Số lượng</th>
									<th class="col-md-3">Giá</th>
									<th class="col-md-2">Thành tiền</th>
								</tr>
							</thead>
							<tbody>
							
								<tr>
									
									<?php
										$id = $_GET["id"];
										$r_sql = "select * from orderdetails where OrderID = $id ";
										$rs = load($r_sql);
										if ($rs->num_rows > 0){ 
											while ($row = $rs->fetch_assoc()){
												$tenSP = $row["ProName"];
												$gia= $row["Price"];
												$SL= $row["Quantity"];
												$TT= $row["Amount"];
												
												
									 ?>
									<td ><?= $tenSP ?></td>
									<td><?= $SL ?></td>
									<td><?= number_format($gia) ?> VND</td>
									<td><?= number_format($TT) ?> VND</td>


									
									<!-- <td><?= $q ?></td> -->
									
									
								</tr>

							<?php 
								}
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