<?php
	// session_start();
	require_once'lib/db.php';
	require_once'cart.inc';
	if ($_SESSION["dang_nhap_chua"] !=2) {
		header('Location:index.php');
	}
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	
	<?php include 'Trang_Admin/Content_AdminHoadon.php'; ?>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>