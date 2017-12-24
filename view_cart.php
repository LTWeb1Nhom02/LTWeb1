<?php
	require_once "lib/db.php";
	require_once 'cart.inc';
	$show_alert=0;
	if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	} 
	if ($_SESSION["dang_nhap_chua"] == 0) {
		header("Location: index.php");
	}

	if (isset($_POST["btnCheckOut"])) {
		$o_Total = $_POST["txtTotal"];
		$o_UserID = $_SESSION["current_user"]->f_ID;
		$o_OrderDate = strtotime("+7 hours", time());
		$str_OrderDate = date("Y-m-d H:i:s", $o_OrderDate);
		if(get_total_items()==0){
			$show_alert=1;
		}
		else{
		$sql = "insert into orders(OrderDate, UserID, Total) values('$str_OrderDate', $o_UserID, $o_Total)";
		$o_ID = write($sql);

	}

		//
		// order_details

		foreach ($_SESSION["cart"] as $proId => $q) {
			$sql = "select * from products where ProID = $proId";
			$rs = load($sql);
			$row = $rs->fetch_assoc();
			$price = $row["Price"];
			$amount = $q * $price;
			$d_sql = "insert into orderdetails(OrderID, ProID, Quantity, Price, Amount) values($o_ID, $proId, $q, $price, $amount)";
			write($d_sql);
		}

		//
		// clear cart
		
		$_SESSION["cart"] = array();
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
</head>
<body>
	
	<div class="header">
		<div class="header-top">
			<div class="container">	
			<div class="header-top-in">			
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=" " ></a>
				</div>
				<div class="header-in" style="margin-right: -70px">
					<ul class="icon1 sub-icon1">
						<?php 
							if ($_SESSION["dang_nhap_chua"] == 0) {
							
						
						 ?>
						 		<li  ><a href="dangnhap.php">  ĐĂNG NHẬP</a></li>
								<li  ><a href="dangky.php">  ĐĂNG KÝ</a></li>
								<li > <a href="#" >HOSTLINE</a> </li>	
						<?php 
							}
						 ?>

						 <?php 
							if ($_SESSION["dang_nhap_chua"] != 0) {
							
						
						 ?>
								
								<li  ><a href="history.php?id=<?= $_SESSION["current_user"]->f_ID ?>">LỊCH SỬ MUA HÀNG</a></li>
								<li ><a href="view_cart.php" >GIỎ HÀNG(<?= get_total_items() ?>)</a></li>
								<li > <a href="#" >HOSTLINE</a> </li>	
						<?php 
							}
						 ?>
							
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>
		<div class="header-bottom">
		<div class="container">
			<div class="h_menu4">
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li class="active"><a href="index.php"><i> </i>Trang chủ</a></li>
					<li><a href="#" >giới thiệu</a></li> 
					<li ><a href="#" >loại sản phẩm</a>
						<ul class="drop">
						<?php
						$sql = "select * from categories";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
						?>
							<li><a href="product.php?id=<?= $row["CatID"] ?>"><?= $row["CatName"] ?></a></li>
							
						<?php
						endwhile;
						?>
						</ul>
					</li> 
					<li ><a href="#" >Nhà sản xuất</a>
						<ul class="drop">
						<?php
						$sql = "select * from manufacturer";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
						?>
							<li><a href="#"><?= $row["ManName"] ?></a></li>
							
						<?php
						endwhile;
						?>
						</ul>
					</li> 							
					<li><a href="#" >  Tin tức</a></li>            
					<li><a href="#" >Trợ giúp</a></li>		
					<?php 
						if ($_SESSION["dang_nhap_chua"] != 0) {
					?>
							<li style="float: right; margin-right: -70px"><a href="#" ><?= $_SESSION["current_user"]->f_Name ?></a>
								<ul class="drop">
									<li><a href="#">Thông tin cá nhân</a></li>
									<li><a href="#">Đổi mật khẩu</a></li>
									<li><a href="LayoutPrivate/logout.php"> Thoát</a></li>
								</ul>
							</li> 		
					<?php 
						}
					?>

					 <?php 
						if ($_SESSION["dang_nhap_chua"] == 0) {
					?>
						
					<?php 
						}
					?>				  				 
					
				</ul>
				<script type="text/javascript" src="js/nav.js"></script>
			</div>
		</div>
		</div>
		<div class="header-bottom-in">
			<div class="container">
			<div class="header-bottom-on">
			<p class="wel"><a href="#">Welcome visitor you can login or create an account.</a></p>
			<div class="header-can">
				<ul class="social-in">
						<!-- <li><a href="#"><i> </i></a></li> -->
						<li><a href="#"><i class="facebook"> </i></a></li>
						<li><a href="#"><i class="twitter"> </i></a></li>					
						<li><a href="#"><i class="skype"> </i></a></li>
					</ul>	
					<div class="search">
						<form>
							<input type="text" value="Search" name="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
							<input type="submit" value="">
						</form>
					</div>

					<div class="clearfix"> </div>
			</div>
			<div class="clearfix"></div>
		</div>
		</div>
		</div>
	</div>
	
	<div class="container" style="margin-top: 45px;">
			<div class="content">
				<!-- menuleft -->
					<?php include 'LayoutGeneral/menu.php'; ?>

				
				<!-- menuright -->
					<div class="col-md-9 top-single">
						<h3 class="future" style="width: 854px" >Giỏ hàng</h3>
						<?php if ($show_alert == 1) : ?>
						<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 15px;margin-left: 0%">
							<strong>Xin lỗi!</strong> Bạn chưa có sản phẩm nào để thanh toán.
						</div>
						<?php endif; ?>
						<div class="panel-body">
						<form id="f" method="post" action="updateCart.inc.php">
							<input type="hidden" id="txtCmd" name="txtCmd">
							<input type="hidden" id="txtDProId" name="txtDProId">
							<input type="hidden" id="txtUQ" name="txtUQ">
						</form>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<th>Giá</th>
									<th class="col-md-2">Số lượng</th>
									<th>Thành tiền</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$total = 0;
							foreach ($_SESSION["cart"] as $proId => $q) :
								$sql = "select * from products where ProID = $proId";
								$rs = load($sql);
								$row = $rs->fetch_assoc();
								$amount = $q * $row["Price"];
								$total += $amount;
							?>
								<tr>
									<td><?= $row["ProName"] ?></td>
									<td><?= number_format($row["Price"]) ?></td>
									<!-- <td><?= $q ?></td> -->
									<td>
										<input class="quantity-textfield" type="text" name="" id="" value="<?= $q ?>">
									</td>
									<td><?= number_format($amount) ?></td>
									<td class="text-right">
										<a class="btn btn-xs btn-danger cart-remove" data-id="<?= $proId ?>" href="javascript:;" role="button">
											<span class="glyphicon glyphicon-remove"></span>
										</a>
										<a class="btn btn-xs btn-primary cart-update" data-id="<?= $proId ?>" href="javascript:;" role="button">
											<span class="glyphicon glyphicon-ok"></span>
										</a>
									</td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
							<tfoot>
								<td>
									<a class="btn btn-success" href="#" role="button">
										<span class="glyphicon glyphicon-backward"></span>
										Tiếp tục mua hàng
									</a>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><b><?= number_format($total) ?></b></td>
								<td class="text-right">
									<form method="POST" action="">
										<input type="hidden" name="txtTotal" value="<?= $total ?>">
										<button name="btnCheckOut" type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-bell"></span>
											Thanh toán
										</button>
									</form>
								</td>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
						
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>

	<!-- <script src="assets/jquery-3.1.1.min.js"></script>	 -->
	<script src="./assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="./assets/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script type="text/javascript">
		$('.cart-remove').on('click', function() {
			var id = $(this).data('id');
			$('#txtDProId').val(id);
		    $('#txtCmd').val('D');
		    $('#f').submit();
		});

		$('.cart-update').on('click', function() {

			var q = $(this).closest('tr').find('.quantity-textfield').val();
			$('#txtUQ').val(q);

			var id = $(this).data('id');
			$('#txtDProId').val(id);
		    $('#txtCmd').val('U');

		    $('#f').submit();
		});

		$('.quantity-textfield').TouchSpin({
	        min: 1,
	        max: 69,
	        verticalbuttons: true,
            // step: 1,
            // decimals: 0,
            // boostat: 5,
            // maxboostedstep: 10,
            // postfix: '%'
	    });
	</script>


	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>