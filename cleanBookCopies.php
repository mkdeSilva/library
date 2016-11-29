<?php
require_once('connect.php');
$clean = "TRUNCATE TABLE bookCopies";
$mysqli -> query($clean);

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

?>