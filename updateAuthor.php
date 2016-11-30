<?php
require_once('connect.php');
session_start();

$editID = $_POST['authorID'];
$name = addslashes($_POST['authorName']);
$website = addslashes($_POST['authorWebsite']);
?>
<html>
<title>Updating Author</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
	<header> <?php require_once('header.php') ?> </header>
	<br>

	<?php
	$q = "UPDATE authors SET authorName = '$name', website = '$website' WHERE authorID = '$editID'";
	

if ($result = $mysqli->query($q)) // Execute update query
{
	//Success
	?>
	<br><br><hr><br><br>
	<center>
		<h2>Updated Author!</h2>
		<table>
			<?php
			$q="SELECT * FROM authors WHERE authorID = '$editID';";
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
					<td><?=$row['authorName']?></td> 
					<td><?=$row['website']?></td>
					<td align="center" valign="middle">
						<a href="editAuthor.php?pubID=<?=$row['authorID']?>"><img src="pictures/edit.ico" width="24" height="24"></a>
					</td>
					<td align="center" valign="middle">
						<a href='editAuthor.php?pubID=<?=$row['authorID']?>'> <img src="pictures/delete.ico" width="24" height="24"></a></td>
					</tr>                               
					<?php }} ?>
				</table>
				<h2><span class=flatLink><a href="authorMenu.php">Go Back.</a></span></h2>
			</center>
			<?php

		}else{
			echo "<br><br><br><br><br><center><h2>Updating author wasn't successful<h2><span class='flatLink'><a href=authorMenu.php>Go back</a></span></center>";
		}

$mysqli->close(); //Close Connection

?>

</body>
</html>