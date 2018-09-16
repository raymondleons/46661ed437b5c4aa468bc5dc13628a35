<?php 
$title = "Menu Management";
include('../../config/header.php'); //header ?>
<!-- ============================================================== -->

 
        <h4 class="page-title">Menu Management</h4>

<script type="text/javascript">
    var parentid = "null";
</script>
    <div class="row">
        <div class="col-md-7">
            <div class="card-box">
                <div class="row">
                	<div class="col-md-9"><h4> Menu </h4></div>
                	<div class="well pull-right"> 
                	<button class="btn btn-success " data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> </button>
                	<button class="btn btn-primary " id="edit" style="display: none;"> <i class="fa fa-pencil"></i> </button>
                	<button class="btn btn-danger " id="delete" style="display: none;"> <i class="fa fa-close"></i> </button>
                	</div>
                </div><br>
                <table class="table table-striped table-bordered table-hover ">
                	<tr>
	                	<th>ID</th>
	                	<th>Nama Menu</th>
	                	<th>Fa Icon</th>
	                	<th>Detail</th>
	                	<th>URL</th>
	                	
                	</tr>
                	<tbody id="datamenu">
                	
                	</tbody>
                </table>

                <script type="text/javascript">
                function get_sub(rowid){
                	//alert(rowid);
                	var id = "#"+rowid;
                	if($( id ).is( ".table-success" )){
                		$(id).removeClass("table-success");
                		$('#submenu').empty();
               			$('#submenu').append("<h5 align='center'>-- <i> Choose Menu First </i> --</h5>");
                        $("#edit").css("display", "none");
                        $("#delete").css("display", "none");
                        parentid="null";
                        $("#tambahsub").css("display", "none");
                	}else{
                		$('tr').removeClass("table-success");
                		$(id).addClass("table-success");
                        $("#edit").css("display", "inline-block");
                        $("#delete").css("display", "inline-block");
                		ajax(rowid);
                        parentid=rowid;
                        $('#parentid').val(parentid);
                        $("#tambahsub").css("display", "inline-block");
                	}
                	
                }	
                </script>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-9">
                        <h4> Sub Menu </h4>
                    </div>
                    <div>
                        <button class="btn btn-success" id="tambahsub" data-toggle="modal" data-target="#myModal2" style="display: none;"> <i class="fa fa-plus"></i> </button>
                        <button class="btn btn-primary " id="editsub" style="display: none;"> <i class="fa fa-pencil"></i> </button>
                        <button class="btn btn-danger " id="deletesub" style="display: none;"> <i class="fa fa-close"></i> </button>
                    </div>
                </div><br>
                <div id="submenu" ><h5 align="center">-- <i> Choose Menu First </i> --</h5></div>
            </div>
        </div>
    </div>       
      <script type="text/javascript">
        function get_button(rowid){
            //alert(rowid);
            var id = "#s"+rowid;
            if($( id ).is( ".table-info" )){
                $(id).removeClass("table-info");
                $("#editsub").css("display", "none");
                $("#deletesub").css("display", "none");
            }else{
                $('tr').removeClass("table-info");
                $(id).addClass("table-info");
                $("#editsub").css("display", "inline-block");
                $("#deletesub").css("display", "inline-block");
                //ajax(rowid);
 //roman
            }
            
        }   
      </script>
      <script type="text/javascript">

	  	window.onload = loadmenu;
	  	function loadmenu(){
	  		$.ajax({
            cache: false,
            type: 'POST',
            url: 'menu_load',
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

      function ajax(rowid){
		 $.ajax({
            cache: false,
            type: 'POST',
            url: 'submenu',
            data: 'id=' + rowid,
            success: function(data) {
            	console.log(data);
            	$('#submenu').empty();
                $('#submenu').append(data);
            },
            error: function() { 
        	 	$('#submenu').empty();
        	 	$('#submenu').append("<center> <b> Ajax Error Bro </b> </center>");
    		} 
        });
	  }
      </script>        

<!-- Modal add menu-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-plus'></i> Tambah Menu</h4>
      </div>
      <div class="modal-body">
        <form id="formtambah" name="formtambah" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Menu</label>
                <input type="text" name="nama_menu" class="form-control" placeholder="Masukan Nama Menu">
                <small id="emailHelp" class="form-text text-muted">Nama menu yang akan muncul di header web</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">FA ICON</label>
                <div class="row">
                <div class="col-md-5">
                <input type="text" name="fa_icon" class="form-control" placeholder="Masukan Code Fa Icon" onkeyup="example()" id="facode">
                <small class="form-text text-muted"><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"> Klik disini untuk Library Fa Icon </a></small>
                </div>
                <div class="col md-5"><i class="fa fa-refresh fa-spin fa-2x fa-fw" id="x"></i> </div>
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
                <input type="text" name="detail_menu" class="form-control" placeholder="Masukan Detail Menu">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Url</label>
                <input type="text" name="url_menu" class="form-control" placeholder="Masukan Nama Menu">
                <small id="emailHelp" class="form-text text-muted">Masukan URL setelah http://localhost/pemira/</small>
            </div>
            <div > <center> <button type="submit" class="btn btn-success"> Tambah Menu</button></center></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
<!-- end modal -->

 <!-- Modal add sub menu-->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='fa fa-plus'></i> Tambah SUB Menu</h4>
      </div>
      <div class="modal-body">
        <form id="formtambahsub" name="formtambah" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Parent ID</label>
                <input type="text" name="parent" class="form-control" placeholder="Masukan Nama Menu" id="parentid" readonly="">
                <small id="emailHelp" class="form-text text-muted">Nama menu yang akan muncul di header web</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Sub Menu</label>
                <input type="text" name="nama_submenu" class="form-control" placeholder="Masukan Nama Menu">
                <small id="emailHelp" class="form-text text-muted">Nama Sub Menu yang akan muncul di header web</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Detail</label>
                <input type="text" name="detail_submenu" class="form-control" placeholder="Masukan Detail Menu">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Url</label>
                <input type="text" name="url_submenu" class="form-control" placeholder="Masukan Nama Menu">
                <small id="emailHelp" class="form-text text-muted">Masukan URL setelah http://localhost/pemira/</small>
            </div>
            <div > <center> <button type="submit" class="btn btn-success"> Tambah Sub Menu</button></center></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
<!-- end modal -->

<script type="text/javascript">
    //Tambah Menu
    var frm = $('#formtambah');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'menu_tambah',
            data: frm.serialize(),
            success: function (data) {
                location.reload();
            },
            error: function (data) {
                console.log('Masukan Menu gagal');
                console.log(data);
            },
        });
    });

    //Tambah Sub Menu
     var frm2 = $('#formtambahsub');

    frm2.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'submenu_tambah',
            data: frm2.serialize(),
            success: function (data) {
                location.reload();
                //console.log(data);
            },
            error: function (data) {
                console.log('Masukan Sub Menu gagal');
                console.log(data);
            },
        });
    });
</script>
<!-- ============================================================== -->
<?php include('../../config/footer.php'); //footer ?>
