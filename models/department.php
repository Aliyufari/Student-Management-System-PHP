<?php

	function selectAllDepartments($connection){
		$sql = "SELECT * FROM departments ORDER BY id";

		$select = mysqli_query($connection, $sql);

		$departments = mysqli_fetch_all($select, MYSQLI_ASSOC);

		return $departments;
	}

	function findDepartmentById($id, $connection){
		$sql = "SELECT * FROM departments WHERE id = '$id'";

		$select = mysqli_query($connection, $sql);

		$department = mysqli_fetch_assoc($select);

		
		return $department;
	} 
	
	function registerDepartment($data, $connection){
		$sql = "INSERT INTO departments(name) VALUES('".$data['name']."')";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			echo "<script>alert('Department added successful!')</script>";
			echo "<script>window.location='.?action=departments'</script>";		
		}
	}

	function updateDepartment($data, $connection){
		$sql = "UPDATE departments SET name = '".$data['name']."' WHERE id = '".$data['id']."'";

		$update = mysqli_query($connection, $sql);

		if ($update) {
			echo "<script>alert('Record updated successful!')</script>";
			echo "<script>window.location='.?action=departments'</script>";
		}
	}

	function deleteDepartment($id, $connection){
		$sql = "DELETE FROM departments WHERE id = '$id'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=departments'</script>";
		}
	}