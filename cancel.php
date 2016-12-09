<?php
require_once('connect.php');
session_start();
$rentID = $_GET['rentID'];
$member = $_GET['member'];

$studentID = $_GET['studentID'];

//can get whetehr staff or student then either session or post
	//get bookcopy row
 $getBookCopyIDQuery = "SELECT bookCopyID FROM rentDetails WHERE rentID = '$rentID';";
$getResult = $mysqli -> query($getBookCopyIDQuery);
$getRow = $getResult -> fetch_array();
$bookCopyID = $getRow['bookCopyID'];

	$bookCopyQuery = "SELECT * FROM bookCopies WHERE bookCopyID = '$bookCopyID';";
	$bookCopyResult = $mysqli -> query($bookCopyQuery);
	$infoBookCopy = $bookCopyResult -> fetch_array();

	$actualBookID = $infoBookCopy['bookID'];
	$updateBookCopyAvaiable = "UPDATE bookCopies SET avaiable = 1 WHERE bookCopyID = '$bookCopyID';";
	//result
	$updateAvailableResult = $mysqli -> query($updateBookCopyAvaiable);

	$getBook = "SELECT * FROM book WHERE bookID = '$actualBookID';";
	$getBookResult = $mysqli -> query($getBook);
	$infoBook = $getBookResult -> fetch_array();

	$newStock = $infoBook['stock'] + 1;
	$updateStock = "UPDATE book SET stock = '$newStock' WHERE bookID = '$actualBookID';";
	$mysqli -> query($updateStock);

	$rentDetailQuery = "UPDATE rentdetails SET active = 0 WHERE rentID = '$rentID';";
	$mysqli -> query($rentDetailQuery);

	$getActiveStudentRentDetails = "SELECT COUNT(*) FROM rentdetails WHERE studentID = '$studentID' AND active <> 0;";
	$resultGetStudentRent = $mysqli -> query($getActiveStudentRentDetails);
	$rowGetStudentRent = $resultGetStudentRent -> fetch_array();
	$numOfRows = $rowGetStudentRent[0];
	/*echo $getActiveStudentRentDetails;
	echo $numOfRows;*/


	if ($numOfRows == 0){
		$updateStudentAnyRent = "UPDATE students SET anyRent=0 WHERE studentID = '$studentID';";
		$mysqli -> query($updateStudentAnyRent);
	}

if ($member=='student')
{
header("Location: studentProfile.php");
}else{
	header("Location: studentMenu.php");
}
