<?php
	require_once('connect.php');

	$id = $_GET['bookID'];

	if (isset($id)) {

		$q="DELETE FROM book where bookID=$id";
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: bookMenu.php");
	}
?>
