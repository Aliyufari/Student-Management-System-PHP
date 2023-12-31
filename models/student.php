<?php
	
	function selectAllStudents($connection){
		$sql = "SELECT S.*, F.*, D.*, O.* FROM students S
		 		LEFT JOIN faculties F ON S.faculty_id = F.id
		 		LEFT JOIN departments D ON S.department_id = D.id
		 		LEFT JOIN options O ON S.option_id = O.id
		 		ORDER BY S.matric_no
			";

		$select = mysqli_query($connection, $sql);

		$students = mysqli_fetch_all($select, MYSQLI_ASSOC);

		return $students;
	}

	function findStudentByMatric($matric_no, $connection){
		$sql = "SELECT * FROM students WHERE matric_no = '$matric_no'";

		$select = mysqli_query($connection, $sql);

		$student = mysqli_fetch_assoc($select);

		if ($student) {
			return $student;
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
			$path = dirname(dirname(__FILE__))."/public/images/profiles/students/";

			if (move_uploaded_file($data['image_temp'], $path . $data['image_name'])){
				echo "<script>alert('Student added successful!')</script>";
				echo "<script>window.location='.?action=students'</script>";
			}		
		}
	}

	function updateStudent($data, $connection){
		$sql = "UPDATE students SET
			matric_no = '".$data['matric_no']."',
			first_name = '".$data['first_name']."', 
			last_name = '".$data['last_name']."', 
			gender = '".$data['gender']."', 
			phone_number = '".$data['phone']."', 
			email = '".$data['email']."', 
			profile_image = '".$data['image_name']."', 
			password = '".password_hash($data['phone'], PASSWORD_DEFAULT)."'
			WHERE matric_no = '".$data['matric_no']."'
		";
		// die(var_dump($sql));

		$update = mysqli_query($connection, $sql);

		if ($update) {
			$path = dirname(dirname(__FILE__))."/public/images/profiles/students/";

			if (move_uploaded_file($data['image_temp'], $path . $data['image_name'])){
				echo "<script>alert('Record updated successful!')</script>";
				echo "<script>window.location='.?action=students'</script>";
			}
		}
	}

	function deleteStudent($matric_no, $connection){
		$sql = "DELETE FROM students WHERE matric_no = '$matric_no'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=students'</script>";
		}
	}

	function validateData($data, $connection, $location){
		$errors = [];

		foreach ($data as $key => $value) {
			if (empty($value)) {
				array_push($errors, $key); 
			}elseif($key == 'email'){
				if (count($data) > 2) {

					$sql = "SELECT matric_no FROM students WHERE email = '$value'";
					$select = mysqli_query($connection, $sql);

					if (mysqli_num_rows($select) > 0) {
						$user = mysqli_fetch_assoc($select);
						if ($user['matric_no'] != $data['matric_no']) {
							echo "<script>alert('Email already exists!')</script>";
							echo "<script>window.location='.?action=".$location."'</script>";
						}
					}

					// $sql = "SELECT * FROM students WHERE email = '$value'";
					// $select = mysqli_query($connection, $sql);

					// if (mysqli_num_rows($select) > 0) {

						

						
					// }
				}
			}elseif ($key == 'password') {
				if (strlen($value) < 6) {
					echo "<script>alert('Password must be atleast 6 characters!')</script>";
					echo "<script>window.location='.?action=".$location."'</script>";
				}
			}
		}

		if (count($errors) > 0) {
			echo "<script>alert('".$errors[0]." field cannot be empty!')</script>";
			echo "<script>window.location='.?action=".$location."'</script>";
		}

		return true;
	}