<?php
include('../../config/config.php');
	$id_menu = $_POST['id_menu'];
	$nama 	 = $_POST['nama_menu'];
	$fa 	 = $_POST['fa_icon'];
	$detail  = $_POST['detail_menu'];
	$url 	 = $_POST['url_menu'];

	$stmt = $pemira->prepare("UPDATE tbl_menu SET nama_menu=:nama_menu,url=:url,fa_icon=:fa_icon,detail=:detail WHERE id_menu=:id_menu");
	try{
		//input Berhasil
		$stmt->execute(['nama_menu'=> $nama,'url'=> $url,'fa_icon'=> $fa,'detail'=> $detail, 'id_menu'=>$id_menu]);
		//echo $id_menu;
	}catch(Exception $e){
		//input gagal
	 	echo "Insert Error";
	}
    
?>