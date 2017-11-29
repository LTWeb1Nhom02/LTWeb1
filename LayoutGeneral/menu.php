<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
				<div class="col-md-3">
					<div class="single-bottom">
						<h4>DANH MỤC</h4>
						<ul>
						<?php
						$sql = "select * from categories";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
						?>
							<li><a href="product.php?id=<?= $row["CatID"] ?>"><i> </i><?= $row["CatName"] ?></a></li>
							
						<?php
						endwhile;
						?>
						</ul>
					</div>
					<div class="single-bottom">
						<h4>HÃNG SẢN XUẤT</h4>
						<ul>
						<?php
						$sql = "select * from manufacturer";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
						?>
							<li><a href="#"><i> </i><?= $row["ManName"] ?></a></li>
						<?php
						endwhile;
						?>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
</body>
</html>