<?php
include('../../config/config.php'); 

    //load data menjadi API ini untuk data table masih belum perlu

    
    $stmt = $pemira->prepare("SELECT * FROM testcrud");
	$stmt->execute();

	if($stmt->errorCode() > 0) {
	    $errors = $stmt->errorInfo();
	    echo("<center><h3>".$errors[2]."</center></h3>");
	    exit;
    }

    $count = $stmt->rowCount();
    if($count<1){
    	//<tr>
		//<td colspan="3"> No Data Found </td>
     } 
	
    echo '{"data": [';
    	$x=0;
    while ($row = $stmt->fetchObject()) {
    		echo '["'.$row->id.'","'.$row->col2.'","'.$row->col3.'"]';
    		if($x<1){
    			echo ",";
    		}
    	$x++;
 	} 
 	echo ']}';
 	?>