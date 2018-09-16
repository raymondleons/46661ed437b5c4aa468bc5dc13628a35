<?php include('../../config/config.php'); ?>
<table class="table table-striped table-bordered">
	<tr>
    	<th>Nama Menu Sub</th>
    	<th>URL</th>
    	<th>Detail</th>
	</tr>
<?php
	$rowid = $_POST['id']; 
	//echo $rowid;
	$stmt = $pemira->prepare("SELECT * FROM tbl_menu_sub where id_parent=:id");
    $stmt->execute(['id' => $rowid]);
    $count = $stmt->rowCount();

    
		if($count<1){
			echo "<tr><td align='center' colspan='3'>No Data </td></tr>";
		}
		
    while ($row = $stmt->fetchObject()) {
?>
	<tr id="s<?= $row->id; ?>" onclick="get_button(<?= $row->id; ?>)">
		<td><?php echo $row->nama_menu_sub; ?></td>
		<td><?php echo $row->url; ?></td>
		<td><?php echo $row->detail; ?></td>
	</tr>
	<?php } ?>
</table>