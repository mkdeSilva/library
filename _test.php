<?php
require_once('connect.php');

/*
$count = "SELECT COUNT(*) FROM bookCopies";

$result = $mysqli -> query($count);

echo "$count";

*/

/*

$numInsertRows;

$queryGetRows = "SELECT * FROM BOOK;";
$resultGetRows = $mysqli -> query($queryGetRows);

while($row = $resultGetRows -> fetch_assoc()){
	$bookID = $row['bookID'];
	//for loop
	$noOfTimes = $row['stock'];
	for($i=0;$i<$noOfTimes;$i++){
		$insertBookCopyQuery = "INSERT INTO bookCopies(bookID) VALUES('$bookID');";
		$insertResult = $mysqli -> query($insertBookCopyQuery);
	}
}


//Update bookCopies
*/

$deleteQuery = "DELETE FROM bookCopies WHERE available=1;";
$deleteResult = $mysqli -> query($deleteQuery);


$queryGetRows = "SELECT * FROM BOOK;";
$resultGetRows = $mysqli -> query($queryGetRows);

while($row = $resultGetRows -> fetch_assoc()){
	$bookID = $row['bookID'];
	//for loop
	$noOfBooks = $row['stock'];
	for($i=0;$i<$noOfBooks;$i++){
		$rePopulateQuery = "INSERT INTO bookCopies(bookID) VALUES('$bookID');";
		$rePopulateResult = $mysqli -> query($rePopulateQuery);
	}
}

?>
