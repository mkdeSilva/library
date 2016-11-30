<?php
require_once('connect.php');
$step1 = "RENAME TABLE bookCopies TO bookCopies_work";
$step2 = "CREATE TABLE bookCopies_bak AS SELECT * FROM bookCopies_work WHERE available = 0;";
$step3 = "TRUNCATE bookCopies_work";
$step4 = "LOCK TABLE bookCopies_work WRITE, bookCopies_bak WRITE";
$step5 = "INSERT INTO bookCopies_work SELECT * FROM bookCopies_bak";
$step6 = "UNLOCK TABLES";
$step7 = "RENAME TABLE bookCopies_work TO bookCopies";
$step8 = "DROP TABLE bookCopies_bak";

//Steps 1-8 in one line
$cleanBookCopiesQuery = "RENAME TABLE bookCopies TO bookCopies_work;CREATE TABLE bookCopies_bak AS SELECT * FROM bookCopies_work WHERE available = 0;TRUNCATE bookCopies_work;LOCK TABLE bookCopies_work WRITE, bookCopies_bak WRITE;INSERT INTO bookCopies_work SELECT * FROM bookCopies_bak;UNLOCK TABLES;RENAME TABLE bookCopies_work TO bookCopies;DROP TABLE bookCopies_bak;";

//date checking
$dateOfReturn = date("Y-m-d");
$futureDate = date("2016-12-04");
$pastDate = date("2016-11-25");
echo $dateOfReturn;
echo "<br>";
echo $futureDate;
echo "<br>";
echo $pastDate;
echo "<br>";
if ($dateOfReturn < $futureDate){
	echo "Past due date";
}

?>