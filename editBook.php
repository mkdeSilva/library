<?php
require_once('connect.php');
session_start();

$editID = $_GET['bookID'];
$q = "SELECT * FROM book WHERE bookID = '$editID'";
$result = $mysqli->query($q);// Exec select query
$editBook = $result -> fetch_array();

?>
<html>
<title>Edit Book</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
<header> <?php require_once('header.php') ?> </header>
	<br><br>

			<center>
				<div class="flatSidebar">
					<ul>
						<li><a href='bookMenu.php'><h2><span class="active">Books</span> | </h2></a></li>
						<li><a href='authorMenu.php'><h2><span>Authors</span> | </h2></a></li>
						<li><a href='studentMenu.php'><h2><span>View Students</span></h2></a></li>
					</ul>
				</div>
			</center><br><br><br><br>

			<center>
				<div style="color: white;padding: 30px;">
					<h2><span id="addBooksButton" class="flatChoiceActive"><a>Edit Book</a></span></h2>
					<hr>
				</div>
			</center>

			<form id="updateBookForm" action="updateBook.php" method="POST">
					<!-- ADD BOOK FORM -->

					<div style="float:left">
						<label>name</label><br>
						<input type="text" name="bookName" class="flatInput" value="<?=$editBook['bookName']?>">
						<br><br>
						<label>author</label><br>
						<input type="text" name="bookAuthor" class="flatInput" value="<?=$editBook['bookAuthor']?>">
						<br><br>
						<label>description</label><br>
						<textarea name="bookDescription" class="flatLargeInput"><?=$editBook['description']?></textarea>
						<br><br>
						<label>image</label><br>
						<input type="text" name="bookImage" class="flatInput"  value="<?=$editBook['imageLink']?>">
						<br><br>
						<!--
							<label>Upload an Image</label><br>
							<input type="file" name ="file" id=fileUpload">
						-->
					</div>
					<div style="float:right">
						<label>price</label><br>
						<input type="text" name="bookPrice" class="flatInput" value="<?=$editBook['bookPrice']?>">
						<br><br>
						<label>genre</label><br>
						<input type="text" name="bookGenre" class="flatInput" value="<?=$editBook['bookGenre']?>">
						<br><br>
						<label>publication date</label><br>
						<input type="date" name="bookDate" class="flatInput" value="<?=$editBook['pubDate']?>"> <!-- ------- -->
						<br><br>
						<label>stock</label><br>
						<input type="text" name="bookStock" class="flatInput" value="<?=$editBook['stock']?>">
						<br><br>
						<br>
						<input type="hidden" name="bookID" value ="<?= $editID ?> ">
						<input type="submit" style="width:100px" value="Update Book" class="flatButton">	
					</div>
				</div>

</form>
<?php

?>	

</body>
</html>
