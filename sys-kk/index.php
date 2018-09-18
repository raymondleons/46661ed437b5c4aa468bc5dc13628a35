<?php 
$title = "Sys-KK";
include '../config/header.php'; //header ?>
<!-- ============================================================== -->
     

    <div class="row">
        <h4 class="page-title">Sys. Kertas Kaca</h4>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-success ">
                          <div class="card-header">
                            Contoh CRUD
                          </div>
                          <div class="card-body" style="text-align: center; padding: 20px;">
                            <h5 class="card-title">file nya di folder : sys-kk/testcrud/</h5>
                            <p class="card-text">mau di persiskan boleh juga, atau improve sendiri <br> <i>ini CRUD tanpa refresh </i></p>
                            <a href="<?= base_url('sys-kk/testcrud/');?>" class="btn btn-primary">Klik Disini</a>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>       


<!-- ============================================================== -->
<?php include '../config/footer.php'; //footer ?>
