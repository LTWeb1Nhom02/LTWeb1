<?php 
	require_once './Captcha/vendor/autoload.php';
	use Gregwar\Captcha\CaptchaBuilder;
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
	<div class="container-fluid">
		<div class="row">
			<?php if ($show == 1) : ?>
				<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 23px;margin-left: 20%;margin-bottom: -15px">
					<strong>Xin chúc mừng!</strong> Bạn đã đăng ký thành công.
				</div>
			<?php endif; ?>
			<?php if ($show == 2) : ?>
				<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 23px;margin-left: 20%;margin-bottom: -15px">
					<strong>Xin lỗi!</strong> Bạn đã nhập sai xác nhận Captcha.
				</div>
			<?php endif; ?>
			
			<?php if ($show == 3) : ?>
				<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 23px;margin-left: 20%;margin-bottom: -15px">
					<strong>Xin lỗi!</strong> Tên đăng nhập mà bạn đăng kí đả tồn tại.
				</div>
			<?php endif; ?>
			<div class="col-md-12 col-lg-offset-2" style="margin-left: 20%">
				<div class="account">
						<h2 style="width: 800px" class="account-in">Đăng ký tài khoản</h2>
						<form  class="form-horizontal" method="POST" action="" name="fdangki" id="fdangki" onsubmit="return KiemTra()">
							<div class="form-group">
								<label class="col-sm-2 control-label">Họ tên<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txthoten" name="txthoten" type="text" placeholder="Họ và tên" style=" width: 400px" required autofocus>	
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Email<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txtemail" name="txtemail" type="text" placeholder="Họ và tên" style="width: 400px" required autofocus>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Ngày sinh<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txtngay" name="txtngay" type="date" placeholder="Họ và tên" style="width: 400px;border-radius: 10px" required autofocus>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Số điện thoại<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txtsdt" name="txtsdt" type="text" placeholder="Số điện thoại" style="width: 400px;border-radius: 10px" required autofocus>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Địa chỉ<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txtdịachi" name="txtdịachi" type="text" placeholder="Họ và tên" style="width: 400px;border-radius: 10px" required autofocus>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tên đăng nhập<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txttendangnhap" name="txttendangnhap" type="text" placeholder="Họ và tên" style="width: 400px" required autofocus>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Mật khẩu<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txtmatkhau" name="txtmatkhau" type="text" placeholder="Họ và tên" style="width: 400px" required autofocus>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Xác nhận<b style="color: red">*</b></label>
									<input class="col-sm-10" id="txtxacnhan" name="txtxacnhan" type="text" placeholder="Họ và tên" style="width: 400px" required autofocus>
							</div>
							<div class="form-group" >
								<?php
									$builder = new CaptchaBuilder;
									$builder->build();
									$_SESSION["captcha"] = $builder->getPhrase();
								?>
								<img style="margin-left: 25.5%" src="<?= $builder->inline() ?>" alt="captcha" />
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Captcha<b style="color: red">*</b></label>
									<input class="col-sm-10" type="text" id="txtUserInput" name="txtUserInput" placeholder="Nhập captcha" style="margin-right:67px; width: 400px" required>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button name="btnDangky" type="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" style="width:250px; text-align: center;border: none;margin-left: 6.5%">
										Đăng ký
									</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
	<!-- <script src="assets/jquery-3.1.1.min.js"></script> -->
	<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="assets/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">

		function KiemTra() {
			if(fdangki.txtxacnhan.value != fdangki.txtmatkhau.value)
			{
				alert("Mật khẩu lặp lại không đúng");
				return false;
			}
			return true;
		}
		
	</script>
</body>
</html>