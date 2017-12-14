<?php
	require_once "lib/db.php";
	if (!isset($_GET["id"])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	<?php include 'LayoutPrivate/Content_ChitietSP.php'; ?>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>