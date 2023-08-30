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
			dob,
			phone,    
			image,   
			password
		) 
		VALUES(
			'".$data['name']."', 
			'".$data['username']."', 
			'".$data['email']."', 
			'".$data['gender']."', 
			'".$data['dob']."', 
			'".$data['phone']."', 
			'".$data['image_name']."', 
			'".password_hash($data['username'], PASSWORD_DEFAULT)."'
		)";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			$path = dirname(dirname(__FILE__))."/public/images/profiles/admins/";

			if (move_uploaded_file($data['image_temp'], $path . $data['image_name'])) {
				echo "<script>alert('Admin created successful!')</script>";
				echo "<script>window.location='.?action=admins'</script>";
			}		
		}
	}


	function updateAdmin($data, $connection){
		$sql = "UPDATE admins SET
			name = '".$data['name']."', 
			username = '".$data['username']."', 
			email = '".$data['email']."', 
			gender = '".$data['gender']."', 
			dob = '".$data['dob']."', 
			phone = '".$data['phone']."', 
			image = '".$data['image_name']."', 
			password = '".password_hash($data['username'], PASSWORD_DEFAULT)."'
			WHERE id = '".$data['id']."'
		";

		$update = mysqli_query($connection, $sql);

		if ($update) {
			$path = dirname(dirname(__FILE__))."/public/images/profiles/admins/";

			if (move_uploaded_file($data['image_temp'], $path . $data['image_name'])){
				echo "<script>alert('Record updated successful!')</script>";
				echo "<script>window.location='.?action=admins'</script>";
			}
		}
	}

	function deleteAdmin($id, $connection){
		$sql = "DELETE FROM admins WHERE id = '$id'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=admins'</script>";
		}
	}

	function login($data, $connection){
		$sql = "SELECT * FROM admins WHERE email = '".$data['email']."'";

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

		$_SESSION['user_id'] = $user['id'];
		$_SESSION['user_name'] = $user['username'];
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