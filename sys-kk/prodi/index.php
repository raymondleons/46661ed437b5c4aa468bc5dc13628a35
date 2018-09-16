<?php 
$title = "Manage Study Program";
include('../../config/header.php'); //header 
?>
<!-- ============================================================== -->
<script type="text/javascript">

        window.onload = loadprodi;

        function loadprodi(){
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'prodi_load',
            data: '1',
            success: function(data) {
                //console.log(data);
                $('#datamenu').empty();
                $('#datamenu').append(data);
            },
            error: function() { 
                $('#datamenu').empty();
                $('#datamenu').append("<center> <b> Ajax Error Bro </b> </center>");
            } 
            });
        }
</script>

    <div class="row">
        <h4 class="page-title">Manage Study Program</h4>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-10"><h4> Menu </h4></div>
                    <div class="well pull-right"> 
                    <button class="btn btn-success " data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> </button>
                    <button class="btn btn-primary " id="edit" style="display: none;"> <i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-danger " id="delete" style="display: none;"> <i class="fa fa-close"></i> </button>
                    </div>
                </div><br>

                <table class="table table-striped table-bordered table-hover ">
                    <tr>
                        <th>Jurusan</th>
                        <th>ID Prodi</th>
                        <th>Prodi</th>
                    </tr>
                    
                    <tbody id="datamenu"></tbody>
            </table>



            </div>
        </div>
    </div>       


<!-- ============================================================== -->
<?php include('../../config/footer.php'); //footer ?>

<!-- Modal add menu-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-plus'></i> Tambah Prodi Baru</h4>
      </div>
      <div class="modal-body">
        <form id="formtambah" name="formtambah" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Prodi</label>
                <input type="text" name="nama_menu" class="form-control" placeholder="Masukan Nama Prodi">
                <small id="emailHelp" class="form-text text-muted">Nama prodi tidak disingkat</small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Prodi</label>
                <input type="text" name="nama_menu" class="form-control" placeholder="Masukan Nama Prodi">
                <small id="emailHelp" class="form-text text-muted">Pilih jurusan yang menaungi </small>
            </div>
            <div > <center> <button type="submit" class="btn btn-success"> Tambah Prodi</button></center></div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- script clickrow//jquery -->
<script type="text/javascript">
                function get_prodi(rowid){
                    //alert(rowid);
                    var id = "#"+rowid;
                    if($( id ).is( ".table-success" )){
                        $(id).removeClass("table-success");   
                        $("#edit").css("display", "none");
                        $("#delete").css("display", "none");
                        parentid="null";                        
                    }else{
                        $('tr').removeClass("table-success");
                        $(id).addClass("table-success");
                        $("#edit").css("display", "inline-block");
                        $("#delete").css("display", "inline-block");
                        ajax(rowid);
                        parentid=rowid;
                        $('#parentid').val(parentid);                        
                    }
                    
                }   
                </script>  
<!-- end modal -->
