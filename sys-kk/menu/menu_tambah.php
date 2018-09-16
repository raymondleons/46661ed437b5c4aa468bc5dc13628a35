<?php
include('../../config/config.php');
	$nama 	= $_POST['nama_menu'];
	$fa 	= $_POST['fa_icon'];
	$detail = $_POST['detail_menu'];
	$url 	= $_POST['url_menu'];

	$stmt = $pemira->prepare("INSERT INTO tbl_menu(nama_menu,url,fa_icon,detail) VALUES(:nama_menu,:url,:fa_icon,:detail)");
	try{
		//input Berhasil
		$stmt->execute(['nama_menu'=> $nama,'url'=> $url,'fa_icon'=> $fa,'detail'=> $detail]);

	}catch(Exception $e){
		//input gagal
	 	echo "Insert Error";
	}
    
?>