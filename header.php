
<div id="nav">
	<div id="navWrapper">
		<ul>
			<li><a href="index.php">Home</a></li> <!-- replace with book icon -->
			<li><a href="catalog.php">Catalog</a></li>
			<li><a href="about.php">About</a></li>
<?php
	if (isset($_SESSION['id']) && ($_SESSION['permission'] == 'student'))
	{
?>
			<li><a href="studentHome.php"> Student Home </a><li>			
			<li><a href="#">Signed in as student</a></li>
			<li><a href="logout.php">Logout</a><li>
		</ul>
	</div>
</div>
<?php
	}else if (isset($_SESSION['id']) && ($_SESSION['permission'] == 'admin'))
	{
?>
			<li><a href="bookMenu.php">Staff menu</a></li>
			<li><a href="">Signed in as Staff</a></li>
			<li><a href="logout.php">Logout</a></li>
			
		</ul>
	</div>
</div>
<?php
	}else{
?>
		<li><a href="login.php">Log In</a></li>	
		<li><a href="register.php">Sign Up</a></li>
		</ul>
	</div>
</div>

<?php } ?>
