<?php
	include('../../config/config.php');
	$id = $_POST['id'];
	$stmt = $pemira->prepare("DELETE from testcrud where id=:id");
    $stmt->execute(['id' => $id]);
?>