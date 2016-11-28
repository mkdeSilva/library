<?php 
require_once('connect.php');
session_start();
$editID = $_GET['bookID'];
$q = "SELECT * FROM book WHERE bookID = '$editID'";
$result = $mysqli->query($q);// Exec select query
$bookInfo = $result -> fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
	<header> <?php require_once('header.php') ?> </header>
	<br><br><br><br><br>
<div style="width: 100%;">
	<div style="float:left; width: 50%">
	<center>
		<div>
			<img height=400px src="<?php echo $bookInfo['imageLink'] ?>">
		</div>
	</div>

	<div style="float:right; width: 50%">
			<strong>Name:</strong><br>
			<?php echo $bookInfo['bookName'] ?>
			<br><br>
			<strong>Author:</strong><br>
			<?php echo $bookInfo['bookAuthor'] ?>
			<br><br>
			<strong>Description: </strong><br>
			<?php echo $bookInfo['description'] ?>
			<br><br>

			<strong>Genre:  </strong><br>
			<?php echo $bookInfo['bookGenre'] ?>
			<br><br>
			<strong>Date: </strong><br>
			<?php echo $bookInfo['pubDate'] ?>
			<br> <br>
			<strong>Stock:  </strong><br>
			<?php echo $bookInfo['stock'] ?>
			<br><br>

			<form action="rentBook.php" method="POST">
			<input type="hidden" name="bookID" value="<?php echo $editID ?>">
			<input type="submit" class="flatButton" value="Rent">
			</form>
	</div>
	
</div>
	</center>

</body>
</html>