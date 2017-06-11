<?php
	require_once "../core/twilio.config.inner.php"; 
	require_once "../core/config.php"; 
?>
<?php

	if (!Session::exists('userid')) {
			Redirect::to('../index.php');
	}else{

		$announcement = Announcement::findAll();
		// get userid from session
		$userid = Session::get('userid');
		$cleanid = encryptor('decrypt',$userid);

		$user = User::findById($cleanid);
		$suspend = new User();

		// grab view
		require_once '../views/view.utility.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$phone = prepare($_POST['phone']);
			$deactivate = $_POST['deactivate'];

			if (!empty($phone)) {
				if ($phone == $user->phone) {

					$suspend->id = $user->id;
	                $suspend->suspended = $deactivate;
	                $suspend->status = 0;
	                $suspend->access = $user->access;
	                $suspend->phone = $user->phone;
	                $suspend->username = $user->username;
	                $suspend->password = $user->password;
	                $suspend->fname = $user->fname;
	                $suspend->sname = $user->sname;
	                $suspend->lname = $user->lname;
	                $suspend->sex = $user->sex;
	                $suspend->avatar = $user->avatar;
	                $suspend->token = $user->token;
	                $suspend->created = $user->created;

	                if ($suspend->update()) {
	                	Session::delete('userid');
	                	Redirect::to('../.');
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
				<?php require_once '../views/menu_public.php' ?>
			</div>
				<div class="twelve wide column">
					<div class="ui grid two columns stackable">
						<div class="sixteen wide column">
							
							<div class="ui very padded segment">
								<?php require_once '../views/suspend.account.php'; ?>
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
		<script src="../js/calendar.min.js"></script>
		<script src="../js/customscrollbar.min.js"></script>
		<script src="../js/common.js"></script>
		<!--<script src="../js/form-processing.js"></script>-->
		<script src="../js/process.message.js"></script>
		<script src="../js/process.topic.js"></script>
		<script src="../js/delete.forum.js"></script>
		<script src="../js/custom-scroller.js"></script>
	</body>
</html>