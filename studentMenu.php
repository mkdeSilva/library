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
					<li><a href='studentMenu.php'><h2><span class="active">Students</span></h2></a></li>
				</ul>
			</div>
		</center><br><br><br>

		<center>
			<div style="color: white;padding: 30px;">
				<h2><span id="viewApprovalButton" class="flatChoiceActive"><a>Approve Rent</a></span>|<span id="viewStudentsButton" class="flatChoiceInactive"><a>View Students</a></span></h2>
			</div>
		</center>

		<?php
		$q="SELECT * FROM students;";
		$q = strtolower($q);
		$result=$mysqli->query($q);
		if(!$result){
			echo "Select failed. Error: ".$mysqli->error ;
		}else{
			?>
			<form id = "studentForm" style = "display:none">
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
				</form>

				
				<?php
				$pendingQuery = "SELECT * FROM bookCopies INNER JOIN rentDetails ON bookCopies.bookCopyID = rentDetails.bookCopyID INNER JOIN book ON book.bookID = bookCopies.bookID WHERE active=-1;";
				$pendingResult=$mysqli->query($pendingQuery);
				if(!$pendingResult){
					echo "Select failed. Error: ".$mysqli->error ;
					
				}else{
					$numberOfRows = $pendingResult -> num_rows;
					if ($numberOfRows > 0){
					?>
					<form id = "approvalForm">
						<center>
							<table>
								<tr>
									<th>Book Copy ID</th>
									<th>Book Name</th>
									<th>Author</th>
									<th>Image Link</th>
									<th>Student Name</th>
									<th>Email</th>
									<th>Overdue Pay</th>
									<th>Deposit</th>
									<th>Approve</th>
									<th>Cancel</th>
								</tr>
								<?php

								while($pendingRow=$pendingResult->fetch_array())
								{
									$studentID = $pendingRow['studentID'];
									$getStudentQuery = "SELECT * FROM students WHERE studentID = '$studentID';";
									$getStudentResult = $mysqli -> query($getStudentQuery);
									$studentRow = $getStudentResult -> fetch_array();
								?>

									<tr>
							<td><?=$pendingRow['bookCopyID']?></td> 
							<td><?=$pendingRow['bookName']?></td> 
							<td><?=$pendingRow['bookAuthor']?></td> 
							<td><img height=100px src ="<?=$pendingRow['imageLink']?>"></td> 
							<td><?=$studentRow['fName']?> <?=$studentRow['lName']?></td> 
							<td><?=$studentRow['email']?></td> 
							<td><?=$studentRow['overduePay']?></td> 
							<td><?=$pendingRow['deposit']?></td> 
								<td><span class="flatLink"><a href="approve.php?rentID=<?=$pendingRow['rentID']?>">Approve</a></span></td>
								<td><span class="flatLink"><a href="cancel.php?rentID=<?=$pendingRow['rentID']?>&member=staff&studentID=<?=$studentID?>">Cancel</a></span></td>

									</tr>  
								<?php
								}
								}else{
							echo "<center><h2>There are no rent details to approve</h2></center>";
 
						}}
								?>
									</table>
								</center>
							</form>

							<?php 
						

						}else{
							echo "<br><br><br><br><center><h2>You must login to see the contents of our website: <span class='flatLink'><a href = 'login.php'>Login</a></span></h2></center>";
						}
						?>


						<script src = 'jQuery.js'></script>
						<script>
							$(function(){
								$("#viewStudentsButton").click(function(){
									$("#approvalForm").hide();
									$("#studentForm").show();
									$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
									$("#viewApprovalButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
								});
							});

							$(function(){
								$("#viewApprovalButton").click(function(){
									$("#studentForm").hide();
									$("#approvalForm").show();
									$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
									$("#viewStudentsButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
								});
							});
						</script>

					</body>

					</html

