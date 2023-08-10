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
			$data = [
				'email' => htmlspecialchars($_POST['email']),
				'password' => htmlspecialchars($_POST['password'])
			];

			if (loginStudent($data, $connection)) {
				header("Location: .?action=home");
			}else{
				echo "<script>alert('Email / Password Incorrect!')</script>";
				echo "<script>window.location='.?action=signin'</script>";
			}

			break;
		case 'logout':

			logout();

			break;

			case 'signin':
			require('views/login.php');
			break;

		case 'students':
		
			$data = [
				'count' => 1,
				'students' => selectAllStudents($connection)
			];

			require('views/students.php');
			break;

		case 'add_student':
			$data = [
				'matric_no' => "SMS" . rand(1000000, 9999999),
				'first_name' => htmlspecialchars($_POST['first-name']),
				'last_name' => htmlspecialchars($_POST['last-name']),
				'gender' => htmlspecialchars($_POST['gender']),
				'dob' => htmlspecialchars($_POST['dob']),
				'phone' => htmlspecialchars($_POST['phone']),
				'email' => htmlspecialchars($_POST['email']),
				'faculty_id' => htmlspecialchars($_POST['faculty']),
				'department_id' => htmlspecialchars($_POST['department']),
				'option_id' => htmlspecialchars($_POST['option']),
				'image_name' => htmlspecialchars($_FILES['profile-image']['name']),
				'image_tmp_name' => htmlspecialchars($_FILES['profile-image']['tmp_name'])
			];
			

			// die(var_dump($data['image_tmp_name']));

			if (validateData($data, $connection)) {
				registerStudent($data, $connection);	
			}
			break;

		case 'add-student':
			require('views/add-student.php');
			break;

		default:
			require('views/home.php');
			break;
	}