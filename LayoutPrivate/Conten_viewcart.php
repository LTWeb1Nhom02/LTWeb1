
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
</head>
<body>
	<div class="container" style="margin-top: 45px;">
			<div class="content">
				<!-- menuleft -->
					<?php include 'LayoutGeneral/menu.php'; ?>

				
				<!-- menuright -->
					<div class="col-md-9 top-single">
						<h3 class="future">Giỏ hàng</h3>
						<div class="panel-body">
						<form id="f" method="post" action="updateCart.inc.php">
							<input type="hidden" id="txtCmd" name="txtCmd">
							<input type="hidden" id="txtDProId" name="txtDProId">
							<input type="hidden" id="txtUQ" name="txtUQ">
						</form>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<th>Giá</th>
									<th class="col-md-2">Số lượng</th>
									<th>Thành tiền</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$total = 0;
							foreach ($_SESSION["cart"] as $proId => $q) :
								$sql = "select * from products where ProID = $proId";
								$rs = load($sql);
								$row = $rs->fetch_assoc();
								$amount = $q * $row["Price"];
								$total += $amount;
							?>
								<tr>
									<td><?= $row["ProName"] ?></td>
									<td><?= number_format($row["Price"]) ?></td>
									<!-- <td><?= $q ?></td> -->
									<td>
										<input class="quantity-textfield" type="text" name="" id="" value="<?= $q ?>">
									</td>
									<td><?= number_format($amount) ?></td>
									<td class="text-right">
										<a class="btn btn-xs btn-danger cart-remove" data-id="<?= $proId ?>" href="javascript:;" role="button">
											<span class="glyphicon glyphicon-remove"></span>
										</a>
										<a class="btn btn-xs btn-primary cart-update" data-id="<?= $proId ?>" href="javascript:;" role="button">
											<span class="glyphicon glyphicon-ok"></span>
										</a>
									</td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
							<tfoot>
								<td>
									<a class="btn btn-success" href="#" role="button">
										<span class="glyphicon glyphicon-backward"></span>
										Tiếp tục mua hàng
									</a>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><b><?= number_format($total) ?></b></td>
								<td class="text-right">
									<a class="btn btn-primary" href="#" role="button">
										<span class="glyphicon glyphicon-bell"></span>
										Thanh toán
									</a>
								</td>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
						
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>

	<script src="assets/jquery-3.1.1.min.js"></script>	
	<script src="./assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="./assets/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script type="text/javascript">
		$('.cart-remove').on('click', function() {
			var id = $(this).data('id');
			$('#txtDProId').val(id);
		    $('#txtCmd').val('D');
		    $('#f').submit();
		});

		$('.cart-update').on('click', function() {

			var q = $(this).closest('tr').find('.quantity-textfield').val();
			$('#txtUQ').val(q);

			var id = $(this).data('id');
			$('#txtDProId').val(id);
		    $('#txtCmd').val('U');

		    $('#f').submit();
		});

		$('.quantity-textfield').TouchSpin({
	        min: 1,
	        max: 69,
	        verticalbuttons: true,
            // step: 1,
            // decimals: 0,
            // boostat: 5,
            // maxboostedstep: 10,
            // postfix: '%'
	    });
	</script>
	
</body>
</html>