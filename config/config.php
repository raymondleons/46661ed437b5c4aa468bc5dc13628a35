<?php

//base_url
            function base_url($uri=''){
                $nama_hosting = "http://localhost/pemira/";

                if($uri==''){
                    return $nama_hosting;
                }else{
                    return $nama_hosting.$uri;    
                }  
            }
//end base_url

//koneksi
    try {
	     $pemira = new PDO("mysql:host=localhost;dbname=e-vote", 'root', '');
	     //echo "<script> alert('MASHOK PAk EKO'); </script>";
	} catch (\PDOException $e) {
	     throw new \PDOException($e->getMessage(), (int)$e->getCode());
	}




?>