<?php
	include('../../config/config.php');
	$id = $_POST['id'];
	$stmt = $pemira->prepare("DELETE from tbl_menu where id_menu=:id");
    $stmt->execute(['id' => $id]);
?>