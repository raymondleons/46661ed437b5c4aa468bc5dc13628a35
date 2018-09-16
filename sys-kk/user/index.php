<?php 
$title = "User Management";
include('../../config/header.php'); //header ?>
<!-- ============================================================== -->
     

    <div class="row">
        <h4 class="page-title">User Management</h4>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="card-box">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>NIM</th>
                        <th>User Level</th>
                        <th style="text-align: center">Action</th>
                      </tr>
                    </thead>
                        <?php
                            $stmt = $pemira->query("SELECT * FROM tbl_user u, tbl_mhs mhs, tbl_role r WHERE u.nim = mhs.nim AND u.role = r.id_role");
                            $count = $stmt->rowCount();
                            $no = 1;
                            
                                if($count<1){
                                    echo "<tr><td align='center' colspan='6'>No Data </td></tr>";
                                }
                                
                            while ($row = $stmt->fetchObject()) {
                        ?>
                        <tr>
                            <td> <?= $no++; ?></td>
                            <td> <?= $row->username; ?></td>
                            <td> <?= $row->nama; ?></td>
                            <td> <?= $row->nim; ?></td>
                            <td> <?= $row->level; ?></td>
                            <td style="text-align: center">
                              <a href="" class="btn btn-success" data-target="#ModalUpdate" data-whatever="<?= $row->username; ?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                              <?php echo "<a class='btn btn-danger' data-toggle='modal' data-target='#del_confirm' data-href='userdelete.php?id=".$row->username."'><i class='fa fa-user-times'></i></a>"; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>       


<!-- ============================================================== -->
<?php include('../../config/footer.php'); //footer ?>

<script type="text/javascript">


$(document).ready( function () {
    $('#table').DataTable();
} );
</script>