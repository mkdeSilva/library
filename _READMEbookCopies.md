
#need to track bookCopies in staff menu have an option to see books not in library but with students and it's details
#bookCopies

in regards to book copy
IF AVAILABLE =  1 {
	delete all rows avaiilable = 1
}

ELSEIF AVAILABLE = 0 {
	//do nothing to these rows, make sure they're intact
}

repopulate table with stock (books library has but not books that students have)

*/

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

