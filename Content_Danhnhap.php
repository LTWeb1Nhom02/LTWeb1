
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="container">
		<div class="account">
			<h2 class="account-in" style="width: 1130px">Đăng nhập</h2>
				<form method="post" action="" class="text-center">
				<div>
					<span >Username</span>
					<input type="text" id="txtUserName" name="txtUserName" placeholder="Tên đăng nhập" style="width: 300px" required autofocus>
				</div> 	
				<div>			
					<span class="name-in">Password</span>
					<input type="password" id="txtPassword" name="txtPassword" placeholder="*********" style="width: 300px" required> 
				</div>			
				<div>
                     <label>
                        <input  type="checkbox" name="cbRemember" value="1" style="margin-left: -170px"><p style="margin-top: -21.5px;margin-left: -98px">Ghi nhớ</p>
                     </label>
                </div>
				<div>				
					<input type="submit" value="Login" name="btnLogin" style="width: 300px">
				</div> 

				</form>
		</div>
	</div>
	<!-- <div class="container-fluid" style="margin-bottom: 100px">
		<div class="account" style="margin-left: 80px">
			<h2 class="account-in" style="width: 1130px">Đăng nhập</h2>
		</div>
		
		<div class="row ">
			<div class="col-md-4 col-md-offset-4">
				<form method="post" action="" style="margin-top: -40px">
					<div class="form-group">
						<label for="txtUserName">Tên đăng nhập</label>
						<input type="text" class="form-control" id="txtUserName" name="txtUserName" placeholder="John">
					</div>
					<div class="form-group">
						<label for="txtPassword">Mật khẩu</label>
						<input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="******">
					</div>
					<div class="checkbox">
						<label>
							<input name="cbRemember" type="checkbox"> Ghi nhớ
						</label>
					</div>
					<! <button type="submit" class="btn btn-success btn-block" name="btnLogin">
					<span class="glyphicon glyphicon-user"></span>
					Đăng nhập
					</button> -->
<!-- 
					<div class="account ">				
					<input style=" width: 300px;margin-left: 50px; margin-top:0px" type="submit" name="btnLogin" value="Đăng nhập">
					</input>
					</div> 
				</form>
			</div>
		</div>
	</div> --> -->
</body>
</html>