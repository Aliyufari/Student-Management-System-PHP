<?php

	function selectAllOptions($connection){
		$sql = "SELECT * FROM options ORDER BY id";

		$select = mysqli_query($connection, $sql);

		$options = mysqli_fetch_all($select, MYSQLI_ASSOC);

		return $options;
	}

	function findOptionById($id, $connection){
		$sql = "SELECT * FROM options WHERE id = '$id'";

		$select = mysqli_query($connection, $sql);

		$option = mysqli_fetch_assoc($select);

		
		return $option;
	} 
	
	function registerOption($data, $connection){
		$sql = "INSERT INTO options(name) VALUES('".$data['name']."')";

		$insert = mysqli_query($connection, $sql);

		if ($insert) {
			echo "<script>alert('Option added successful!')</script>";
			echo "<script>window.location='.?action=options'</script>";		
		}
	}

	function updateOption($data, $connection){
		$sql = "UPDATE options SET name = '".$data['name']."' WHERE id = '".$data['id']."'";

		$update = mysqli_query($connection, $sql);

		if ($update) {
			echo "<script>alert('Record updated successful!')</script>";
			echo "<script>window.location='.?action=options'</script>";
		}
	}

	function deleteOption($id, $connection){
		$sql = "DELETE FROM options WHERE id = '$id'";

		$delete = mysqli_query($connection, $sql);

		if ($delete) {
			echo "<script>alert('Record deleted successful!')</script>";
			echo "<script>window.location='.?action=options'</script>";
		}
	}