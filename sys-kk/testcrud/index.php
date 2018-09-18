<?php 
$title = "TEST CRUD";
include('../../config/header.php'); //header ?>
<!-- ============================================================== -->

 
        <h4 class="page-title">Create Read Update delete | Test ajax | Without Refresh</h4>
        <div class="card bg-primary"><div class="card-header bg-primary">  
            Sebelum testing, dimohon untuk meng import SQL ini pada database.  
            <button type="button" id="download" class="btn btn-success"> <i class="fa fa-download fa-fw"> </i>Download Disini</button>
            <script type="text/javascript">
                $("#download").click(function() {
                    // // hope the server sets Content-Disposition: attachment!
                    var loc_file = '<?= base_url("assets/db/testcrud.sql"); ?>';
                    window.location = loc_file;
                });
            </script>
        </div></div>
<script type="text/javascript">
    var parentid = "null";
</script>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                	<div class="col-md-9"><h4> Menu </h4></div>
                	<div class="well pull-right"> 
                	<button class="btn btn-success " data-toggle="modal" data-target="#ModalTambah" onclick="formtambah()"> <i class="fa fa-plus"></i> </button>
                	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalEdit" id="edit" style="display: none;" onclick="formeditmodal()"> <i class="fa fa-pencil"></i> </button>
                	<button class="btn btn-danger " onclick="hapusdata()" id="delete" style="display: none;"> <i class="fa fa-close"></i> </button>
                	</div>
                </div><br>
                
                <table id="table_data" class="table table-striped table-bordered table-hover">
                	<thead class="">
                    <tr>
	                	<th>ID</th>
	                	<th>Col 2</th>
	                	<th>Col 3</th>
	                	
                	</tr>
                </thead>
                	<tbody id="datamenu">
                	
                	</tbody>
                </table>
                <script type="text/javascript">
                    //data table
                    /*$(document).ready(function() {
                        $('#table_data').DataTable({
                            "ajax": 'data_load_to_JSON'
                        });
                    } );*/

                </script>

            </div>
        </div>

      

<!-- Modal Tambah Data-->
<div id="ModalTambah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-plus'></i> Tambah Data</h4>
      </div>
      <div class="modal-body" id="modalbody-tambahdata">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
<!-- end modal -->



 <!-- Modal edit  menu-->
<div id="ModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-pencil'></i> Edit  Menu</h4>
      </div>
      <div class="modal-body" id="modalbody-editdata">
        Loading Data
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
<!-- end modal -->

    <script type="text/javascript">
        function row_click(rowid){

            
            //fungsi untuk agar row bisa di klik
            //alert(rowid);
                    //fungsi untuk row sub menu bisa di klik
                    //alert(rowid);
                    var id = "#"+rowid;
                    if($( id ).is( ".table-info" )){
                        $(id).removeClass("table-info");
                        $("#edit").css("display", "none");
                        $("#delete").css("display", "none");
                        window.parentid="null";
                    }else{
                        $('tr').removeClass("table-info");
                        $(id).addClass("table-info");
                        $("#edit").css("display", "inline-block");
                        $("#delete").css("display", "inline-block");
                        parentid=rowid;
                    }
                    
        }   
      </script>

      <script type="text/javascript">
        //fungsi load menu ajax
        window.onload = loaddata;
        function loaddata(){
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'data_load',
            data: '',
            success: function(data) {
                //console.log(data);
                $('#datamenu').empty();
                $('#datamenu').append(data);
            },
            error: function() { 
                $('#datamenu').empty();
                $('#datamenu').append("<center> <b> Ajax Error : Data Not Load </b> </center>");
            } 
        });
        }
      </script>   

    

<script type="text/javascript">
    //script disini untuk ambil form tambah kedalam modal

    //tambah data
    function formtambah(){
        $.ajax({
            cache: false,
            url: 'data_tambah',
            success: function (data) {
                //console.log(data);
                //$("#modalbody-tambahdata").empty();
                $("#modalbody-tambahdata").append(data);
            },
            error: function () {
                $("#modalbody-tambahdata").empty();
                $("#modalbody-tambahdata").append("<center><i class='fa fa-close fa-3x'> </i><br>AJAX file not found or else </center>");
            },
        });
    }
</script>
<script type="text/javascript">
    //ambil form edit menu
    function formeditmodal(){
       $.ajax({
            cache: false,
            type: 'POST',
            url: 'data_edit',
            data: 'id='+parentid,
            success: function (data) {
                //location.reload();
                $("#modalbody-editdata").empty();
                $("#modalbody-editdata").append(data);
                console.log(data);
            },
            error: function (data) {
                console.log('Ambil Gagal');
                console.log(data);
            },
        });
    }
</script>

<script type="text/javascript">
    //hapus menu
    function hapusdata(){
        //sebelum hapus keluarkan pesan dulu
        swal({
          title: "Apakah kamu yakin?",
          text: "Apakah kamu yakin ingin menghapus data id: "+parentid,
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yoi, Hapus aja!",
          closeOnConfirm: false
        },
        function(){
            //eksekusi hapus
            $.ajax({
                type: 'POST',
                url: 'data_hapus',
                data: 'id='+parentid,
                success: function (data) {
                    //Hapus Berhasil
                     loaddata(); //load data ke index.php biar gak refresh gitu 
                     swal("Berhasil!", "Data berhasil di tambah!", "success"); //class itu success aau error
                },
                error: function (data) {
                     swal("Gagal!", "Hmmm... sepertinya karena anda jomblo", "error"); //class itu success aau error
                },
            });
        });        
    }
</script>
<!-- ============================================================== -->
<?php include('../../config/footer.php'); //footer ?>
