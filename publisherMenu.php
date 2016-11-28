<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed

?> 

<!DOCTYPE html>
<html>


<head>
	<title>Book Menu</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
	<header>
		<?php require_once('header.php'); ?>
	</header>

	<br><br>

	<?php 
	if (isset($_SESSION['permission'])){
		if ($_SESSION['permission'] == 'admin'){ 
			?>
			<center>
				<div class="flatSidebar">
					<ul>
						<li><a href='bookMenu.php'><h2><span>Books</span> | </h2></a></li>
						<li><a href='publisherMenu.php'><h2><span class="active">Publishers</span> | </h2></a></li>
						<li><a href='studentMenu.php'><h2><span>View Students</span></h2></a></li>
					</ul>
				</div>
			</center><br><br><br><br>

			<center>
				<div style="color: white;padding: 30px;">
					<h2><span id="addPublisherButton" class="flatChoiceActive"><a>Add a Publisher</a></span>|<span id="viewPublisherButton" class="flatChoiceInactive"><a>View Publishers</a></span></h2>
				</div>
			</center>
			<form id="addPublisherForm" action="addPublisher.php" method="POST">
				<div id="allInputs">

					<!-- ADD BOOK FORM -->
					<center>
						<div>
							<label>name</label><br>
							<input type="text" name="publisherName" class="flatInput">
							<br><br>
							<label>location</label><br>
							<input type="text" name="publisherLocation" class="flatInput">
							<br><br>
							<br><br>
							<br>
							<input type="submit" value="Add Publisher" style="width:100px;" class="flatButton">	
						</div>
					</center>
				</div>
			</form>

			<!-- VIEW BOOKS-->

			<div style="display:none" id="viewPublisherForm">
<!--				wussup we got books here<br>
				<table>
					<tr>
						<th>Book Name</th>
						<th>Book Author</th>
					</tr>
					<tr>
						<td>Eragon</td>
						<td>Christopher Paolini</td>

					</tr>
				</table>--><center>
				<table>
					<?php
					$q="SELECT * FROM publishers;";
					$q = strtolower($q);
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						break;
					}else{
						?>

						<tr>
							<th>Name</th>
							<th>Location</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						<?php

						while($row=$result->fetch_array()){ ?>
						<tr>
							<td><?=$row['name']?></td> 
							<td><?=$row['location']?></td>
							<td align="center" valign="middle">
							<a href="editPublisher.php?pubID=<?=$row['pubID']?>"><img src="pictures/edit.ico" width="24" height="24"></a>
							</td>
							<td align="center" valign="middle">
								<a href='deletePublisher.php?pubID=<?=$row['pubID']?>'> <img src="pictures/delete.ico" width="24" height="24"></a>
							</td>
						</tr>                               
						<?php }} ?>
					</table>
</center>
				</div>

				<?php 
			}else if($_SESSION['permission'] == 'student'){
				echo "<br><br><br><br><center><h2>You are a student, go here: <span class='flatLink'><a href='studentHome.php'>Student Home</a></span></h2></center>";
			}
		}else{
			echo "<br><br><br><br><center><h2>You must login to see the contents of our website: <span class='flatLink'><a href = 'login.php'>Login</a></span></h2></center>";
		}
		?>


		<script src = 'jQuery.js'></script>
		<script>
			$(function(){
				$("#addPublisherButton").click(function(){
					$("#viewPublisherForm").hide();
					$("#addPublisherForm").show();
					$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
					$("#viewPublisherButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
				});
			});

			$(function(){
				$("#viewPublisherButton").click(function(){
					$("#addPublisherForm").hide();
					$("#viewPublisherForm").show();
					$(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
					$("#addPublisherButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
				});
			});
		</script>

	</body>

	</html
