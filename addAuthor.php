<?php
require_once('connect.php');
session_start();

$name = $_POST['authorName'];
$website = $_POST['authorWebsite'];
?>
<html>
<title>Adding Publisher</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
<body>
<header> 
	<?php require_once('header.php') ?> 
</header>
<?php


$q = "INSERT INTO authors(authorName,website) VALUES('$name','$website');";

$result = $mysqli -> query($q);



if($result){
		?>
		<br><br><br><br><br>
		<center>
		<h2>Added Author!</h2>
		<h2><span class=flatLink><a href="authorMenu.php">Go Back.</a></span></h2>
		</center>
		<?php
	}else{
		echo $q;
		echo "<br><br><br><br><br><center><h2>Adding author wasn't successful<h2><span class='flatLink'><a href=authorMenu.php>Go back</a></span></center>";
	}


?>