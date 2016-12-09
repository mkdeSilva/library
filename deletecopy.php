<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed
$id=$_GET['bookID'];
?> 

<html>


<head>
	<title>Delete Copy</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
	<header>
		<?php require_once('header.php'); ?>
	</header>

	<br><br><br>

	<?php 
	if (isset($_SESSION['permission'])){
		?>
		<br><br><br><br><br><br><br>

	
			<?php
			$q="SELECT bookCopyID,book.bookID,bookName,available FROM bookcopies,book WHERE bookcopies.bookID=book.bookID and book.bookID='$id'";
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
					}else{
						?>
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
							<td><?=$row['bookCopyID']?></td> 
							<td><?=$row['bookID']?></td>
							<td><?=$row['bookName']?></td>
							<td><?=$row['available']?></td>
							<td align="center" valign="middle">
								<a href='deleteBookcopy.php?bookCopyID=<?=$row['bookCopyID']?>?bookID=<?=$id?>'> <img src="pictures/delete.ico" width="24" height="24"></a></td>
							</tr>                               
							<?php }} ?>
							</table>
							<?php } ?>
			

		</body>

		</html>
