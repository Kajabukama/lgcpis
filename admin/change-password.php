<?php
	require_once "../core/twilio.config.inner.php"; 
	require_once "../core/config.php"; 
?>
<?php

	if (!Session::exists('userid')) {
			Redirect::to('../index.php');
	}else{

		// statically fetching all records by table

		$announcement = Announcement::findAll();
		$officers = Officer::findAll();

		// instantiating objects
		$officer = new Officer();
		$new_user = new User();
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
		$password = generateString(8);

		// grab view
		require_once '../views/view.utility.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$new = $_POST['new'];
			$confirm = $_POST['confirm'];

			if(empty($new) && empty($confirm)){
				echo "<script>alert('Sorry, either New Password or Confirm fields is empty')</script>";
				$new = $confirm = "";
			} else {
				// update account
				$new_user->fname = $user->fname;
		        $new_user->sname = $user->sname;
		        $new_user->lname = $user->lname;
		        $new_user->sex = $user->sex;
		        $new_user->phone = $user->phone;
		        $new_user->username = $user->username;
		        $new_user->password = md5($new);
		        $new_user->token = $user->token;
		        $new_user->access = $user->access;
		        $new_user->suspended = $user->suspended;
		        $new_user->avatar = $user->avatar;
		        $new_user->status = $user->status;
		        $new_user->created = $user->created;
		        $new_user->id = $user->id;

		        $sms  = "Congratulations ".$new_user->fullName().", your new password is : ".$new;
	        	$to = $user->phone;

	        	
	        	$log = $user->fullName()." changed account password";
	        	logAction('Password Change',$log);

	        	// update user account
	        	$new_user->update();
				try {
		            $client->messages->create($to,array('from'=>$from, 'body'=>$sms));
		            Redirect::to('welcome?userid=$userid&view=welcome');

		        }catch(Exception $e){
		            echo 'Message: ' .$e->getMessage();
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
				
		<?php  require_once '../views/menu.admin.php'; ?>

		<div class="ui grid two columns centered stackable container fluid">
			<div class="four wide column">
				<?php require_once '../views/menu-admin.php' ?>
			</div>
				<div class="twelve wide column">
					<div class="ui grid two columns stackable">
						<div class="sixteen wide column">
							<div class="ui padded segment">
								<?php require_once '../views/change.password.php'; ?>
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
		<script src="../js/delete.forum.js"></script>
		<script src="../js/custom-scroller.js"></script>
	</body>
</html>