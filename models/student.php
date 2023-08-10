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
			dob,
			phone_number, 
			email,
			faculty_id, 
			department_id, 
			option_id, 
			profile_image, 
			password
		) 
		VALUES(
			'".$data['matric_no']."', 
			'".$data['first_name']."', 
			'".$data['last_name']."', 
			'".$data['gender']."', 
			'".$data['dob']."', 
			'".$data['phone']."', 
			'".$data['email']."', 
			'".$data['faculty_id']."', 
			'".$data['department_id']."', 
			'".$data['option_id']."', 
			'".$data['image_name']."', 
			'".password_hash($data['phone'], PASSWORD_DEFAULT) ."'
		)";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			if (move_uploaded_file($data['image_tmp_name'], '/public/asset/img/profile/'.$data['image_name'])) {
				echo "<script>alert('Student added successful!')</script>";
				echo "<script>window.location='.?action=add-student'</script>";
			}		
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