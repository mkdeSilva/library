<?php
require_once('connect.php');
session_start();

$id = $_POST['studentID'];
$fName = addslashes($_POST['fName']);
$lName = addslashes($_POST['lName']);
$faculty = addslashes($_POST['faculty']);
$email = $_POST['email'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$rent = $_POST['rent'];
$overdue = $_POST['overdue'];


?>
<html>
<title>Updating Student</title>s
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
	<header> <?php require_once('header.php') ?> </header>
	<br>

	<?php
	$q = "UPDATE students SET fName = '$fName', lName = '$lName', faculty = '$faculty', email = '$email', username = '$username', gender = '$gender', age = '$age', anyRent = '$rent', overduePay = '$overdue' WHERE studentID= '$id'";

if ($result = $mysqli->query($q)) // Execute update query
{
	//Success
	?>
	<br><br><hr><br><br>
	<center>
		<h2>Updated Student!</h2>
		<table>
			<?php
			$q="SELECT * FROM students WHERE studentID = '$id';";
			$q = strtolower($q);
			$result=$mysqli->query($q);
			if(!$result){
				echo "Select failed. Error: ".$mysqli->error ;
				break;
			}else{
				?>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Faculty</th>
					<th>Email</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Rent</th>
					<th>Overdue Pay</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php

				while($row=$result->fetch_array()){ ?>
				<tr>
					<td><?=$row['fName']?></td> 
					<td><?=$row['lName']?></td>
					<td><?=$row['faculty']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['username']?></td>
					<td><?=$row['gender']?></td>
					<td><?=$row['age']?></td>
					<td><?=$row['anyRent']?></td>
					<td><?=$row['overduePay']?></td>
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