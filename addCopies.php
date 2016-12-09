<?php
require_once('connect.php');
$numberCopies = $_POST['numberOfCopies'];
$bookID = $_POST['book'];


for ($i=0; $i < $numberCopies; $i++)
{
	$insertQuery = "INSERT INTO bookCopies(bookID) VALUES($bookID);";
	$mysqli -> query($insertQuery);
}
require_once('updateStock.php');
header("Location: editBook.php?bookID=$bookID");

?> 