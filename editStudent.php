<?php
require_once('connect.php');
session_start();

$editID = $_GET['editID'];
$q = "SELECT * FROM students WHERE studentID = '$editID'";
$result = $mysqli->query($q);// Exec select query
$editStudent = $result -> fetch_array();

?>
<html>
<title>Edit Student</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
<header> <?php require_once('header.php') ?> </header>
	<br><br>

			<center>
				<div class="flatSidebar">
					<ul>
						<li><a href='bookMenu.php'><h2><span>Books</span> | </h2></a></li>
						<li><a href='authorMenu.php'><h2><span>Authors</span> | </h2></a></li>
						<li><a href='studentMenu.php'><h2><span class="active">View Students</span></h2></a></li>
					</ul>
				</div>
			</center><br><br><br><br>

			<center>
				<div style="color: white;padding: 30px;">
					<h2><span id="addBooksButton" class="flatChoiceActive"><a>Edit Student</a></span></h2>
					<hr>
				</div>
			</center>

			<form id="updateStudent" action="updateStudent.php" method="POST">
					<!-- ADD BOOK FORM -->

					<div style="float:left">
						<label>first name</label><br>
						<input type="text" name="fName" class="flatInput" value="<?=$editStudent['fName']?>">
						<br><br>
						<label>last name</label><br>
						<input type="text" name="lName" class="flatInput" value="<?=$editStudent['lName']?>">
						<br><br>
						<label>faculty</label><br>
						<input type="text" name="faculty" class="flatInput" value="<?=$editStudent['faculty']?>">
						<br><br>
						<label>email</label><br>
						<input type="text" name="email" class="flatInput"  value="<?=$editStudent['email']?>">
						<br><br>
						<!--
							<label>Upload an Image</label><br>
							<input type="file" name ="file" id=fileUpload">
						-->
					</div>
					<div style="float:right">
						<label>username</label><br>
						<input type="text" name="username" class="flatInput" value="<?=$editStudent['username']?>">
						<br><br>
						<label>gender</label><br>
						<input type="text" name="gender" class="flatInput" value="<?=$editStudent['gender']?>">
						<br><br>
						<label>age</label><br>
						<input type="text" name="age" class="flatInput" value="<?=$editStudent['age']?>"> 
						<br><br>
						<label>rent</label><br>
						<input type="text" name="rent" class="flatInput" value="<?=$editStudent['anyRent']?>">
						<br><br>
						<label>overdue pay</label><br>
						<input type="text" name="overdue" class="flatInput" value="<?=$editStudent['overduePay']?>">
						<br><br>
						<br>
						<input type="hidden" name="studentID" value ="<?= $editID ?> ">
						<input type="submit" style="width:100px" value="Update Student" class="flatButton">	
					</div>
				</div>

</form>
<?php

?>	

</body>
</html>
