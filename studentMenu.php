<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed

?> 

<!DOCTYPE html>
<html>


<head>
	<title>Student Menu</title>
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
		<center>
			<div class="flatSidebar">
				<ul>
					<li><a href='bookMenu.php'><h2><span>Books</span> | </h2></a></li>
					<li><a href='authorMenu.php'><h2><span>Authors</span> | </h2></a></li>
					<li><a href='studentMenu.php'><h2><span class="active">View Students</span></h2></a></li>
				</ul>
			</div>
		</center><br><br><br><br><br><br><br>

	
			<?php
			$q="SELECT * FROM students;";
			$q = strtolower($q);
			$result=$mysqli->query($q);
			if(!$result){
				echo "Select failed. Error: ".$mysqli->error ;
			}else{
				?>
				<center>
				<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Faculty</th>
					<th>Email</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Any Rent</th>
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
						<a href="editStudent.php?editID=<?=$row['studentID']?>"><img src="pictures/edit.ico" width="24" height="24"></a>
					</td>
					<td align="center" valign="middle">
						<a href='deleteStudent.php?editID=<?=$row['studentID']?>'> <img src="pictures/delete.ico" width="24" height="24"></a></td>
					</tr>                               
					<?php }} ?>
				</table>
				</center>

				<?php 

			}else{
				echo "<br><br><br><br><center><h2>You must login to see the contents of our website: <span class='flatLink'><a href = 'login.php'>Login</a></span></h2></center>";
			}
			?>

		</body>

		</html
