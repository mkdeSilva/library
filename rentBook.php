<?php
require_once('connect.php');
session_start();
$editID = $_POST['bookID'];
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


<?php
if (isset($_SESSION['permission'])){
	//do something
	$q = "SELECT * FROM book WHERE bookID = '$editID';";
	$selectBookResult = $mysqli -> query($q);
	$bookInfo = $selectBookResult -> fetch_array();
	if ($bookInfo['stock'] > 0){
	//rent the book
		//update stock
		$studentID = $_SESSION['id'];
		$newStock = $bookInfo['stock'] - 1; //reduce stock of that book
		$updateBookQuery = "UPDATE book SET stock='$newStock' WHERE bookID = '$editID';";
		$updateStockResult = $mysqli -> query($updateBookQuery);
		//update student
		$updateStudentQuery = "UPDATE students SET anyRent=1 WHERE studentID =" . $_SESSION['id'] . ";"; //replace $_SESSION['id'] with variable declared aboce
		$updateStudentResult = $mysqli -> query($updateStudentQuery);

		//add new entry into rent details
		$currentDate = date("Y-m-d");
	    $d = strtotime("+1 week");
	    $returnDate = date("Y-m-d",$d);
	    $deposit = ($bookInfo['bookPrice']/10);
		$insertRentDetails = "INSERT INTO rentdetails(dateOfIssue,dateOfReturn, deposit,bookID,studentID,active) VALUES('$currentDate','$returnDate','$deposit','$editID','$studentID',1);";
		$insertRentResult = $mysqli -> query($insertRentDetails);
		header("Location: studentProfile.php");


	} else {
	 echo "<center><h2>Sorry, we do not have any copies of that book in our library right now<br><br><span class='flatLink'><a href='catalog.php'>Go back to catalog</a></span></h2></center";

	}

}else{
 echo "<center><h2>You must be logged in to rent a book<br><br><span class='flatLink'><a href='login.php'>Log In</a></span></h2></center";
}
?>
</body>
</html>