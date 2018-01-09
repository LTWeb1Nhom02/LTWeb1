<?php
	require_once "./lib/db.php";
	require_once 'cart.inc';
	if ($_SESSION["dang_nhap_chua"] !=2) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
	
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	<?php include 'Trang_Admin/Content_AdminLoai.php'; ?>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>