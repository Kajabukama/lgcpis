<?php require_once "../core/config.php"; ?>
<?php

	if (!Session::exists('userid')) {
			Redirect::to('../index.php');
	}else{

		$from = encryptor('decrypt', $_GET['from']);
		$mid = $_GET['mid'];

		// statically fetching all records by table

		$announcement = Announcement::findAll();
		$forums = Forum::findAll();
		$users = User::findAll();
		$officers = Officer::findAll();

		// echo "<pre>",print_r($officers);
		// die();
		// instantiating objects
		$announce = new Announcement();
		$message = new Message();
		$topic = new Forum();

		// get userid from session
		$userid = Session::get('userid');

		// descrypt userid in session from database querying
		$cleanid = encryptor('decrypt',$userid);

		$user = User::findById($cleanid);
		$citizen = Citizen::findById($cleanid);
		$mails_to = Message::toUserMessage($cleanid);

		$from_user = User::findById($from);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$reply = new Message();

			$user_from = $cleanid;
			$user_to  = $from;
			$sms = $_POST['message'];
			$subject = $_POST['subject'];

			$reply->id = randomToken(5);
			$reply->from_user = $user_from;
			$reply->to_user = $user_to;
			$reply->message = $sms;
			$reply->subject = $subject;
			$reply->created = time();

			if ($reply->create()) {
				Redirect::to('welcome?userid='.$userid.'&view=welcome');
			}

		}


		// grab view
		require_once '../views/view.utility.php';
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
		<link rel="stylesheet" href="../css/customscrollbar.min.css">
		<link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>
				
		<?php  require_once '../views/menu.admin.php'; ?>

		<div class="ui grid two columns centered stackable container fluid">
			<div class="four wide column">
				<?php require_once '../views/menu-admin.php' ?>
			</div>
				<div class="twelve wide column">
					<div class="ui grid two columns stackable">
						<div class="twelve wide column">
							<div class="sixteen wide column">
								<div class="ui clearing segment basic action-btn">
									<div class="ui teal basic right floated right labeled icon button sms"><i class="mail icon"></i> New Message
									</div>
								</div>
							</div>
							<div class="ui segment">
								<?php require_once '../views/tabs.reply.php'; ?>
							</div>
						</div>
						<div class="four wide column">
							<div class="ui segment">
								<?php require_once '../views/statistics.php'; ?>
							</div>
						</div>
					</div>	
				</div>

				<?php require_once '../views/modal.message.php' ?>
				<?php require_once '../views/modal.topic.php' ?>
				<?php require_once '../views/modal.password.php' ?>
				<?php require_once '../views/modal.alert.php'; ?>
		</div>
		<script src="../js/jquery-3.2.0.min.js"></script>
		<script src="../js/semantic.min.js"></script>
		<script src="../js/customscrollbar.min.js"></script>
		<script src="../js/common.js"></script>
		<script src="../js/form-processing.js"></script>
		<script src="../js/process.message.js"></script>
		<script src="../js/process.topic.js"></script>
		<script src="../js/delete.forum.js"></script>
		<script src="../js/custom-scroller.js"></script>
	</body>
</html>