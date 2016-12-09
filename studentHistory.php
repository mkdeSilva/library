<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed

?> 

<!DOCTYPE html>	
<html>


<head>
	<title>Student History</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
	<header>
		<?php require_once('header.php'); ?>
	</header>

	<br>

	<?php 
	if (isset($_SESSION['permission'])){
		$studentID = $_SESSION['id'];
		$q = "SELECT * FROM students WHERE studentID = '$studentID'";
		$result = $mysqli->query($q);// Exec select query
		$studentInfo = $result -> fetch_array();

		?>
		<center>
			<div class="flatSidebar">
				<ul>
					<li><a href="catalog.php"><h2> Welcome <?php echo $_SESSION['fName'];?> | </h2></a></li>
					<li><a href='studentProfile.php'><h2><span> Profile </span> | </h2></a></li>
					<li><a href='studentHistory.php'><h2><span class="active"> History </span> </h2></a></li>
				</ul>
			</div>
		</center><br><br><br><br><br><br>

		<?php
		$checkStudentBooksQuery = "SELECT * FROM bookCopies INNER JOIN rentDetails ON bookCopies.bookCopyID = rentDetails.bookCopyID INNER JOIN book ON book.bookID = bookCopies.bookID WHERE studentID = '$studentID' AND active=0;";
			//echo $checkStudentBooksQuery;
		$resultRent = $mysqli -> query($checkStudentBooksQuery);
		?>
	</center>
</div>
<br>
<div>
	<center>
		<table>
			<tr>

				<th>Name</th>
				<th>Author</th>
				<th>Issue Date</th>
				<th>Return Date</th>
				<th>Deposit</th>
				<th>Image</th>
			</tr>

			<?php 
			if ($resultRent){
			while($row=$resultRent->fetch_array()) 
				{ ?>
			<tr>
				<td><?=$row['bookName']?></td> 
				<td><?=$row['bookAuthor']?></td>
				<td><?=$row['dateOfIssue']?></td>
				<td><?=$row['dateOfReturn']?></td>
				<td><?=$row['deposit']?></td>
				<td><img height=100px src="<?=$row['imageLink']?>"></td>
			</tr> 
<?php			                              
		}
		?>
	</table>
</center>
</div>
<?php
}else{
	echo "<br><br><br><br><center><h2>You haven't rented any books</h2></center>";
}

}else{
	echo "<br><br><br><br><center><h2>You must login to see the contents of our website: <span class='flatLink'><a href = 'login.php'>Login</a></span></h2></center>";
}
?>
</body>

</html>