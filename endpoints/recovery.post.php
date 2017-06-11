<?php
	require_once '../core/functions.php';

	$link = openDB();
	$data = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$phone = clean($_POST['phone']);

		if(!empty($phone)){

			
            $query = "SELECT * FROM users WHERE phone = '$phone' LIMIT 1";
            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) > 0){
                
                $data[] = array(
                    'status'=>'success',
                    'message'=>'Email and phone are available'
                );
            }else{
                $data[] = array(
                    'status'=>'error',
                    'message'=>'Email and phone are not available'
                );
            }
            
		}else{
			$data[] = array(
                'status'=>'failed',
                'message'=>'Sorry, you did not provide an email or phone number'
            );
		}
		echo json_encode($data);
	}


?>