<?php
require_once('connect.php');
session_start();

require_once('updateStock.php');
$editID = $_GET['bookID'];
$q = "SELECT * FROM book WHERE bookID = '$editID'";
$result = $mysqli->query($q);// Exec select query
$editBook = $result -> fetch_array();
if (isset($_POST['submit'])) {
	$stock=$_POST['bookStock'];
	if ($stock>$editBook['stock']) {
		$differenceStock = $stock - $editBook['stock'];
		for ($i=0; $i < $differenceStock; $i++) { 
			$qq="INSERT INTO bookCopies(bookID) VALUES('$editID');";
			$resultt=$mysqli -> query($qq);
		}
	}elseif ($stock<$editBook['stock']) {
		header("Location: deletecopy.php?bookID=$editID");
	}
	$editBook['stock']=$stock;
}

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
				<li><a href='studentMenu.php'><h2><span>Students</span></h2></a></li>
			</ul>
		</div>
	</center><br><br><br><br>

	<center>
		<div style="color: white;padding: 30px;">
			<h2><span id="updateBookButton" class="flatChoiceActive"><a>Edit Book</a></span>|<span id="viewBookCopiesButton" class="flatChoiceInactive"><a>View Book Copies</a></span></h2>
			<hr>
		</div>
	</center>


	<!--action="updateBook.php"-->
	<form id="updateBookForm"  action = "updateBook.php" method="POST">
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
						
						<br><br>
						<input type="hidden" name="bookID" value ="<?= $editID ?> ">
						<input type="submit" name="submit" style="width:100px" value="Update Book" class="flatButton">	
					</div>
				</div>

			</form>
			

			<form id = "addCopiesBox" action="addCopies.php" method="POST" style="display:none">
				<center>
					<label>Add Copies: </label>
					<input type="text" name = "numberOfCopies" class="smallFlatInput">
					<input type="hidden" name="book" value ="<?= $editID ?> ">
					<br><br>
					<input type="submit" value = "Add" class="flatButton">
				</center>
			</form>

			<form id="viewCopiesForm" style = "display:none">
				<?php

				$q="SELECT bookCopyID,book.bookID,bookName,available FROM bookcopies,book WHERE bookcopies.bookID=book.bookID AND book.bookID=$editID";
				$result=$mysqli->query($q);

				
				if(!$result){
					echo "Select failed. Error: ".$mysqli->error ;
				}else{

					
					

					?> 
					<center>
						<br><br>

						<table>
							<tr>
								<th>bookCopyID</th>
								<th>bookID</th>
								<th>Book Name</th>
								<th>Available</th>
								<th>Delete</th>
							</tr>
							<?php

							while($row=$result->fetch_array()){ ?>
							<tr>
								<?php
								$bookCopyID = $row['bookCopyID'];
								?>
								<td><?=$row['bookCopyID']?></td> 
								<td><?=$row['bookID']?></td>
								<td><?=$row['bookName']?></td>
								<td><?=$row['available']?></td>
								<td align="center" valign="middle">
									<?php
									echo "<a href='deleteBookcopy.php?bookCopyID=$bookCopyID&bookID=$editID'><img src='pictures/delete.ico' width='24' height='24'></a>";
									?>

								</td>
							</tr>                               
							<?php }} ?>
						</table>
					</center>
				</form>


				<script src='jQuery.js'></script>
				<script>
					$(function(){
						$("#updateBookButton").click(function(){
							$("#viewCopiesForm").hide();
							$("#updateBookForm").show();
							$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
							$("#updateBookButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
							$("#addCopiesBox").hide();
						});
					});

					$(function(){
						$("#viewBookCopiesButton").click(function(){
							$("#updateBookForm").hide();
							$("#viewCopiesForm").show();
							$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
							$("#updateBookButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
							$("#addCopiesBox").show();
						});
					});
				</script>


			</body>
			</html>
