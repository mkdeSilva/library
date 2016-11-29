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
	//do something
	if ($_SESSION['permission'] == 'student'){
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

				//reserve bookCopy entry for student to have
				$reserve = "SELECT * FROM bookCopies WHERE available = 1 AND bookID = '$editID' ORDER BY bookCopyID LIMIT 1;";
				$reserveResult = $mysqli -> query($reserve);
				$rowBookCopy = $reserveResult -> fetch_assoc();
				$bookCopyID = $rowBookCopy['bookCopyID'];

				//update bookCopy row
				$updateBookCopyQuery = "UPDATE bookCopies SET available = 0 WHERE bookCopyID = '$bookCopyID';";
				$updateBookCopyResult = $mysqli -> query($updateBookCopyQuery);

				//add new entry into rent details
				$currentDate = date("Y-m-d");
				$d = strtotime("+1 week");
				$returnDate = date("Y-m-d",$d);
				$deposit = ($bookInfo['bookPrice']/10);

			   	//INSERT into bookCopy
			   	//$addNewCopyQuery = "INSERT INTO bookCopies(bookID) VALUES('$editID');";
				$insertRentDetails = "INSERT INTO rentdetails(dateOfIssue,dateOfReturn, deposit,bookCopyID,studentID,active) VALUES('$currentDate','$returnDate','$deposit','$bookCopyID','$studentID',1);";
				$insertRentResult = $mysqli -> query($insertRentDetails);
				require_once('updateBookCopies.php');
				//echo $insertRentDetails;
				header("Location: studentProfile.php");

			} else {
				echo "<center><h2>Sorry, we do not have any copies of that book in our library right now<br><br><span class='flatLink'><a href='catalog.php'>Go back to catalog</a></span></h2></center";

			}

	}elseif ($_SESSION['permission'] == 'admin'){
		echo "<center><h2>Sorry, you must be a student to rent a book<br><br><span class='flatLink'><a href='catalog.php'>Go back to catalog</a></span></h2></center";


}else{
	echo "<center><h2>You must be logged in to rent a book<br><br><span class='flatLink'><a href='login.php'>Log In</a></span></h2></center";
}
?>
</body>
</html>