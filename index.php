<?php 
	// Require Models
	require('models/database.php');
	require('models/student.php');

	// Decleare Action
	if (isset($_POST['action'])) {
		$action = htmlspecialchars($_POST['action']);
	}elseif (isset($_GET['action'])) {
		$action = htmlspecialchars($_GET['action']);
	}else{
		$action ="home";
	}
	

	switch ($action) {
		case 'register':
			$data = [
				'matric_no' => "SMS" . rand(1000000, 9999999),
				'first_name' => htmlspecialchars($_POST['first-name']),
				'last_name' => htmlspecialchars($_POST['last-name']),
				'gender' => htmlspecialchars($_POST['gender']),
				'phone' => htmlspecialchars($_POST['phone-number']),
				'email' => htmlspecialchars($_POST['email']),
				'password' => htmlspecialchars($_POST['password'])
			];

			if (validateData($data, $connection)) {
				registerStudent($data, $connection);
			}
			break;
		case 'signup':
			require('views/register.php');
			break;
		case 'login':
			require('views/login.php');
			break;
		default:
			require('views/home.php');
			break;
	}
	

			// register();