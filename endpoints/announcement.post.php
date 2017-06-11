<?php
	require_once '../core/twilio.config.php';
	require_once '../core/functions.php';

	$link = openDB();
	$data = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$user = escape($_POST['user'],$link);
		$recipient = escape($_POST['recipient'],$link);
		$subject = escape($_POST['topic'],$link);
		$description = escape($_POST['description'],$link);
		$created = time();

		$numbers = array();

		if(!empty($topic) && !empty($description)){


			$query = "INSERT INTO announcement(user_id,subject,announcement,created) 
			VALUES('$user','$subject','$description','$created')";

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
				'message' => 'Sorry, you must provide a title and content of your forum post'
			);
		}
	}
	echo json_encode($data);
	closeDB($link);

?>