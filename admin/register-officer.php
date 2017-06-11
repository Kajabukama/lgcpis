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
		

		$citizen = Citizen::findById($cleanid);
		$new_citizen = new Citizen();

		$mails_to = Message::toUserMessage($cleanid);
		$password = generateString(8);

		// grab view
		require_once '../views/view.utility.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// register ward officer 
			$officer->id = randomToken(6);
			$officer->region_name = $_POST['region'];
			$officer->district_name = $_POST['district'];
			$officer->ward_name = $_POST['ward'];
			$officer->type_name = $_POST['type'];
			$officer->fname = $_POST['fname'];
			$officer->sname = $_POST['sname'];
			$officer->lname = $_POST['lname'];
			$officer->title = $_POST['title'];
			$officer->sex = $_POST['sex'];
			$officer->dob = $_POST['dob'];
			$officer->phone = prepare($_POST['mobile']);
			$officer->email = $_POST['email'];
			$officer->suspended = 0;
			$officer->created = time();


			// register citizen

			$new_citizen->region_name = $officer->region_name;
	        $new_citizen->district_name = $officer->district_name;
	        $new_citizen->ward_name = $officer->ward_name;
	        $new_citizen->type_name = $officer->type_name;
	        $new_citizen->title = $officer->title;
	        $new_citizen->fname = $officer->fname;
	        $new_citizen->sname = $officer->sname;
	        $new_citizen->lname = $officer->lname;
	        $new_citizen->sex = $officer->sex;
	        $new_citizen->dob = $officer->dob;
	        $new_citizen->phone = $officer->phone;
	        $new_citizen->email = $officer->email;
	        $new_citizen->houseno = $_POST['houseno'];
	        $new_citizen->streetname = $_POST['streetname'];
	        $new_citizen->occupation = $_POST['streetname'];
	        $new_citizen->created = $officer->created;
	        $new_citizen->id = randomToken(6);

			// create user account

			$new_user->fname = $officer->fname;
	        $new_user->sname = $officer->sname;
	        $new_user->lname = $officer->lname;
	        $new_user->sex = $officer->sex;
	        $new_user->phone = $officer->phone;
	        $new_user->email = $officer->email;
	        $new_user->username = $officer->email;
	        $new_user->password = md5($password);
	        $new_user->token = randomToken(3)."-".randomToken(2)."-".randomToken(3);
	        $new_user->access = 1;
	        $new_user->suspended = 0;
	        $new_user->avatar = "default.png";
	        $new_user->status = 1;
	        $new_user->created = time();
	        $new_user->id = $officer->id;

	        $sms  = "Hello ".$officer->fullName().", your account is ready, your password is : ".$password." you may change it later";
        	$to = $officer->phone;

        	// register officer account
        	$officer->create();
        	$new_citizen->create();

        	$log = $user->fullName()." created an officer account width id : {$officer->id}";
        	logAction('Officer Account',$log);

        	// create account
        	$new_user->create();
			try {
	            $client->messages->create($to,array('from'=>$from, 'body'=>$sms));
	            Redirect::to('welcome?userid=$userid&view=welcome');

	        }catch(Exception $e){
	            echo 'Message: ' .$e->getMessage();
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
								<?php require_once '../views/register.officer.php'; ?>
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