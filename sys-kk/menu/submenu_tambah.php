<?php
include('../../config/config.php');
	$parent	= $_POST['parent'];
	$nama 	= $_POST['nama_submenu'];
	$detail = $_POST['detail_submenu'];
	$url 	= $_POST['url_submenu'];

	$stmt = $pemira->prepare("INSERT INTO tbl_menu_sub(id_parent,nama_menu_sub,url,detail) VALUES(:id_parent,:nama_submenu,:url,:detail)");
	try{
		$stmt->execute(['id_parent'=>$parent,'nama_submenu'=> $nama,'url'=> $url,'detail'=> $detail]);
		//input Berhasil
	}catch(Exception $e){
		//input gagal
	 	echo "Insert Error";
	}
    
?>