<?php
	require_once "../core/twilio.config.inner.php"; 
	require_once "../core/config.php"; 
?>
<?php

	if (!Session::exists('userid')) {
			Redirect::to('../index.php');
	}else{

		// instantiating objects
		$citi = new Citizen();
		$new_user = new User();
		// get userid from session
		$userid = Session::get('userid');

		// decrypt userid in session for database querying
		$cleanid = encryptor('decrypt',$userid);

		$user = User::findById($cleanid);
		$citizen = Citizen::findById($cleanid);

		// grab view
		require_once '../views/view.utility.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$citi->id = $citizen->id;
	        $citi->region_name = $_POST['region'];
	        $citi->district_name = $_POST['district'];
	        $citi->ward_name = $_POST['ward'];
	        $citi->type_name = $_POST['type'];
	        $citi->title = $_POST['title'];
	        $citi->fname = $_POST['fname'];
	        $citi->sname = $_POST['sname'];
	        $citi->lname = $_POST['lname'];
	        $citi->sex = $_POST['sex'];
	        $citi->dob = $_POST['dob'];
	        $citi->phone = $_POST['phone'];
	        $citi->email = $_POST['email'];
	        $citi->houseno = $_POST['houseno'];
	        $citi->streetname = $_POST['street'];
	        $citi->occupation = $_POST['occupation'];
	        $citi->created = $citizen->created;

	        $new_user->fname = $citi->fname;
	        $new_user->sname = $citi->sname;
	        $new_user->lname = $citi->lname;
	        $new_user->sex = $citi->sex;
	        $new_user->phone = $citi->phone;
	        $new_user->password = $citi->email;
	        $new_user->username = $user->username;
	        $new_user->password = $user->password;
	        $new_user->token = $user->token;
	        $new_user->access = $user->access;
	        $new_user->suspended = $user->suspended;
	        $new_user->avatar = $user->avatar;
	        $new_user->status = $user->status;
	        $new_user->created = $citizen->created;
	        $new_user->id = $citizen->id;

        	// create account
        	if($citi->update()){
        		$new_user->update();
        		Redirect::to('update-profile?userid=$userid&view=welcome');
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
								<?php require_once '../views/update.profile.php'; ?>
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