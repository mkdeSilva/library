<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed

?> 

<!DOCTYPE html>
<html>


<head>
	<title>Book Menu</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
	<header>
		<?php require_once('header.php'); ?>
	</header>

	<br><br>

	<?php 
	if (isset($_SESSION['permission'])){
		if ($_SESSION['permission'] == 'admin'){ 
			?>
			<center>
				<div class="flatSidebar">
					<ul>
						<li><a href='bookMenu.php'><h2><span class="active">Books</span> | </h2></a></li>
						<li><a href='publisherMenu.php'><h2><span>Publishers</span> | </h2></a></li>
						<li><a href='studentMenu.php'><h2><span>View Students</span> | </h2></a></li>
					</ul>
				</div>
			</center><br><br><br>

				<center>
					<div style="color: white;padding: 30px;">
						<h2><span id="addBooksButton" class="flatChoiceActive"><a>Add a book</a></span>|<span id="viewBooksButton" class="flatChoiceInactive"><a>View Books</a></span></h2>
					</div>
				</center>

				<form id="addBookForm" action="addBook.php" method="POST">
					<div id="allInputs">

						<!-- ADD BOOK FORM -->

						<div style="float:left">
							<label>name</label><br>
							<input type="text" name="bookName" class="flatInput">
							<br><br>
							<label>author</label><br>
							<input type="text" name="bookAuthor" class="flatInput">
							<br><br>
							<label>description</label><br>
							<textarea name="bookDescription" class="flatLargeInput"></textarea>
							<br><br>
							<label>image</label><br>
							<input type="text" name="bookImage" class="flatInput" placeholder="insert link to image">
							<br><br>
						</div>
						<div style="float:right">
							<label>price</label><br>
							<input type="text" name="bookPrice" class="flatInput">
							<br><br>
							<label>genre</label><br>
							<input type="text" name="bookGenre" class="flatInput">
							<br><br>
							<label>publication date (yyyy/mm/dd)</label><br>
							<input type="date" name="bookDate" class="flatInput" placeholder="1999-12-01"> <!-- ------- -->
							<br><br>
							<label>stock</label><br>
							<input type="text" name="bookStock" class="flatInput">
							<br><br>
							<br>
							<input type="submit" value="Add Book" class="flatButton">	
						</div>
					</div>
				</form>

				<!-- VIEW BOOKS-->

				<div style="display:none" id="viewBookForm">

					<table>
						<?php
						$q="SELECT * FROM book;";
						$q = strtolower($q);
						$result=$mysqli->query($q);
						if(!$result){
							echo "Select failed. Error: ".$mysqli->error ;
							break;
						}else{
							?>
							<tr>
								<th>Name</th>
								<th>Author</th>
								<th>Description</th>
								<th>Price</th>
								<th>Genre</th>
								<th>Publication Date</th>
								<th>Stock</th>
								<th>Image Link</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php

							while($row=$result->fetch_array()){ ?>
							<tr>
								<td><?=$row['bookName']?></td> 
								<td><?=$row['bookAuthor']?></td>
								<td><?=$row['description']?></td>
								<td><?=$row['bookPrice']?></td>
								<td><?=$row['bookGenre']?></td>
								<td><?=$row['pubDate']?></td>
								<td><?=$row['stock']?></td>
								<td> <img height=100px src="<?=$row['imageLink']?>"></td>
								<td align="center" valign="middle">
									<a href="editBook.php?bookID=<?=$row['bookID']?>"><img src="pictures/edit.ico" width="24" height="24"></a>
								</td>
								<td align="center" valign="middle">
									<a href='deleteBook.php?bookID=<?=$row['bookID']?>'> <img src="pictures/delete.ico" width="24" height="24"></a></td>
								</tr>                               
								<?php }} ?>
							</table>

						</div>


						<?php 
					}else if($_SESSION['permission'] == 'student'){
						echo "<br><br><br><br><center><h2>You are a student, go here: <span class='flatLink'><a href='studentHome.php'>Student Home</a></span></h2></center>";
					}
				}else{
					echo "<br><br><br><br><center><h2>You must login to see the contents of our website: <span class='flatLink'><a href = 'login.php'>Login</a></span></h2></center>";
				}
				?>


				<script src='jQuery.js'></script>
				<script>
					$(function(){
						$("#addBooksButton").click(function(){
							$("#viewBookForm").hide();
							$("#addBookForm").show();
							$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
							$("#viewBooksButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
						});
					});

					$(function(){
						$("#viewBooksButton").click(function(){
							$("#addBookForm").hide();
							$("#viewBookForm").show();
							$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
							$("#addBooksButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
						});
					});
				</script>

			</body>

			</html
