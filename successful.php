<?php
session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed
?> 

<!DOCTYPE html>
<html>


<head>
    <title>Sign Up successful!</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="design.css">
</head>



<body>
	<header>
		<?php require_once('header.php') ?>
	</header>

<br><br><br>

    
    <center>
        <br><br><br><br><br><br><br>
        <h1>Sign Up Successful!</h1>
        <h2><span class="flatLink"><a href="login.php">You can now click here to sign in.</a></span></h2>
    </center>
</body>


</html>
