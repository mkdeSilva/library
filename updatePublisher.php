<?php
require_once('connect.php');
session_start();

$editID = $_POST['publisherID'];
$name = addslashes($_POST['publisherName']);
$location = addslashes($_POST['publisherLocation']);
?>
<html>
<title>Updating Publisher</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
	<header> <?php require_once('header.php') ?> </header>
	<br>

	<?php
	$q = "UPDATE publishers SET name = '$name', location = '$location' WHERE pubID = '$editID'";

if ($result = $mysqli->query($q)) // Execute update query
{
	//Success
	?>
	<br><br><hr><br><br>
	<center>
		<h2>Updated Book!</h2>
		<table>
			<?php
			$q="SELECT * FROM publishers WHERE pubID = '$editID';";
			$q = strtolower($q);
			$result=$mysqli->query($q);
			if(!$result){
				echo "Select failed. Error: ".$mysqli->error ;
				break;
			}else{
				?>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php

				while($row=$result->fetch_array()){ ?>
				<tr>
					<td><?=$row['name']?></td> 
					<td><?=$row['location']?></td>
					<td align="center" valign="middle">
						<a href="editBook.php?bookID=<?=$row['bookID']?>"><img src="pictures/edit.ico" width="24" height="24"></a>
					</td>
					<td align="center" valign="middle">
						<a href='deleteBook.php?bookID=<?=$row['bookID']?>'> <img src="pictures/delete.ico" width="24" height="24"></a></td>
					</tr>                               
					<?php }} ?>
				</table>
				<h2><span class=flatLink><a href="publisherMenu.php">Go Back.</a></span></h2>
			</center>
			<?php

		}else{
			echo "<br><br><br><br><br><center><h2>Updating book wasn't successful<h2><span class='flatLink'><a href=publisherMenu.php>Go back</a></span></center>";
		}

$mysqli->close(); //Close Connection

?>

</body>
</html>