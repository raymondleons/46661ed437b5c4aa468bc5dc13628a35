<?php
include('../../config/config.php');
	$id_menu = $_POST['id_menu'];
	$nama 	 = $_POST['nama_menu'];
	$fa 	 = $_POST['fa_icon'];
	$detail  = $_POST['detail_menu'];
	$url 	 = $_POST['url_menu'];

	$stmt = $pemira->prepare("UPDATE tbl_menu SET nama_menu=:nama_menu,url=:url,fa_icon=:fa_icon,detail=:detail WHERE id_menu=:id_menu");
	$stmt->execute(['nama_menu'=> $nama,'url'=> $url,'fa_icon'=> $fa,'detail'=> $detail, 'id_menu'=>$id_menu]);

	//cek berhasil atau tidak query nya
	if ($stmt->rowCount()){
		echo '1';
	}else{
		echo $pemira->errorInfo();
	}
		
	
    
?>