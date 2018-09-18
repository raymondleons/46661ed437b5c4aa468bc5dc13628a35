        <form id="formtambah" name="formtambah" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Col 2</label>
                <input type="text" name="col2" class="form-control" placeholder="Masukan col2" required="">
                <small id="emailHelp" class="form-text text-muted">Keterangan Textbox </small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Col 3</label>
                <input type="text" name="col3" class="form-control" placeholder="Masukan col3" required="">
                <small id="emailHelp" class="form-text text-muted">Keterangan Textbox </small>
            </div>
            
            <div > <center> <button type="submit" class="btn btn-success"> Tambah Data</button></center></div>
        </form>

<script type="text/javascript">
    //Tambah Menu 
    var frmtmbh = $('#formtambah');

    frmtmbh.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'data_tambah_conf',
            data: frmtmbh.serialize(),
            success: function (data) {
                 //Query berhasil ngeluarin return
             
                loaddata(); //load data ke index.php biar gak refresh gitu 
                $('#ModalTambah').modal('hide'); // <-- Tutup Modal tambah
                swal("Berhasil!", "Data berhasil di tambah!", "success"); //class itu success aau error
                 $("#modalbody-tambahdata").empty();
            },
            error: function (data) {
                $('#ModalTambah').modal('hide'); // <-- Tutup Modal tambah
                swal("Gagal!", "Ajax/Query error!", "error"); 
                //swal(data); //untuk lihat code error 
            },
        });
    });

</script>