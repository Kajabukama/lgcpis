<?php
	require_once '../core/functions.php';

	$link = openDB();
	$data = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$user = escape($_POST['user'],$link);
		$region = escape($_POST['region'],$link);
		$topic = escape($_POST['topic'],$link);
		$description = escape($_POST['description'],$link);
		$created = time();

		if(!empty($topic) && !empty($description)){

			$query = "INSERT INTO forum(user_id,region_name,topic_name,description,created) 
			VALUES('$user','$region','$topic','$description','$created')";

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