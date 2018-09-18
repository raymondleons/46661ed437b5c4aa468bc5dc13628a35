<?php
    include '6FF04ACB62FFB0B2B0C80072D47C3C89.php';
    //echo encrypt_decrypt('encrypt', 'e-vote');
   
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
         $pemira = new PDO("mysql:host=localhost;dbname=".DS7EC0BABD75C4F('a3dBREU5ZjZtNkpiSDd1clVxNnJudz09'), 'root', '');
         //echo "<script> alert('MASHOK PAk EKO'); </script>";
    } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }




?>