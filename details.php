<?php
	require_once "./lib/db.php";
	// require_once 'cart.inc';

	if (!isset($_GET["id"])) {
		header('Location: index.php');
	}
	$id = $_GET["id"];
	$sql = "update products set luotxem = luotxem +1 where ProID = $id";
	load($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online shop</title>
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	<?php include 'LayoutPrivate/Content_ChitietSP.php'; ?>
	<?php include 'LayoutGeneral/flooter.php'; ?>

	
</body>
</html>