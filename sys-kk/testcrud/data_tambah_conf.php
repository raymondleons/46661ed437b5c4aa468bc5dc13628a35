<?php
include('../../config/config.php');
	$col2 	= $_POST['col2'];
	$col3 	= $_POST['col3'];

	$stmt = $pemira->prepare("INSERT INTO testcrud(col2,col3) VALUES(:c2,:c3)");
	$stmt->execute(['c2'=> $col2,'c3'=> $col3]);    
?>