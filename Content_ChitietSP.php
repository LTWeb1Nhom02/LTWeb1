

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
		<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 300,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
</head>
<body>
		<div class="container" style="margin-top: 30px;>
			<div class="content">
				<!-- menuleft -->
				<?php include 'LayoutGeneral/menu.php'; ?>
				



				<!-- menuright -->
				<div class="col-md-9 top-in-single">
					<?php
						$id = $_GET["id"];
						$sql = "select * from products where ProID = $id";
						$rs = load($sql);
						if ($rs->num_rows > 0) :
						$row = $rs->fetch_assoc();
						$loai= $row["CatID"];
						$hang = $row["ManID"];
					?>
					<div class="col-md-5 single-top" style="height: 700px">	
						<ul id="etalage">
							<li>
								<img class="etalage_thumb_image img-responsive" src="imgs/<?= $row["ProID"] ?>/main.jpg"alt="" >
								<img class="etalage_source_image img-responsive" src="imgs/<?= $row["ProID"] ?>/main.jpg" alt="" >
					
							</li>
							<li>
								<img class="etalage_thumb_image img-responsive" src="imgs/<?= $row["ProID"] ?>/thumbs.jpg" alt="" >
								<img class="etalage_source_image img-responsive" src="imgs/<?= $row["ProID"] ?>/thumbs.jpg" alt="" >
							</li>
							
						</ul>

					</div>	
					
					<div class="col-md-7 single-top-in">
						<div class="single-para">
							<div class="single-para">
								<h4 style="color: blue;font-weight: bold;">Laptop: <?= $row["ProName"] ?></h4>
								<div class="para-grid">
									<span  class="add-to">Giá: <?= number_format($row["Price"]) ?> VND</span>
									<div class="clearfix"></div>
								 </div>
							</div>	 
							
							<p style="margin-top: -40px"><?= $row["FullDes"] ?></p>
							<p style="margin-top: -30px;margin-bottom: 20px">
								<a style="margin-right: 23px;color: blue;font-size: 15px"><b>Số lượt xem: </b> <?=$row["luotxem"] ?></a> 
								<a style="margin-right: 23px;color: blue;font-size: 15px"><b>Số lượng bán: </b> <?=$row["soluongban"] ?></a>
								<a style="margin-right: 23px;color: blue;font-size: 15px"><b>Xuất xứ: </b> <?=$row["xuatxu"] ?></a>
							</p>
                
								<form method="post" action="addItemToCart.inc.php" style="margin-bottom: 80px">
									<div class="available">
										<input type="hidden" name="txtProID" value="<?= $_GET["id"] ?>">
										<!-- <input type="text" class="form-control" value="1" name="txtQuantity" id="txtQuantity"> -->

										<h6 style="margin-top: -30px;font-weight: bold;">Chọn số lượng :</h6>
											<ul>
												<li>Quality:<select style="margin-left: 10px;width: 80px;" value="1" name="txtQuantity" id="txtQuantity">
												<?php 
													for ($i=1; $i <=69 ; $i++) { 
												 ?>
														<option><?php echo "$i"; ?></option>
												<?php
													}
												 ?>
									
												</select></li>
											</ul>


							
										<br>
										<?php 
											if ($_SESSION["dang_nhap_chua"] == 0) {
							
										 ?>
										<a href="./dangnhap.php" class="hvr-shutter-in-vertical " style="width:200px; text-align: center;border: none;" type="submit" name="btnAddItemToCart">
											Đặt mua
										</a>
										<?php
											} 
										 ?>

										 <?php 
											if ($_SESSION["dang_nhap_chua"] != 0) {
							
										 ?>
										<button class="hvr-shutter-in-vertical " style="width:200px; text-align: center;border: none;" type="submit" name="btnAddItemToCart">
											Đặt mua
										</button>
										<?php
											} 
										 ?>
									</div>
										
								</form>
							
								
							
						</div>
					</div>
					<?php
						else :
					?>
						<div class="col-md-12">
							Không có sản phẩm thoả điều kiện.
						</div>
					<?php
						endif;
					?>
				<div class="clearfix"> </div>

				</div>
			</div>
				<div class="container" >
				<div class=class="col-md-12 top-in-single">
						<div class="content-bottom" >
						<h3 class="future" style="width: 1225px">SẢN PHẨM CÙNG LOẠI</h3>
						
						<div class="content-bottom-in">
							<ul id="flexiselDemo0">	
							<?php
								$sql = "select * from products where CatID = $loai order by rand() limit 0,5";
     							$rs = load($sql);
      							while($row= $rs->fetch_assoc()){
							 ?>		
								<li>
									<div class="col-md" style="margin-right: 25px">
										<a href="" class="compare-in"><img src="imgs/<?= $row["ProID"] ?>/main.jpg" alt="..." height="180px">	
											<div class="compare" style="width: 297px;height: 175px; margin-left: -15px">
												<span style="width: 100px;padding: 17px">Đặt mua</span>
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

					<div class="content-bottom" style="margin-top: 50px; margin-bottom:60px">
						<h3 class="future" style="width: 1225px">SẢN PHẨM CÙNG HÃNG</h3>
						<div class="content-bottom-in">
							<ul id="flexiselDemo1">			
								<?php
								$sql = "select * from products where ManID = $hang order by rand() limit 0,5";
     							$rs = load($sql);
      							while($row= $rs->fetch_assoc()){
							 ?>		
								<li>
									<div class="col-md" style="margin-right: 25px">
										<a href="" class="compare-in"><img src="imgs/<?= $row["ProID"] ?>/main.jpg" alt="..." height="180px">	
											<div class="compare" style="width: 297px;height: 175px; margin-left: -15px">
												<span style="width: 100px;padding: 17px">Đặt mua</span>
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
					</div>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
</body>
</html>