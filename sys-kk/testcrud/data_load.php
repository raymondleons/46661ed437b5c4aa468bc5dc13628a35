<?php
include('../../config/config.php'); 
    //load menu

    
    $stmt = $pemira->prepare("SELECT * FROM testcrud");
	$stmt->execute();

	if($stmt->errorCode() > 0) {
	    $errors = $stmt->errorInfo();
	    echo("<center><h3>".$errors[2]."</center></h3>");
	    exit;
    }

    $count = $stmt->rowCount();
    if($count<1){?>
    	<tr>
		<td colspan="3"> No Data Found </td>
    <?php } 

    while ($row = $stmt->fetchObject()) {
	?>
	
	<tr id="<?= $row->id; ?>" onclick="row_click(<?= $row->id; ?>)">
		<td> <?= $row->id; ?></td>
		<td> <?= $row->col2; ?></td>
		<td> <?= $row->col3; ?></td>
	</tr>
	
<?php } ?>