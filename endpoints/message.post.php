<?php
	require_once '../core/functions.php';

	$link = openDB();
	$data = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$sender = escape($_POST['sender'],$link);
		$recipient = escape($_POST['recipient'],$link);
		$subject = escape($_POST['subject'],$link);
		$message = escape($_POST['message'],$link);
		$created = time();

		if(!empty($recipient) && !empty($subject) && !empty($message)){

			$query = "INSERT INTO messages(from_user,to_user,subject,message,created) 
			VALUES('$sender','$recipient','$subject','$message','$created')";

			$result = mysqli_query($link, $query);
			
			if (mysqli_affected_rows($link) == 1) {
				$data[] = array(
					'type' => 'success',
					'message' => 'successfully saved data'
				);
			}else{
				$data[] = array(
					'type' => 'error',
					'message' => 'Sorry, there was an error in saving your data'
				);
			}
		}else{
			$data[] = array(
				'type' => 'empty',
				'message' => 'Sorry, you must provide a subject, message and recipient info'
			);
		}
		
	}

	echo json_encode($data);
	closeDB($link);

?>