<?php

require_once '../lib/db.php';

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$sql = "delete from categories where CatID = $id";
	write($sql);
	header('Location: ../Admin_Loai.php');//vừa xóa xong là cập nhật lại ngay lập tức
}