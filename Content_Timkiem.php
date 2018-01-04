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
						<h3 class="future" style="width: 915px">TIM KIẾM SẢN PHẨM</h3>
					<?php
						$show = 0;
						$sl=1;
						$limit = 6;

						$current_page = 1;
						if (isset($_GET["page"])) {
							$current_page = $_GET["page"];
						}

						$next_page = $current_page + 1;
						$prev_page = $current_page - 1;

						$c_sql = "select count(*) as num_rows from products";
						$c_rs = load($c_sql);
						$c_row = $c_rs->fetch_assoc();
						$num_rows = $c_row["num_rows"];
						$num_pages = ceil($num_rows / $limit);

						if ($current_page < 1 || $current_page > $num_pages) {
							$current_page = 1;
						}

						// $offset = 0;
						$offset = ($current_page - 1) * $limit;

						if($bool == 1)
    					{
     						if($timkiem == "")
      						{
       							$sql = "select *".
       							"from products " ;
     
       							
     						}

      						else
      						{
		   						$sql = "select * ".
								"from products " .
								"where ProName like '%$timkiem%' " .
								"LIMIT $offset, $limit";
								
      						}
      						
      		// 				
      		// 				if($timkiem=="đồ họa" || $timkiem=="kỹ thuật"||"đồ họa kỹ thuật"){
      		// 					$b=2;
      		// 					$sql = "select * ".
								// "from products " .
								// "where CatID = $b  " ;
							
      		// 				}
   						}
						$rs = load($sql);
						if ($rs->num_rows > 0) {
							
						while ($row = $rs->fetch_assoc()) {
							$proid = $row["ProID"];
							
						?>
						<div class="col-md-6 top-single" style="margin-top: 30px;">
							<div class="col-md" >
								<form method="post" action="addItemToCart.inc.php" >
								<input type="hidden" name="txtProID" value="<?= $proid ?>">
								<input type="hidden" class="form-control" value="1" name="txtQuantity" id="txtQuantity">
								<button style="border:none;" type="submit" name="btnAddItemToCart" class="compare-in"><img src="imgs/<?= $row["ProID"] ?>/main.jpg" alt="..." height="180px">	
								<div class="compare" style="width: 351.5px;height: 177px;margin-left: 5px">
									<span style="width: 100px;padding: 17px">Đặt mua</span>
								</div>
								</button>
							</form>
								<div class="top-content">
									<h5 style="text-align: center;color: blue;font-weight: bold;"><?= $row["ProName"] ?></h5>
									<h5 style="height: 60px;margin-top: -10px; margin-bottom: 10px;text-align: center;"><?= $row["TinyDes"] ?></h5>
									<div class="white">
										<a href="details.php?id=<?= $row["ProID"] ?>" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Xem chi tiết</a>
										<p class="dollar" style="color: blue;border:none;font-size: 20px;margin-top: 5px"> Giá: <?= number_format($row["Price"]) ?> VND</p>
										<div class="clearfix"></div>
									</div>
								</div>	
														
							</div>
						</div>

						<?php 
								}
							}
								else {
							?>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										Không có sản phẩm thoả điều kiện.
									</div>
							<?php
								}
						?>
						 <!-- <?php if ($prev_page > 0) : ?>
							<a class="btn btn-primary" href="?id=<?= $a ?> and page=<?= $prev_page ?>" role="button" style="margin-top: 70px;margin-left: 2%;width: 100px">
								Prev
							</a>
						<?php endif; ?>
						<?php if ($next_page <= $num_pages) : ?>
							<a class="btn btn-primary" href="?id=<?= $a ?> and page=<?= $prev_page ?>" role="button" style="margin-top: 70px;margin-left: 2%;width: 100px">
								Next
							</a>
						<?php endif; ?>  -->
					
						
						
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>