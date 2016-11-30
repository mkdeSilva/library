
<html>
<title>Logging In</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="design.css">
<body>
	<header> <?php require_once('header.php') ?> </header>

	<?php
session_start(); //TO USE session, has to be at the top of the PHP code
require_once('connect.php');

$re_user = $_POST['username'];
$re_pass = $_POST['passwd'];

$q = "SELECT * FROM staff WHERE ".
"username = '$re_user' AND " .
" passwd = '$re_pass'";


$result = $mysqli -> query($q);
if ($result)
{
	$count_no_row = $result->num_rows; //count the number of rows in the result
	
	if ($count_no_row == 1){
		
		//echo "Login Successful! " . "<br>" . '<a href="mainpage.php">GO TO Main Page</a>';
		$row = $result->fetch_array();
		$_SESSION['id'] = $row['staffID']; //stores data in session
		$_SESSION['fName'] = $row['fName']; //stores data in session
		$_SESSION['lName'] = $row['lName']; //stores data in session
		$_SESSION['permission'] = 'admin';
		header("Location: bookMenu.php");
		

	}else{
		
		?>
		<br><br><br><hr><br>
		<center>

			<h2>Wrong username or password</h2>
			<h2><span class=flatLink><a href="login.php">Go Back.</a></span></h2>
		</center>

<?php
	}

}else{
	
	?>
		<br><br><br><hr><br>
		<center>

			<h2>Wrong username or password</h2>
			<h2><span class=flatLink><a href="login.php">Go Back.</a></span></h2>
		</center>
<?php
}
?>
</body>
</html>
