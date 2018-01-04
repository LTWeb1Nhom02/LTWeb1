<?php 
	$show=0;
	require_once'lib/db.php';
	require_once 'cart.inc';
	if ($_SESSION["dang_nhap_chua"] ==0) {
		header("Location: index.php");
	}
	if (!isset($_GET["id"])) {
		header('Location: index.php');
	}
	$id = $_GET["id"];
	if($_SESSION["current_user"]->f_ID!=$id){ 
		header('Location: index.php');
	}
	$sql = "select * from users where f_ID  = $id";
	$rs = load($sql);
	while ($row = $rs->fetch_assoc()) {
	$pass= $row["f_Password"];
}
	if (isset($_POST["btnDoiMK"])) {
		$passcu=$_POST["txtmkcu"];
		$cu = md5($passcu);
		if($pass!=$cu){ 
			$show=2;
		}else{
		$passmoi = $_POST["txtmkmoi"];
		$moi = md5($passmoi);
		$xacnhan = $_POST["txtxacnhan"];
		$u_sql = "update users set f_Password = '$moi'";
		write($u_sql);
		$show = 1;
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'LayoutGeneral/linkketnoi.php'; ?>
</head>
<body>
	<?php include 'LayoutGeneral/header.php'; ?>
	<?php include 'LayoutPrivate/Content_DoiMK.php'; ?>
	<?php include 'LayoutGeneral/flooter.php'; ?>
</body>
</html>