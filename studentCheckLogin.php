<?php
session_start(); //TO USE session, has to be at the top of the PHP code
require_once('connect.php');

$re_user = $_POST['username'];
$re_pass = $_POST['passwd'];

$q = "SELECT * FROM students WHERE ".
"username = '$re_user' AND " .
" passwd = '$re_pass'";


$result = $mysqli -> query($q);
if ($result)
{
	$count_no_row = $result->num_rows; //count the number of rows in the result
	
	if ($count_no_row == 1){
		
		//echo "Login Successful! " . "<br>" . '<a href="mainpage.php">GO TO Main Page</a>';
		$row = $result->fetch_array();
		$_SESSION['id'] = $row['studentID']; //stores data in session
		$_SESSION['fName'] = $row['fName']; //stores data in session
		$_SESSION['lName'] = $row['lName']; //stores data in session
		$_SESSION['permission'] = 'student';
		header("Location: catalog.php");
		
		
		
		
	}else{
		
	echo "Wrong username or password";	
	
	}
}else{
	
	echo "Wrong username or password";
	
}


?>