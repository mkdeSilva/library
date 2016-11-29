<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed

?> 

<!DOCTYPE html>
<html>


<head>
    <title>Student Home</title>
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
?>
<center>
	<div class="flatSidebar">
		<ul>
			<li><a href="studentHome.php"><h2><span class="active"> Welcome <?php echo $_SESSION['fName'];?> | </span></h2></a></li>
			<li><a href='studentProfile.php'><h2><span> Profile </span> | </h2></a></li>
			<li><a href='studentHistory.php'><h2><span> History </span></h2></a></li>
		</ul>

		<br><br><br><br><br>
		<center>
		<br><br>
		<form action="search.php" method="POST">
			<div class="x">
				Search for a book you would like to rent:
				<br><br>
				<input type="text" name="searchQuery" class="flatSearch" placeholder="search the library">
				<input type="submit" value="search" class="flatSearchButton">
			</div>
		</form>
		<br><br>
	</center>
			
	</div>
</center>

<?php 
		
	}else{
		echo "<br><br><br><br><center><h2>You must login to see the contents of our website: <span class='flatLink'><a href = 'login.php'>Login</a></span></h2></center>";
	}
?>

</body>

</html>
