<?php
require_once('connect.php');

//Clearing the tables except for bookCopies that are with students
$clean = "RENAME TABLE bookCopies TO bookCopies_work;CREATE TABLE bookCopies_bak AS SELECT * FROM bookCopies_work WHERE available = 0;TRUNCATE bookCopies_work;LOCK TABLE bookCopies_work WRITE, bookCopies_bak WRITE;INSERT INTO bookCopies_work SELECT * FROM bookCopies_bak;UNLOCK TABLES;RENAME TABLE bookCopies_work TO bookCopies;DROP TABLE bookCopies_bak;";
$mysqli -> query($clean);

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