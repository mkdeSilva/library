<?php
require_once('connect.php');
session_start();
$bookCopyID = $_GET['bookCopyID'];
$studentID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Renting Book</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
	<header><?php require_once('header.php') ?> </header>
	<br><br><br><br><br>
	<br><br>
	<br>

	<?php 
	//get bookcopy row
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

	//set rentdetail to inactive if student has no other books then set students.anyRent =0
	$getRentDetail = "SELECT * FROM rentDetails WHERE bookCopyID = '$bookCopyID';";
	$resultGetRent = $mysqli -> query($getRentDetail);
	$rowResultGetRent = $resultGetRent -> fetch_array();

	$currentDate = date("Y-m-d");
	$returnDate = $rowResultGetRent['dateOfReturn'];

	if ($currentDate > $returnDate){
		$overduePay = $rowResultGetRent['deposit'];
		
		$getStudentRecord = "SELECT * FROM students WHERE studentID = '$studentID';";
		$resultGetStudent = $mysqli -> query($getStudentRecord);
		$studentInfo = $resultGetStudent -> fetch_array();
		$newOverduePay = $overduePay + $studentInfo['overduePay'];
		$updateStudentPay = "UPDATE students SET overduePay = '$newOverduePay' WHERE studentID = '$studentID';";
		$mysqli -> query($updateStudentPay);

	}else{
		$newOverduePay = 0;
	}

	$rentDetailQuery = "UPDATE rentdetails SET active = 0 WHERE bookCopyID = '$bookCopyID';";
	$mysqli -> query($rentDetailQuery);

	$getActiveStudentRentDetails = "SELECT COUNT(*) FROM rentdetails WHERE studentID = '$studentID' AND active = 1;";
	$resultGetStudentRent = $mysqli -> query($getActiveStudentRentDetails);
	$rowGetStudentRent = $resultGetStudentRent -> fetch_array();
	$numOfRows = $rowGetStudentRent[0];
	/*echo $getActiveStudentRentDetails;
	echo $numOfRows;*/


	if ($numOfRows == 0){
		$updateStudentAnyRent = "UPDATE students SET anyRent=0 WHERE studentID = '$studentID';";
		$mysqli -> query($updateStudentAnyRent);
	}

	if ($newOverduePay > 0){
		echo " <center><span style='color:red'>You have returned this book late, you must now pay a total of " . $newOverduePay . "AED.</span></center>";
		?>
		<?php
	}
?>
		<center>
		<h2>Returned Book</h2>
		<h2><span class=flatLink><a href="studentProfile.php">Go Back.</a></span></h2>
		</center>


</body>
</html>