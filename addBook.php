<?php
require_once('connect.php');
session_start();
$description = addslashes($_POST['bookDescription']);
$name = addslashes($_POST['bookName']);
$author = addslashes($_POST['bookAuthor']);
$price = $_POST['bookPrice'];
$genre = $_POST['bookGenre'];
$date = $_POST['bookDate'];
$stock = $_POST['bookStock'];
$image = $_POST['bookImage'];

?>
<html>
<title>Adding Book</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
<header> <?php require_once('header.php') ?> </header>


<?php

if ($description == '' || $name == '' || $author == '' || $price == '' || $genre == '' || $date == '' || $stock == '' || $image == ''){
?>
	<br><br><br><hr><br>
	<center>
		<h2>You have left a box empty</h2>
		<h2><span class=flatLink><a href="bookMenu.php">Go Back.</a></span></h2>
	</center>

<?php 
}else{
	$q = "INSERT INTO book(description,bookName,bookAuthor,bookPrice,bookGenre,pubDate,stock,imageLink) VALUES('$description','$name','$author','$price','$genre','$date','$stock','$image');";

	$result = $mysqli -> query($q);

	if($result){
		?>
		<br><br><hr>
		<center>
		<h2>Added book!</h2>
		<h2><span class=flatLink><a href="bookMenu.php">Go Back.</a></span></h2>
		</center>
		<?php
	}else{
		echo "<br><br><br><br><br><center><h2>Adding book wasn't successful<h2><span class='flatLink'><a href=bookMenu.php>Go back</a></span></center>";
	}

	/*
	<center>
		<h2>You have filled in everything. Woah.</h2>
		<h2><span class=flatLink><a href="bookMenu.php">Go Back.</a></span></h2>
	</center>
	*/
}
?>	

</body>
</html>
