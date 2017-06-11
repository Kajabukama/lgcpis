<?php require_once "../core/config.php"; ?>
<?php

	if (!Session::exists('userid')) {
			Redirect::to('../index.php');
	}else{

		// statically fetching all records by table

		$announcement = Announcement::findAll();
		$messages = Message::findAll();
		$users = User::findAll();
		$officers = Officer::findAll();
		$citi = Citizen::findAll();

		// print_r($citizens);
		


		// instantiating objects
		$announce = new Announcement();
		$message = new Message();
		$topic = new Forum();

		// get userid from session
		$userid = Session::get('userid');

		// descrypt userid in session from database querying
		$cleanid = encryptor('decrypt',$userid);

		$user = User::findById($cleanid);
		$forums = Forum::findAll();
		// echo "<pre>",print_r($forum);
		// die();

		$citizen = Citizen::findById($cleanid);
		$mails_to = Message::toUserMessage($cleanid);

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
				
		<?php  require_once '../views/menu.ward.php'; ?>

		<div class="ui grid two columns centered stackable container fluid">
			<div class="four wide column">
				<?php require_once '../views/menu-ward.php' ?>
			</div>
				<div class="twelve wide column">
					<div class="ui grid two columns stackable">
						<div class="eleven wide column">
							<div class="sixteen wide column">
								<div class="ui clearing segment basic action-btn">
									<div class="ui teal basic right floated right labeled icon button sms"><i class="mail icon"></i> New Message
									</div>
									<a href="send-announcement.php?userid=<?php echo $userid; ?>&view=welcome" class="ui teal basic right floated right labeled icon button announce"><i class="mail icon"></i> New Announcement
									</a>
								</div>

							</div>
							<div class="ui segment">
								<?php require_once '../views/tabs.ward.php'; ?>
							</div>
						</div>
						<div class="five wide column">
							<div class="ui segment">
								<?php require_once '../views/statistics.php'; ?>
							</div>
						</div>
					</div>	
				</div>

				<?php require_once '../views/modal.message.php' ?>
				<?php require_once '../views/modal.alert.php'; ?>
		</div>
		<script src="../js/jquery-3.2.0.min.js"></script>
		<script src="../js/semantic.min.js"></script>
		<script src="../js/customscrollbar.min.js"></script>
		<script src="../js/common.js"></script>
		<!--<script src="../js/form-processing.js"></script>-->
		<script src="../js/process.message.js"></script>
		<script src="../js/process.announcement.js"></script>
		<script src="../js/delete.forum.js"></script>
		<script src="../js/custom-scroller.js"></script>
	</body>
</html>