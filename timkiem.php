<?php 
	require_once'lib/db.php';
	require_once 'cart.inc';
	if (!isset($_POST["btnSearch"])) {
		header('location: index.php');
	}
	$bool = 0;
	if(isset($_POST["btnSearch"]))
	{
		$bool = 1;
		$timkiem = $_POST["txtSearch"];	  
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	<?php include 'LayoutPrivate/Content_Timkiem.php'; ?>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>