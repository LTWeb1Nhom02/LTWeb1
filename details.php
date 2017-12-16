<?php
	require_once "./lib/db.php";
	// require_once 'cart.inc';

	if (!isset($_GET["id"])) {
		header('Location: index.php');
	}
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