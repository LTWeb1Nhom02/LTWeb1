
<?php
	require_once "./lib/db.php";
	if (!isset($_GET["id"])) {
		header('Location:../index.php');
	}
?>
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
		<div class="container" style="margin-top: 30px;">
			<div class="content">
				<!-- menuleft -->
				<?php include 'LayoutGeneral/menu.php'; ?>
				



				<!-- menuright -->
				<div class="col-md-9 top-in-single">
					<div class="col-md-5 single-top">	
						<ul id="etalage">
							<li>
								<img class="etalage_thumb_image img-responsive" src="images/Dell-873-312p-banner-873x312.jpg" alt="" >
								<img class="etalage_source_image img-responsive" src="images/Dell-873-312p-banner-873x312.jpg" alt="" >
					
							</li>
							<li>
								<img class="etalage_thumb_image img-responsive" src="images/Dell-873-312p-banner-873x312.jpg" alt="" >
								<img class="etalage_source_image img-responsive" src="images/Dell-873-312p-banner-873x312.jpg" alt="" >
							</li>
							<li>
								<img class="etalage_thumb_image img-responsive" src="images/banner1.jpg" alt=""  >
								<img class="etalage_source_image img-responsive" src="images/banner1.jpg" alt="" >
							</li>
						    <li>
								<img class="etalage_thumb_image img-responsive" src="images/bo-doi-card-do-hoa-galax-00pGf8.jpg"  alt="" >
								<img class="etalage_source_image img-responsive" src="images/bo-doi-card-do-hoa-galax-00pGf8.jpg" alt="" >
							</li>
						</ul>

					</div>	
					<?php
						$id = $_GET["id"];
						$sql = "select * from products where ProID = $id";
						$rs = load($sql);
						if ($rs->num_rows > 0) :
						$row = $rs->fetch_assoc();
					?>
					<div class="col-md-7 single-top-in">
						<div class="single-para">
							<div class="single-para">
								<h4><?= $row["ProName"] ?></h4>
								<div class="para-grid">
									<span  class="add-to"><?= number_format($row["Price"]) ?></span>
									<div class="clearfix"></div>
								 </div>
							</div>	 
							<div class="available">
								<h6>Chọn số lượng :</h6>
								<ul>
								<li>Quality:<select style="margin-left: 10px;width: 80px;">
								<?php 
									for ($i=1; $i <=69 ; $i++) { 
								 ?>
									<option><?php echo "$i"; ?></option>
								<?php
									}
								 ?>
									
								</select></li>
							</ul>
							</div>
							<p><?= $row["FullDes"] ?></p>
							
								<a href="#" class="hvr-shutter-in-vertical " style="width:200px; text-align: center;">Đặt mua</a>
							
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
				<div class="col-md-12 top-single">
						<div class="content-bottom" style="margin-top: 50px">
						<h3 class="future" style="width: 925px">SẢN PHẨM LIÊN QUAN</h3>
						<div class="content-bottom-in">
							<ul id="flexiselDemo0">			
								<li>
									<div class="col-md men">
										<img  src="images/banner4.jpg" alt="" height="200px"/>	
										<div class="top-content">
											<h5>Mascot Kitty - White</h5>
											<div class="white">
												<a href="#" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
												<a href="" title=""><p class="dollar"><span class="in-dollar">$</span><span>Mua</span></span></p></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>						
								</li>
								<li>
									<div class="col-md men">
										<img  src="images/banner4.jpg" alt="" height="200px"/>	
										<div class="top-content">
											<h5>Mascot Kitty - White</h5>
											<div class="white">
												<a href="#" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
												<a href="" title=""><p class="dollar"><span class="in-dollar">$</span><span>Mua</span></span></p></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="col-md men">
										<img  src="images/pic10.jpg" alt="" height="200px"/>	
										<div class="top-content">
											<h5>Mascot Kitty - White</h5>
											<div class="white">
												<a href="#" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
												<a href="" title=""><p class="dollar"><span class="in-dollar">$</span><span>Mua</span></span></p></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>							
								</li>
								<li>
									<div class="col-md men">
										<img  src="images/banner4.jpg" alt="" height="200px"/>	
										<div class="top-content">
											<h5>Mascot Kitty - White</h5>
											<div class="white">
												<a href="#" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
												<a href="" title=""><p class="dollar"><span class="in-dollar">$</span><span>Mua</span></span></p></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>					
								</li>
					
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
					</div>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	
</body>
</html>