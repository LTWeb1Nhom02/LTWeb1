<?php 
	if (!isset($_GET["id"])) {
		header('Location: ../index.php');
	}
	
	$id = $_GET["id"];
	require_once '../lib/db.php';
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="margin-top: 80px">
		
		<div class="content">
			<div class="col-md-12 top-single" >
					
						<h3 class="future" style="width: 930px;color: blue" >CHI TIÊT HÓA ĐƠN</h3>
						
							<table class="table table-hover" style="margin-top: 20px">
							<thead>
								<tr>
									<th class="col-md-3">Tên sản phẩm</th>
									<th class="col-md-2">Số lượng</th>
									<th class="col-md-2">Giá</th>
									<th class="col-md-2">Thành tiền</th>
								</tr>
							</thead>
							<tbody>
							
								<tr>
									
									<?php
										
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
						<a class="btn btn-primary" href="../Admin_HoaDon.php" role="button" title="Về thôi">
						<span class="glyphicon glyphicon-backward"></span>
					</a>
					<!-- <button style="margin-left: 10px" class="btn btn-primary" type="submit" name="btncapnhat" title="Cập nhật">
						Cập nhật
					</button> -->
					
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
</body>
</html>