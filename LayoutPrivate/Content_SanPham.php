<?php
	require_once "./lib/db.php";
	if (!isset($_GET["id"])) {
		header('Location: index.php');
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
	<div class="container" style="margin-top: 45px;">
			<div class="content">
				<!-- menuleft -->
					<?php include 'LayoutGeneral/menu.php'; ?>

				
				<!-- menuright -->
					<div class="col-md-9 top-single">
						<h3 class="future">SẢN PHẨM</h3>
						<?php
								$id = $_GET["id"];
								$sql = "select * from products where CatID = $id";
								$rs = load($sql);
								if ($rs->num_rows > 0) : 
									while ($row = $rs->fetch_assoc()) :
						?>
						<div class="col-md-4 top-single" style="margin-top: 25px">
							<div class="col-md">
								<a href="" class="compare-in"><img  src="images/banner4.jpg" alt="" height="200px"/>	
								<div class="compare" style="width: 224px;height: 190px">
									<span style="width: 100px;padding: 17px">Đặt mua</span>
								</div>
								</a>
								<div class="top-content">
									<h5 style="text-align: center;"><?= $row["ProName"] ?></h5>
									<div class="white">
										<a href="chitiet.php?id=<?= $row["ProID"] ?>" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Chi tiết</a>
										<p class="dollar"><span class="in-dollar" style="font-size: 10px"></span><span><?= $row["Price"] ?></span></span></p>
										<div class="clearfix"></div>
									</div>
								</div>							
							</div>
						</div>

						<?php 
								endwhile;
								else :
							?>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										Không có sản phẩm thoả điều kiện.
									</div>
							<?php
								endif;
						?>
						
						
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	
</body>
</html>