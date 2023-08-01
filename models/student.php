<?php 
	
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
			echo "<script>window.location='.?action=login'</script>";
		}
	}

	function loginStudent(){
		
	}

	function validateData($data, $connection){
		foreach ($data as $key => $value) {
			if (empty($value)) {
				echo "<script>alert('".ucfirst($key)." field cannot be empty!')</script>";
				echo "<script>window.location='.?action=register'</script>";
				exit();
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