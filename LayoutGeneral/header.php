<?php
	require_once "./lib/db.php";
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
							<li><a href="#"><?= $row["CatName"] ?></a></li>
							
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
					<li style="float: right; margin-right: -70px"><a href="#" >Tài khoản</a>
						<ul class="drop">
							<li><a href="#">Thông tin cá nhân</a></li>
							<li><a href="#">Đổi mật khẩu</a></li>
							<li><a href="#"> Thoát</a></li>
						</ul>
					</li> 
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
</body>
</html>