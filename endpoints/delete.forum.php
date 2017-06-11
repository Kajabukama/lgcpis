<?php
    require_once '../core/functions.php';
    
	$link = openDB();
    $data = array();

    $data[] = array(
        'status' => 'success',
        'message' => 'Working'
    );

    echo json_encode($data);
    closeDB($link);

?>