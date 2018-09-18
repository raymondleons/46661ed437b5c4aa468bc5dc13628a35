<?php
include('../../config/config.php');
	$id = $_POST['id'];
	$col2 	 = $_POST['col2'];
	$col3 	 = $_POST['col3'];

	$stmt = $pemira->prepare("UPDATE testcrud SET col2=:c2,col3=:c3 WHERE id=:id");
	$stmt->execute(['c2'=> $col2,'c3'=> $col3, 'id'=>$id]);

	//return 1-berhasil atau error detail
	if ($stmt->rowCount()){
		echo '1';
	}else{
		echo $pemira->errorInfo();
	}
		
	
    
?>