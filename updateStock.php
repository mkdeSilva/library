<?php
require_once('connect.php');

$q="SELECT * FROM book;";
$result=$mysqli->query($q);

while($row=$result->fetch_array())
{
	$thisBookID = $row['bookID'];
	$getStockQuery = "SELECT COUNT(*) AS amount FROM bookCopies WHERE bookID = $thisBookID AND available=1";
	$getStockResult = $mysqli -> query($getStockQuery);
	$stockRow = $getStockResult -> fetch_array();
	$stockAmount = $stockRow['amount'];

	$updateQuery = "UPDATE book SET stock = $stockAmount WHERE bookID = $thisBookID;";

	$mysqli -> query($updateQuery);
}

?>