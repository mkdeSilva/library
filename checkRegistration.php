<?php

$member = $_POST['whichMember'];
require_once('connect.php');
session_start();
unset($_SESSION['matchPasswordError']);

$code = $_POST['code'];
$fName = addslashes($_POST['fName']);
$lName = addslashes($_POST['lName']);
$faculty = $_POST['faculty'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$username = $_POST['username'];
$age = $_POST['age'];
$passwd = $_POST['passwd'];
$checkPass = $_POST['passwdVerify'];
$error = 0;
function valid_email($email) {
	return !!filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (valid_email($email)){
	$error = 0;
}else{
	$_SESSION['errorMessage'] = 'Email is not in the correct format';
	$_SESSION['flagErorr'] = 1;
	$error = 1;
	header("Location: register.php");
}

if ($fName == '' || $lName == '' ||  $gender == '' || $email =='' || $username == '' || $age == '' || $passwd == '' || $checkPass == ''){
	$error = 1;
	$_SESSION['flagError'] = 1 ;
	$_SESSION['errorMessage'] = 'Please fill in all boxes';
	echo $_SESSION['flagError'];
	header("Location: register.php");


}elseif ($passwd == $checkPass && $passwd != ''){
	
	//echo "Congrats the passwords are the same";

	if ($member=='student' && $error!=1){
		$usernameError = 0;
		$usernamesQuery = "SELECT username FROM students";
		$usernamesResult = $mysqli -> query($usernamesQuery);
		while($row = $usernamesResult->fetch_assoc())
		{
			if($username == $row['username'])
			{
				$_SESSION['flagError'] = 1;
				$_SESSION['errorMessage'] = 'Username is already in use';
				$usernameError = 1;
				header("Location:register.php");
			}

		}	
		if ($usernameError == 0){
			$q = "INSERT INTO students(fName,lName,faculty,email,username,passwd,gender,age) VALUES ('$fName', '$lName', '$faculty', '$email', '$username', '$passwd','$gender','$age')";
			$result = $mysqli -> query($q);
			if($result){
				header("Location: successful.php");
			}else{

				echo "Sign Up wasn't successful";
			}
		}
	}elseif ($member=='staff' && $code=='bananas')
	{
		$usernameError = 0;
		$usernamesQuery = "SELECT username FROM students";
		$usernamesResult = $mysqli -> query($usernamesQuery);
		while($row = $usernamesResult->fetch_assoc())
		{
			if($username == $row['username'])
			{
				$_SESSION['flagError'] = 1;
				$_SESSION['errorMessage'] = 'Username is already in use';
				$usernameError = 1;
				header("Location:register.php");
			}

		}	
		if ($usernameError == 0){
		$job= $_POST['job'];

		$q = "INSERT INTO staff(fName,lName,username,passwd,gender,jobID) VALUES('$fName', '$lName','$username','$passwd','$gender','$job')";
		$result = $mysqli -> query($q);
		if($result){

			header("Location: successful.php");
		}else{
			echo $q;
			echo "Sign Up wasn't successful";
		}
	}
	}
	//add to check if  email is in correct format too


}elseif( $passwd!=$checkPass ){
	$_SESSION['errorMessage'] = 'Passwords do not match';
	$_SESSION['flagError'] = 1;
	header("Location: register.php");

}




?>