<?php

require_once '../lib/db.php';

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$sql = "delete from manufacturer where ManID = $id";
	write($sql);
	header('Location: ../Admin_Hang.php');//vừa xóa xong là cập nhật lại ngay lập tức
}