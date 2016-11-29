<?php
require_once('connect.php');

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
