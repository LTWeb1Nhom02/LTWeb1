
<?php
	require_once './lib/db.php';
	session_start();

	if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	} 

	
	if (isset($_POST["btnLogin"])) {
		$username = $_POST["txtUserName"];
		$password = $_POST["txtPassword"];
		$enc_password = md5($password);
		$sql = "select * from users where f_Username = '$username' and f_Password = '$enc_password'";
		$rs = load($sql);
		if ($rs->num_rows > 0) {
			$_SESSION["current_user"] = $rs->fetch_object();
			$_SESSION["dang_nhap_chua"] = 1;

			// lưu cookie, thông tin cần lưu là id của người dùng
			if(isset($_POST["cbRemember"])) {
				$user_id = $_SESSION["current_user"]->f_ID;
				setcookie("auth_user_id", $user_id, time() + 86400);
			} 

			header("Location: index.php");
		} else {
			// sinh viên xử lý show_alert
		}
	}
			
	if ($_SESSION["dang_nhap_chua"] != 0) {
		header("Location: index.php");
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
							<li  ><a href="dangnhap.php">ĐĂNG NHẬP</a> </li>
							<li  ><a href="dangky.php">  ĐĂNG KÝ</a></li>
							<li ><a href="#" >GIỎ HÀNG</a></li>
							<li > <a href="#" >HOSTLINE</a> </li>	
							
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
	<?php include 'LayoutPrivate/Content_Danhnhap.php'; ?>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>