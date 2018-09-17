<?php
	include('../../config/config.php');
	$id = $_POST['id'];
	$stmt = $pemira->prepare("SELECT * FROM tbl_menu where id_menu=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetchObject();
?>
<form id="formedit" name="formtambah" method="POST">
		<div class="form-group">
            <label for="exampleInputEmail1">Id Menu</label>
            <input type="text" value="<?= $id; ?>" name="id_menu" class="form-control"  readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Menu</label>
            <input type="text" value="<?= $row->nama_menu; ?>" name="nama_menu" class="form-control" placeholder="Masukan Nama Menu">
            <small id="emailHelp" class="form-text text-muted">Nama menu yang akan muncul di header web</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">FA ICON</label>
            <div class="row">
            <div class="col-md-5">
            <input type="text" value="<?= $row->fa_icon; ?>" name="fa_icon" class="form-control" placeholder="Masukan Code Fa Icon" onkeyup="example()" id="facode">
            <small class="form-text text-muted"><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"> Klik disini untuk Library Fa Icon </a></small>
            </div>
            <div class="col md-5"><i class="fa <?= $row->fa_icon; ?>  fa-2x fa-fw" id="x"></i> </div>
            <script type="text/javascript">

                function example(){
                    var faclass = $("#facode").val();
                    var addclass = "fa fa-2x "+faclass;
                    $("#x").removeClass();
                    //alert(addclass);
                    $("#x").addClass(addclass);
                }
            </script>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Detail</label>
            <input type="text" value="<?= $row->detail; ?>" name="detail_menu" class="form-control" placeholder="Masukan Detail Menu">
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Url</label>
            <input type="text" value="<?= $row->url; ?>" name="url_menu" class="form-control" placeholder="Masukan Nama Menu">
            <small id="emailHelp" class="form-text text-muted">Masukan URL setelah http://localhost/pemira/</small>
        </div>
        <div > <center> <button type="submit" class="btn btn-success"> Edit Menu</button></center></div>
    </form>

    <script type="text/javascript">
        //fungsi untuk submit form edit
    	var frmedit = $('#formedit');

	    frmedit.submit(function (e) {

	        e.preventDefault();

	        $.ajax({
	            type: 'POST',
	            url: 'menu_edit_conf',
	            data: frmedit.serialize(),
	            success: function (data) {
	                //Edit menu Berhasil

                $('#editmenuModal').modal('hide'); // <-- Tutup Modal Edit

                //saat ajax dijalanin ke menu_edit_conf , bakal return 0-gagal atau 1-berhasil
                if(data=="1"){
                    swal({ //sweet Alert berhasil
                      title: "Berhasil!",
                      text: "Edit menu berhasil!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-primary",
                      confirmButtonText: "OK",
                      closeOnConfirm: true
                    },
                    function(){
                        //refresh page setelah tekan oke di tombol sukses
                      location.reload();
                    });
                }else{
                    swal({ //sweet Alert Gagal
                      title: "Edit Menu Gagal!",
                      text: "Edit menu Gagal!", // kalau mau lihat debug error ganti aja jadi => text: data,
                      type: "error",
                      showCancelButton: false,
                      confirmButtonClass: "btn-primary",
                      confirmButtonText: "OK",
                      closeOnConfirm: true
                    },
                    function(){
                        //refresh page setelah tekan oke di tombol sukses
                      //location.reload();
                    });
                }
                
	            },
	            error: function (data) {
	                console.log('Masukan Sub Menu gagal');
	                console.log(data);
	            },
	        });
	    });
    </script>