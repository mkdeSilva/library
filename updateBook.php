<?php
require_once('connect.php');
session_start();

$id = $_POST['bookID'];
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
<title>Updating Book</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
	<header> <?php require_once('header.php') ?> </header>
	<br>

	<?php
	$q = "UPDATE book SET description = '$description', bookName = '$name', bookAuthor = '$author', bookPrice = '$price', bookGenre = '$genre', pubDate = '$date', stock = '$stock', imageLink = '$image' WHERE bookID= '$id'";

if ($result = $mysqli->query($q)) // Execute update query
{
	//Success
	require_once('updateBookCopies.php');
	?>
	<br><br><hr><br><br>
	<center>
		<h2>Updated Book!</h2>
		<table>
			<?php
			$q="SELECT * FROM book WHERE bookID = '$id';";
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
				<h2><span class=flatLink><a href="bookMenu.php">Go Back.</a></span></h2>
			</center>
			<?php

		}else{
			echo "<br><br><br><br><br><center><h2>Updating book wasn't successful<h2><span class='flatLink'><a href=bookMenu.php>Go back</a></span></center>";
		}

$mysqli->close(); //Close Connection

?>

</body>
</html>