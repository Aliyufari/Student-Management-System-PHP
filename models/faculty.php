<?php

	function selectAllFaculties($connection){
		$sql = "SELECT * FROM faculties ORDER BY id";

		$select = mysqli_query($connection, $sql);

		$faculties = mysqli_fetch_all($select, MYSQLI_ASSOC);

		return $faculties;
	}

	function findFacultyById($id, $connection){
		$sql = "SELECT * FROM faculties WHERE id = '$id'";

		$select = mysqli_query($connection, $sql);

		$faculty = mysqli_fetch_assoc($select);

		
		return $faculty;
	} 
	
	function registerFaculty($data, $connection){
		$sql = "INSERT INTO faculties(name) VALUES('".$data['name']."')";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			echo "<script>alert('Faculty added successful!')</script>";
			echo "<script>window.location='.?action=faculties'</script>";		
		}
	}

	function updateFaculty($data, $connection){
		$sql = "UPDATE faculties SET name = '".$data['name']."' WHERE id = '".$data['id']."'";

		$update = mysqli_query($connection, $sql);

		if ($update) {
			echo "<script>alert('Record updated successful!')</script>";
			echo "<script>window.location='.?action=faculties'</script>";
		}
	}

	function deleteFaculty($id, $connection){
		$sql = "DELETE FROM faculties WHERE id = '$id'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=faculties'</script>";
		}
	}