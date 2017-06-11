<?php
	require_once "../core/twilio.config.inner.php"; 
	require_once "../core/config.php"; 
?>
<?php

	if (!Session::exists('userid')) {
			Redirect::to('../index.php');
	}else{

		// statically fetching all records by table

		$announcement = new Announcement();
		$officers = Officer::findAll();
		$citi = Citizen::findAll();

		// instantiating objects
		$officer = new Officer();
		$new_user = new User();
		// get userid from session
		$userid = Session::get('userid');

		// descrypt userid in session from database querying
		$cleanid = encryptor('decrypt',$userid);

		$user = User::findById($cleanid);
		$forums = Forum::findAll();

		$citizen = Citizen::findById($cleanid);
		$mails_to = Message::toUserMessage($cleanid);
		$password = generateString(8);

		// grab view
		require_once '../views/view.utility.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$title = $_POST['title'];
			$message = $_POST['message'];

			if (!empty($title) && !empty($message)) {

				$announcement->id = randomToken(5);
				$announcement->user_id = $cleanid;
				$announcement->title = $title;
				$announcement->announcement = $message;
				$announcement->created = time();

				if ($announcement->create()) {
					
					try{

						foreach ($citi as $key => $value) {
							$client->messages->create($value->phone ,array('from' => $from, 'body' => "Dear ".$value->fullName()." unataarifiwa kuwa : ".$message));
						}

					} catch(Exception $e){

						echo 'Message: ' .$e->getMessage();

					}
				}
			}

			
		}
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Local Government Citizen Participation Information System">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>LoGov : CiPaIS</title>
		<link rel="shortcut icon" href="../images/favicon.png">
		<link rel="stylesheet" href="../css/material-design-iconic-font.css">
		<link rel="stylesheet" href="../css/semantic.css">
		<link rel="stylesheet" href="../css/calendar.min.css" />
		<link rel="stylesheet" href="../css/customscrollbar.min.css">
		<link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>
				
		<?php  require_once '../views/menu.php'; ?>

		<div class="ui grid two columns centered stackable container fluid">
			<div class="four wide column">
				<?php require_once '../views/menu-ward.php' ?>
			</div>
				<div class="twelve wide column">
					<div class="ui grid two columns stackable">
						<div class="sixteen wide column">
							<div class="ui very padded segment">
								<?php require_once '../views/send-announcement.php'; ?>
							</div>
						</div>
						
					</div>	
				</div>

				<?php require_once '../views/modal.message.php' ?>
				<?php require_once '../views/modal.alert.php'; ?>
		</div>
		<script src="../js/jquery-3.2.0.min.js"></script>
		<script src="../js/semantic.min.js"></script>
		<script src="../js/calendar.min.js"></script>
		<script src="../js/customscrollbar.min.js"></script>
		<script src="../js/common.js"></script>
		<!--<script src="../js/form-processing.js"></script>-->
		<script src="../js/delete.forum.js"></script>
		<script src="../js/custom-scroller.js"></script>
	</body>
</html>