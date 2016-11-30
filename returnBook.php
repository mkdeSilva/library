<?php
require_once('connect.php');
session_start();
$bookCopyID = $_GET['bookCopyID'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Renting Book</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
	<header><?php require_once('header.php') ?> </header>
	<br><br><br><br><br>
	<br><br>
	<br>

	<?php 
	echo "Your book copy ID is: " . $bookCopyID;
	?>


</body>
</html>