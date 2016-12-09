<?php
require_once('connect.php');
session_start();

$editID = $_GET['pubID'];
$q = "SELECT * FROM authors WHERE authorID = '$editID'";
$result = $mysqli->query($q);// Exec select query
$editBook = $result -> fetch_array();

?>
<html>
<title>Edit Publisher</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
<header> <?php require_once('header.php') ?> </header>
	<br><br>

			<center>
				<div class="flatSidebar">
					<ul>
						<li><a href='bookMenu.php'><h2><span >Books</span> | </h2></a></li>
						<li><a href='authorMenu.php'><h2><span class="active">Authors</span> | </h2></a></li>
						<li><a href='studentMenu.php'><h2><span>Students</span></h2></a></li>
					</ul>
				</div>
			</center><br><br><br><br>

			<center>
				<div style="color: white;padding: 30px;">
					<h2><span id="addBooksButton" class="flatChoiceActive"><a>Edit Author</a></span></h2>
					<hr>
				</div>
			</center>

			<form id="updatePublisherForm" action="updateAuthor.php" method="POST">
					<!-- ADD BOOK FORM -->
<!-- ADD BOOK FORM -->
					<center>
						<div>
							<label>name</label><br>
							<input type="text" name="authorName" class="flatInput" value="<?=$editBook['authorName']?>">
							<br><br>
							<label>website</label><br>
							<input type="text" name="authorWebsite" class="flatInput" value="<?=$editBook['website']?>">
							<br><br>
							<input type="hidden" name="authorID" value ="<?= $editID ?> ">
							<input type="submit" value="Update Author" style="width:100px;" class="flatButton">	
						</div>
					</center>
				</div>
				</div>

</form>
<?php

?>	

</body>
</html>
