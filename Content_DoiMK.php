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
					<strong>Xin chúc mừng!</strong> Bạn đã đỗi thành công.
				</div>
			<?php endif; ?>
			<?php if ($show == 2) : ?>
				<div class="alert alert-success" role="alert" style="width: 800px;margin-top: 23px;margin-left: 20%;margin-bottom: -15px">
					<strong>Xin lỗi!</strong> Bạn đã nhập sai mật khẩu cũ.
				</div>
			<?php endif; ?>
			<div class="col-md-12 col-lg-offset-2" style="margin-left: 21.5%;margin-top: -25px">
				<div class="account">
					
						<h2 style="width: 800px;margin-bottom: -37px" class="account-in">Đỗi mật khẩu cá nhân</h2>
						<form  class="form-horizontal" method="POST" action="" name="fdoimk" id="fdoimk" onsubmit="return KiemTra()">
							<div class="form-group">
									<input class="col-sm-10" id="txtID" name="txtID" type="hidden"  style=" width: 400px;color: blue;font-weight: bold;">	
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Mật khẩu cũ</label>
									<input class="col-sm-10" id="txtmkcu" name="txtmkcu" type="password" placeholder="Nhập mật khẩu cũ" style=" width: 400px;">	
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Mật khẩu mới</label>
									<input class="col-sm-10" id="txtmkmoi" name="txtmkmoi" type="password" placeholder="Nhập mật khẩu mới" style="width: 400px">
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Xác nhận</label>
									<input class="col-sm-10" id="txtxacnhan" name="txtxacnhan" type="password" placeholder="Xác nhận mật khẩu mới" style="width: 400px;">
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button name="btnDoiMK" type="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" style="width:250px; text-align: center;border: none;margin-left: 6%">
										Đổi mật khẩu
									</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		function KiemTra() {
			if(fdoimk.txtmkmoi.value != fdoimk.txtxacnhan.value)
			{
				alert("Mật khẩu lặp lại không đúng");
				return false;
			}
			return true;
		}
		
	</script>
</body>
</html>