<?php require_once "../core/config.php"; ?>
<?php

	if (!Session::exists('userid')) {
			Redirect::to('../index.php');
	}else{

	
		$users = User::findAll();
		$officers = Officer::findAll();
		$citizens = Citizen::findAll();
		
		// get userid from session
		$userid = Session::get('userid');
		$cleanid = encryptor('decrypt',$userid);

		$user = User::findById($cleanid);

		$status = $color_status = $action = "";
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
						<div class="sixteen wide column">
							<div class="ui segment">
								<?php require_once '../views/tabs.officers.php'; ?>
							</div>
						</div>
					</div>	
				</div>
		</div>
		<script src="../js/jquery-3.2.0.min.js"></script>
		<script src="../js/semantic.min.js"></script>
		<script src="../js/customscrollbar.min.js"></script>
		<script src="../js/common.js"></script>
		<script src="../js/form-processing.js"></script>
		<script src="../js/custom-scroller.js"></script>
	</body>
</html>