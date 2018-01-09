<?php 
$show=0;
	$u_trangthai = 'Đã nhận hàng';
	if (isset($_POST["btnxacnhan"])) {
		$a =$_POST["oderid"];
		$tinhtrang =$_POST["trangthai"];
		
		$u_sql = "update orders set trangthai = '$tinhtrang' where OrderID = $a";
		write($u_sql);
		$show=1;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="container" style="margin-top: 30px">
		
		<div class="content">
			
			<div class="col-md-12 top-single" >
					
						<h3 class="future" style="width: 1230px;margin-top: 20px">QUẢN LÝ HÓA ĐƠN</h3>
						
							<table class="table table-hover" style="margin-top: 40px">
							<thead>
								<tr>
									<th class="col-md-3">Khách hàng</th>
									<th class="col-md-3">Ngày</th>
									<th class="col-md-3">Thành tiền</th>
									<th class="col-md-3">Xác nhận đã giao</th>
									<th >&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$c='Đã nhận hàng';
								$sql = "select * from orders ORDER BY OrderDate DESC ";
								$rs = load($sql);
								if ($rs->num_rows > 0){ 
									while ($row = $rs->fetch_assoc()){
										$b= $row["trangthai"];

									
							?>
								<?php 
										if($b==$c){
									 ?>
								<tr style="color: red">
									<td><?= $row["UserName"] ?></td>
									<td><?= $row["OrderDate"] ?></td>
									<td><?= number_format($row["Total"]) ?> VND</td>
									<!-- <td><?= $q ?></td> -->
									<td>Đã giao hàng</td>
									<td style="margin-right: -20px">
										<a class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" style="margin-left:  -85%;" href="Trang_Admin/CTHoaDon.php?id=<?= $row["OrderID"] ?>" >
											Xem chi tiết
										</a>
									</td>
									
								</tr>
									 <?php 
									 	}else{
									  ?>
								<tr >
									  <td><?= $row["UserName"] ?></td>
									<td><?= $row["OrderDate"] ?></td>
									<td><?= number_format($row["Total"]) ?> VND</td>
									<td style="margin-right: -20px">
									<form class="form-horizontal" method="POST" action="">
										<input type="hidden" name="oderid" value="<?= $row["OrderID"] ?>">
										<input type="hidden" name="trangthai" value="<?= $u_trangthai ?>">
										<button class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" type="submit" name="btnxacnhan" title="Xác nhận đã giao " style="border:none; " >
											Xác nhận
										</button>
										</form> 
									</td>
									
									<td style="margin-right: -20px">
										<a class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" style="margin-left:  -85%;" href="Trang_Admin/CTHoaDon.php?id=<?= $row["OrderID"] ?>" >
											Xem chi tiết
										</a>
									</td>
									
								</tr>

							<?php 
						}
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
</body>
</html>