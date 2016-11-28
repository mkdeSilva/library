<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed

?> 

<!DOCTYPE html>
<html>


<head>
    <title>About Us</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
<header>
	<?php require_once('header.php'); ?></header>

<body>
	
	<header><?php require_once('header.php'); ?></header>
	<br><br>

<!---------------------------------------------------------------------------------------------------------------->
		
		<center>
            <h2>About Inova Antares...</h2>
        </center>

<div style="width: 100%;">
	<div style="float:left; width: 30%">
    <div class="container">   
        <div>
        <center>
            <img src="pictures/min.jpg" style="vertical-align:middle; width: 30%; height:auto" />
            <br><br><span style=""><b>Mihindu de Silva</b></span>
            <br><span style="">Co-Founder of Inova Antares</span>
            <br><span style="">Lead Programmer and Database Manager</span>
        </center>
        </div>
        <br>
        <div>
       	<center>
            <br> <img src="pictures/pavel.jpg" style="vertical-align:middle; width: 30%; height:auto"/>
            <br><br><span style=""><b>Pavel Farhan</b></span>
            <br><span style="">Co-Founder of Inova Antares </span>
            <br><span style="">Lead Programmer (PHP) </span>
        </center>
        </div>
	</div>    
    </div>

    <div style="float:right; width: 70%">
    
    <br><br><span style="">Inova Antares: Library management system is a project that we have industrialized with the aim of developing a computerized system to maintain all the daily work of a library efficiently. There are many characteristics to this project which are not generally available in a common library management systems.</span> 

	<br><br><span style="">By using this system, the operation of borrowing and managing inventories become paperless. The processes of searching for books become much easier with just the help of a mouse click. In addition, this system provides a user-friendly data entry with a dropdown button menu, list box, and check boxes in order to make the input entry easier to understand and use. The system will also ensure that the library items are stored properly and proficiently.</span>

	<br><br><span style="">Moreover, we have also incorporated services in our system which helps students, professors and librarians alike. A student, after logging into their account, can see the list of books issued, the issue date, return date, and can also make a request to the librarian to add new books by filling the book request form. A librarian, after logging into his or her account, will be able to generate various reports such as student reports, issue reports, and book reports.</span>  
	<center>
	<br><br><span style="">In general, our project is being established to help every entity maintain the library and make use of it in the best way possible.</span>
	</center>
	</div>
   	</div>
</div>

<!---------------------------------------------------------------------------------------------------------------->
<br><br><br>
</body>

</html>

