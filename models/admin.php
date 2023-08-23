<?php
	
	function selectAllAdmins($connection){
		$sql = "SELECT * FROM admins ORDER BY id";

		$select = mysqli_query($connection, $sql);

		$admins = mysqli_fetch_all($select, MYSQLI_ASSOC);

		return $admins;
	}

	function findAdminById($id, $connection){
		$sql = "SELECT * FROM admins WHERE id = '$id'";

		$select = mysqli_query($connection, $sql);

		$admin = mysqli_fetch_assoc($select);

		return $admin;
	} 
	
	function createAdmin($data, $connection){
		$sql = "INSERT INTO admins(
			name,
			username,
			email,
			gender,
			phone,    
			image,   
			password
		) 
		VALUES(
			'".$data['name']."', 
			'".$data['username']."', 
			'".$data['email']."', 
			'".$data['gender']."', 
			'".$data['phone']."', 
			'".$data['image']."', 
			'".password_hash($data['username'], PASSWORD_DEFAULT)."'
		)";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			if (move_uploaded_file($data['image_tmp_name'], 'public/asset/img/profile/'. $data['image_name'])) {
				echo "<script>alert('Admin created successful!')</script>";
				echo "<script>window.location='.?action=create-admin'</script>";
			}		
		}
	}


	function updateAdmin($data, $connection){
		$sql = "UPDATE admins SET
			name = '".$data['name']."', 
			username = '".$data['username']."', 
			email = '".$data['email']."', 
			gender = '".$data['gender']."', 
			phone = '".$data['phone']."', 
			image = '".$data['image']."', 
			password = '".password_hash($data['username'], PASSWORD_DEFAULT)."'
			WHERE id = '".$data['id']."'
		";

		$update = mysqli_query($connection, $sql);

		if ($update) {
			echo "<script>alert('Record updated successful!')</script>";
			echo "<script>window.location='.?action=admins'</script>";
		}
	}

	function deleteAdmin($matric_no, $connection){
		$sql = "DELETE FROM admins WHERE matric_no = '$matric_no'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=students'</script>";
		}
	}

	function login($data, $connection){
		$sql = "SELECT * FROM admins WHERE email = '".$data['email']."'";

		$select = mysqli_query($connection, $sql);

		$user = mysqli_fetch_assoc($select);

		die(var_dump(password_verify($data['password'], $user['password'])));

		if (password_verify($data['password'], $user['password'])) {
			if (createUserSession($user)) {
				die(var_dump('OK'));
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

		unset($_SESSION['username']);
		unset($_SESSION['user_email']);

		session_destroy();

		header("Location: .?action=home");
	}