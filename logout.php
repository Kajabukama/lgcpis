<?php
	require_once './core/config.php';

	if (isset($_GET['action'])) {
		
		$action = $_GET['action'];

		if ($action == 'logout') {
			
			$user = User::findById(encryptor('decrypt',Session::get('userid')));
			$log = $user->username." logged out successfully";

			Online::deleteOnline(encryptor('decrypt',Session::get('userid')));

			logAction('logout',$log);
			if (Session::exists('userid')) {
				Session::delete('userid');
				Redirect::to('index.php');
			}

		}

	}

