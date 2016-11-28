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
	echo $editID;
	$q = "SELECT * FROM book WHERE bookID = '$editID';";
	$result = $mysqli -> query($q);
	$bookInfo = $result -> fetch_array();
	if ($bookInfo['stock'] > 0){
		//rent the book
		
	} else {
	 echo "<center><h2>Sorry, we do not have any copies of that book in our library right now<br><br><span class='flatLink'><a href='catalog.php'>Go back to catalog</a></span></h2></center";

	}

}else{
 echo "<center><h2>You must be logged in to rent a book<br><br><span class='flatLink'><a href='login.php'>Log In</a></span></h2></center";
}
?>
</body>
</html>