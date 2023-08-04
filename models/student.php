<?php
	
	function selectAllStudents($connection){
		$sql = "SELECT * FROM students ORDER BY matric_no";

		$select = mysqli_query($connection, $sql);

		$students = mysqli_fetch_all($select, MYSQLI_ASSOC);

		if (mysqli_num_rows($select)) {
			return $students;
		}else{
			return false;
		}
	}
	
	function registerStudent($data, $connection){
		$sql = "INSERT INTO students(
			matric_no,
			first_name, 
			last_name, 
			gender, 
			phone_number, 
			email, 
			password
		) 
		VALUES(
			'".$data['matric_no']."', 
			'".$data['first_name']."', 
			'".$data['last_name']."', 
			'".$data['gender']."', 
			'".$data['phone']."', 
			'".$data['email']."', 
			'".password_hash($data['password'], PASSWORD_DEFAULT) ."'
		)";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			echo "<script>alert('Registered successful!')</script>";
			echo "<script>window.location='.?action=signin'</script>";
		}
	}

	function loginStudent($data, $connection){
		$sql = "SELECT * FROM students WHERE email = '".$data['email']."'";

		$select = mysqli_query($connection, $sql);

		$user = mysqli_fetch_assoc($select);

		if (password_verify($data['password'], $user['password'])) {
			if (createUserSession($user)) {
				return true;
			}
		}else{
			return false;
		}
	}

	function createUserSession($user){
		session_start();

		session_regenerate_id(true);

		$_SESSION['matric_no'] = $user['matric_no'];
		$_SESSION['user_email'] = $user['email'];

		return true;
	}

	function logout(){
		session_start();

		unset($_SESSION['matric_no']);
		unset($_SESSION['user_email']);

		session_destroy();

		// return true;
		header("Location: .?action=home");
	}

	function validateData($data, $connection){
		foreach ($data as $key => $value) {
			if (empty($value)) {
				echo "<script>alert('".ucfirst($key)." field cannot be empty!')</script>";
				die("<script>window.location='.?action=register'</script>");
			}elseif($key == 'email'){
				$sql = "SELECT * FROM students WHERE email = '$value'";
				$select = mysqli_query($connection, $sql);

				if (mysqli_num_rows($select) > 0) {
					echo "<script>alert('Email already exists!')</script>";
					echo "<script>window.location='.?action=register'</script>";
					exit();
				}
			}elseif ($key == 'password') {
				if (strlen($value) < 6) {
					echo "<script>alert('Password must be atleast 6 characters!')</script>";
					echo "<script>window.location='.?action=register'</script>";
					exit();
				}
			}
		}

		return true;
	}