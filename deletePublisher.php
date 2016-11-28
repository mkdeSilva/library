<?php
	require_once('connect.php');

	$id = $_GET['pubID'];

	if (isset($id)) {

		$q="DELETE FROM publishers WHERE pubID=$id";
		echo $q;
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: publisherMenu.php");
	}
?>
