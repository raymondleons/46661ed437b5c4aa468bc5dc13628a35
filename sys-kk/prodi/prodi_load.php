<?php
include('../../config/config.php'); 

                //load menu
                $stmt = $pemira->query("SELECT * FROM tbl_prodi p, tbl_jurusan j WHERE p.id_jurusan = j.id_jurusan");
                while ($row = $stmt->fetchObject()) {
                ?>

                <tr id="<?= $row->id_prodi; ?>" onclick="get_prodi(<?= $row->id_prodi; ?>)">
                    <td> <?= $row->nama_jurusan; ?></td>
                    <td> <?= $row->id_prodi; ?></td>
                    <td> <?= $row->nama_prodi; ?>
                </tr>
                
<?php } ?>