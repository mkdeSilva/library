<?php
	require_once('connect.php');

	$id = $_GET['editID'];

	if (isset($id)) {

		$q="DELETE FROM students where studentID=$id";
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: studentMenu.php");
	}
?>
