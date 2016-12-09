<?php
require_once('connect.php');

$bookCopyID = $_GET['bookCopyID'];
$bookID=$_GET['bookID'];

if (isset($bookCopyID)) {

	$q="DELETE FROM bookcopies WHERE bookCopyID=$bookCopyID";
	$deleteResult = $mysqli -> query($q);
		require_once("updateStock.php");
		   //redirect
		//echo "Location: editBook.php?bookID=$bookID";
		header("Location: editBook.php?bookID=$bookID");
}
?>
