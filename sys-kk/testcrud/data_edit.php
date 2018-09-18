<?php
	include('../../config/config.php');
	$id = $_POST['id'];
	  $stmt = $pemira->prepare("SELECT * FROM testcrud where id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetchObject();
?>
 <form id="formedit" name="formedit" method="POST">
            <div class="form-group">
                <label for="ID">ID</label>
                <input type="text" name="id" class="form-control" placeholder="ID" value="<?= $row->id; ?>" required="" readonly="">
            </div>
            <div class="form-group">
                <label for="Col2">Col 2</label>
                <input type="text" name="col2" class="form-control" placeholder="Masukan col2" value="<?= $row->col2; ?>" required="">
                <small id="emailHelp" class="form-text text-muted">Keterangan Textbox </small>
            </div>
            <div class="form-group">
                <label for="Col3">Col 3</label>
                <input type="text" name="col3" class="form-control" placeholder="Masukan col3" value="<?= $row->col3; ?>" required="">
                <small id="emailHelp" class="form-text text-muted">Keterangan Textbox </small>
            </div>
            
            <div > <center> <button type="submit" class="btn btn-success"> Edit Data</button></center></div>
        </form>

    <script type="text/javascript">
        //fungsi untuk submit form edit
    	var frmedit = $('#formedit');

	    frmedit.submit(function (e) {

	        e.preventDefault();

	        $.ajax({
	            type: 'POST',
	            url: 'data_edit_conf',
	            data: frmedit.serialize(),
	            success: function (data) {
	                //Edit menu Berhasil


                //saat ajax dijalanin ke menu_edit_conf , bakal return 0-gagal atau 1-berhasil
                if(data=="1"){
                     loaddata(); //load data ke index.php biar gak refresh gitu 
                     $('#ModalEdit').modal('hide'); // <-- Tutup Modal edit
                     $("#modalbody-editdata").empty(); // kosongin modal
                     swal("Berhasil!", "Data berhasil di tambah!", "success"); //class itu success aau error
                     
                        $("#edit").css("display", "none"); //hide button edit n delete
                        $("#delete").css("display", "none");
                }else{
                    swal("Gagal!", data, "error"); 
                }
                
	            },
	            error: function (data) {
	                swal("Gagal!", "Ajax file not found or parameter query error!", "error"); 
	            },
	        });
	    });
    </script>