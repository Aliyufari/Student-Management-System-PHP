<?php

	function selectAllTeachers($connection){
		$sql = "SELECT * FROM teachers ORDER BY id";

		$select = mysqli_query($connection, $sql);

		$teachers = mysqli_fetch_all($select, MYSQLI_ASSOC);

		return $teachers;
	}

	function findTeacherById($id, $connection){
		$sql = "SELECT * FROM teachers WHERE id = '$id'";

		$select = mysqli_query($connection, $sql);

		$teacher = mysqli_fetch_assoc($select);

		if ($teacher) {
			return $teacher;
		}else{
			return false;
		}
	} 
	
	function registerTeacher($data, $connection){
		$sql = "INSERT INTO teachers(
			name,
			email, 
			phone, 
			gender, 
			dept_id, 
			image, 
			password
		) 
		VALUES(
			'".$data['name']."',
			'".$data['email']."',
			'".$data['phone']."',    
			'".$data['gender']."',  
			'".$data['dept_id']."',  
			'".$data['image_name']."',  
			'".password_hash($data['phone'], PASSWORD_DEFAULT) ."'
		)";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			$path = dirname(dirname(__FILE__))."/public/images/profiles/teachers/";

			if (move_uploaded_file($data['image_temp'], $path . $data['image_name'])){
				echo "<script>alert('Teacher added successful!')</script>";
				echo "<script>window.location='.?action=teachers'</script>";
			}		
		}
	}

	function updateTeacher($data, $connection){
		$sql = "UPDATE teachers SET
			name = '".$data['name']."',
			email = '".$data['email']."',
			phone = '".$data['phone']."',   
			gender = '".$data['gender']."', 
			dept_id = '".$data['dept_id']."',
			image = '".$data['image_name']."',
			password = '".password_hash($data['phone'], PASSWORD_DEFAULT)."'
			WHERE id = '".$data['id']."'
		";

		$update = mysqli_query($connection, $sql);

		if ($update) {
			$path = dirname(dirname(__FILE__))."/public/images/profiles/teachers/";

			if (move_uploaded_file($data['image_temp'], $path . $data['image_name'])){
				echo "<script>alert('Record updated successful!')</script>";
				echo "<script>window.location='.?action=teachers'</script>";
			}
		}
	}

	function deleteTeacher($id, $connection){
		$sql = "DELETE FROM teachers WHERE id = '$id'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=teachers'</script>";
		}
	}