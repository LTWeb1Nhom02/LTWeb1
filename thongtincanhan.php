<?php 
require_once'lib/db.php';
require_once 'cart.inc';
$show_alert = 0;
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
if ($_SESSION["dang_nhap_chua"] ==0) {
			header("Location: index.php");
		}

if (!isset($_GET["id"])) {
		header('Location: index.php');
	}
	$id = $_GET["id"];

if (isset($_POST["btnCapNhat"])) {
	$userID=$_POST["txtID"];
	$user = $_POST["txttendangnhap"];
	$hoten = $_POST["txthoten"];
	$email = $_POST["txtemail"];
	$ngay = $_POST["txtngay"];
	
	if($_SESSION["current_user"]->f_ID!=$id){
		$show_alert = 2;
	}else{
	$u_sql = "update users set f_Username = '$user', f_Name = '$hoten', f_Email = '$email', f_DOB = '$ngay'  where f_ID = $userID";
	write($u_sql);
	$show_alert = 1;
	}
}


	$sql = "select * from users where f_ID  = $id";
	$rs = load($sql);
	$name = "";
	while ($row = $rs->fetch_assoc()) {
		$name = $row["f_Name"];
		$mail = $row["f_Email"];
		$username = $row["f_Username"];
		$date = $row["f_DOB"];
	}

?>
<!DOCTYPE html>
<html>
<head>
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
				
							if ($_SESSION["dang_nhap_chua"] ==1) {
							
						
						 ?>		
								<!-- <li  ><a href="dangky.php">  ĐĂNG KÝ</a></li> -->
								<li ><a href="view_cart.php" >GIỎ HÀNG(<?= get_total_items() ?>)</a></li>
								<li > <a href="#" >HOSTLINE</a> </li>	
						<?php 
							}
						 ?>

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
				
							if ($_SESSION["dang_nhap_chua"] ==2) {
							
						
						 ?>		<li  ><a href="add_SanPham.php">TRANG QUẢN TRỊ</a></li>
								<li  ><a href="dangky.php">  ĐĂNG KÝ</a></li>
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
							<li><a href="hangsx.php?id=<?= $row["ManID"] ?>"><?= $row["ManName"] ?></a></li>
							
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
									<li><a href="thongtincanhan.php?id=<?= $_SESSION["current_user"]->f_ID ?>">Thông tin cá nhân</a></li>
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

	<!-- ket thúc header -->

	<div class="container-fluid">
		<div class="row">
			<?php if ($show_alert == 1) : ?>
						<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 15px;margin-left: 20%">
							<strong>Xin chúc mừng!</strong> Bạn đã cập nhật thành công.
						</div>
					<?php endif; ?>
					<?php if ($show_alert == 2) : ?>
						<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 15px;margin-left: 20%">
							<strong>Xin lỗi!</strong> Bạn không có quyền thay đổi thông tin của người khác.
						</div>
					<?php endif; ?>
			<div class="col-md-12 col-lg-offset-2" style="margin-left: 20%;margin-top: -25px">
				<div class="account">
					
						<h2 style="width: 800px;margin-bottom: -37px" class="account-in">Thông tin cá nhân</h2>
						<form  class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
							<div class="form-group">
									<input class="col-sm-10" id="txtID" name="txtID" type="hidden" value="<?= $id ?>" style=" width: 400px;color: blue;font-weight: bold;">	
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Họ tên</label>
									<input class="col-sm-10" id="txthoten" name="txthoten" type="text" value="<?= $name ?>" style=" width: 400px;color: blue;font-weight: bold;">	
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Email</label>
									<input class="col-sm-10" id="txtemail" name="txtemail" type="text" value="<?= $mail ?>" style="width: 400px;color: blue;font-weight: bold;">
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Ngày sinh</label>
									<input class="col-sm-10" id="txtngay" name="txtngay" type="text" value="<?= $date ?>" style="width: 400px;border-radius: 10px;color: blue;font-weight: bold;">
										
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tên đăng nhập</label>
									<input class="col-sm-10" id="txttendangnhap" name="txttendangnhap" type="text" value="<?= $username ?>" style="width: 400px;color: blue;font-weight: bold;">

							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button name="btnCapNhat" type="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" style="width:250px; text-align: center;border: none;margin-left: 6.5%">
										Cập nhật
									</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>