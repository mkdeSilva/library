<?php

$member = $_POST['whichMember'];
echo $member;
require_once('connect.php');
session_start();
unset($_SESSION['matchPasswordError']);

$code = $_POST['code'];
$fName = addslashes($_POST['fName']);
$lName = addslashes($_POST['lName']);
$gender = $_POST['gender'];
$email = $_POST['email'];
$username = $_POST['username'];
$age = $_POST['age'];
$passwd = $_POST['passwd'];
$checkPass = $_POST['passwdVerify'];

if ($fName == '' || $lName == '' ||  $gender == '' || $email =='' || $username == '' || $age == '' || $passwd == '' || $checkPass == ''){
	$error = 1;
	header("Location: register.php");
	$_SESSION['flagError'] = 'empty';

}elseif ($passwd == $checkPass && $passwd != ''){
	
	//echo "Congrats the passwords are the same";

	if ($member=='student' && $error!=1){
		$q = "INSERT INTO students(fName,lName,faculty,email,username,passwd,gender,age) VALUES ('$fName', '$lName', '$faculty', '$email', '$username', '$passwd','$gender','$age')";
		$result = $mysqli -> query($q);
		if($result){
			header("Location: successful.php");
		}else{

			echo "Sign Up wasn't successful";
		}

	}elseif ($member=='staff' && $code=='bananas'){
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
	//add to check if  email is in correct format too


}elseif( $passwd!=$checkPass ){
	header("Location: register.php");
	$_SESSION['flagError'] = 'password';
}
	



?>