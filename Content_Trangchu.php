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
	<div class="container">
			<div class="content">
				<!-- menuleft -->
					

				<!-- menuright -->
					<div class="col-md-12 top-single">
						<div class="content-bottom" style="margin-top: 58px">
						<h3 class="future" style="width: 1115px">MỚI NHẤT</h3>
						<div class="content-bottom-in">
							<ul id="flexiselDemo0">			
								<?php
								
								$sl=1;	
								$sql = "select * from products ORDER BY ngaynhaphang DESC LIMIT 0,10";
								$rs = load($sql);
								while($row= $rs->fetch_assoc()){
							?>		
								<li>
									<div class="col-md men">
										<form method="post" action="addItemToCart.inc.php" >
										<!-- <input type="hidden" name="txtProID" value="<?= $row["ProID"] ?>">
										<input type="hidden" value="<?= $sl ?>" name="txtQuantity" id="txtQuantity"> -->
										<button type="submit" name="btnAddItemToCart" class="compare-in " style="border:none;"><img src="imgs/<?= $row["ProID"] ?>/main.jpg" alt="..." height="180px">	
											<div class="compare" style="width: 287px;height: 178px;margin-left: -10px">
												<span style="width: 100px;padding: 17px">Đặt mua</span>
											</div>
										</button>
								</form>
										<div class="top-content">
											<h5 style="text-align: center;color: blue;font-weight: bold;"><?= $row["ProName"] ?></h5>
											<h5 style="height: 60px;margin-top: -10px; margin-bottom: 10px;text-align: center;"><?= $row["TinyDes"] ?></h5>
											<div class="white">
												<a href="details.php?id=<?= $row["ProID"] ?>" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
												<p class="dollar"><span class="in-dollar" style="font-size: 10px;color: blue;"></span><span><?= number_format($row["Price"]) ?> VND</span></span></p>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>						
								</li>
								<?php
									} 
								 ?>
					
							</ul>
					<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo0").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
						</div>
					</div>
						<div class="content-bottom" style="margin-top: 58px">
						<h3 class="future" style="width: 1115px">BÁN CHẠY</h3>
						<div class="content-bottom-in">
							<ul id="flexiselDemo1">			
								<?php
								$sql = "select * from products ORDER BY soluongban DESC LIMIT 0,10";
								$rs = load($sql);
								while($row= $rs->fetch_assoc()){
							?>		
								<li>
									<div class="col-md men">
										<a href="" class="compare-in"><img src="imgs/<?= $row["ProID"] ?>/main.jpg" alt="" height="200px"/>	
										<div class="compare" style="width: 288px;height: 195px;margin-left: -2.5px">
											<span style="width: 100px; padding: 17px">Đặt mua</span>
										</div>
										</a>
										<div class="top-content">
											<h5 style="text-align: center;color: blue;font-weight: bold;"><?= $row["ProName"] ?></h5>
											<h5 style="height: 60px;margin-top: -10px; margin-bottom: 10px;text-align: center;"><?= $row["TinyDes"] ?></h5>
											<div class="white">
												<a href="details.php?id=<?= $row["ProID"] ?>" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
												<p class="dollar"><span class="in-dollar" style="font-size: 10px;color: blue;"></span><span><?= number_format($row["Price"]) ?> VND</span></span></p>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>						
								</li>
								<?php
									} 
								 ?>
					
							</ul>
					<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
						</div>
					</div>
						<div class="content-bottom" style="margin-top: 58px; margin-bottom: 80px">
						<h3 class="future" style="width: 1115px">XEM NHIỀU</h3>
						<div class="content-bottom-in">
							<ul id="flexiselDemo2">	
							<?php
								$sql = "select * from products ORDER BY luotxem DESC LIMIT 0,10";
								$rs = load($sql);
								while($row= $rs->fetch_assoc()){
							?>		
								<li>
									<div class="col-md men">
										<a href="" class="compare-in"><img src="imgs/<?= $row["ProID"] ?>/main.jpg" alt="" height="200px"/>	
										<div class="compare" style="width: 288px;height: 195px;margin-left: -2.5px">
											<span style="width: 100px; padding: 17px">Đặt mua</span>
										</div>
										</a>
										<div class="top-content">
											<h5 style="text-align: center;color: blue;font-weight: bold;"><?= $row["ProName"] ?></h5>
											<h5 style="height: 60px;margin-top: -10px; margin-bottom: 10px;text-align: center;"><?= $row["TinyDes"] ?></h5>
											<div class="white">
												<a href="details.php?id=<?= $row["ProID"] ?>" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
												<p class="dollar"><span class="in-dollar" style="font-size: 10px;color: blue;"></span><span><?= number_format($row["Price"]) ?> VND</span></span></p>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>						
								</li>
								<?php
									} 
								 ?>
					
							</ul>
					<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo2").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
						</div>
					</div>
						
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	
</body>
</html>