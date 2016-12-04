<?php
	require_once('connect.php');

	$id = $_GET['bookID'];

	if (isset($id)) {

		$q="INSERT INTO bookCopies(bookID) VALUES('$id')";
			if(!$mysqli->query($q)){
				echo "INSERT failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: editBook.php?bookID=<?=$id?");
	}
?>
