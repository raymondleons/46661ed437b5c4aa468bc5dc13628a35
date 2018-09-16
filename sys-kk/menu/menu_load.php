<?php
include('../../config/config.php'); 
    //load menu
    $stmt = $pemira->query("SELECT * FROM tbl_menu");
    while ($row = $stmt->fetchObject()) {
	?>
	
	<tr id="<?= $row->id_menu; ?>" onclick="get_sub(<?= $row->id_menu; ?>)">
		<td> <?= $row->id_menu; ?></td>
		<td> <?= $row->nama_menu; ?></td>
		<td> <i class="fa <?= $row->fa_icon; ?>"> </i> </td>
		<td> <?= $row->detail; ?></td>
		<td> <?= $row->url; ?></td>

	</tr>
	
<?php } ?>