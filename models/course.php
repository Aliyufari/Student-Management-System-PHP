<?php

	function selectAllCourses($connection){
		$sql = "SELECT * FROM courses ORDER BY id";

		$select = mysqli_query($connection, $sql);

		$courses = mysqli_fetch_all($select, MYSQLI_ASSOC);

		return $courses;
	}

	function findCourseById($id, $connection){
		$sql = "SELECT * FROM courses WHERE id = '$id'";

		$select = mysqli_query($connection, $sql);

		$course = mysqli_fetch_assoc($select);

		
		return $course;
	} 
	
	function registerCourse($data, $connection){
		$sql = "INSERT INTO courses(
			code,
			title, 
			unit 
		) 
		VALUES(
			'".$data['code']."',
			'".$data['title']."',
			'".$data['unit']."'    
		)";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			echo "<script>alert('Course added successful!')</script>";
			echo "<script>window.location='.?action=courses'</script>";		
		}
	}

	function updateCourse($data, $connection){
		$sql = "UPDATE courses SET
			code = '".$data['code']."',
			title = '".$data['title']."',
			unit = '".$data['unit']."'
			WHERE id = '".$data['id']."'
		";

		$update = mysqli_query($connection, $sql);

		if ($update) {
			echo "<script>alert('Record updated successful!')</script>";
			echo "<script>window.location='.?action=courses'</script>";
		}
	}

	function deleteCourse($id, $connection){
		$sql = "DELETE FROM courses WHERE id = '$id'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=courses'</script>";
		}
	}