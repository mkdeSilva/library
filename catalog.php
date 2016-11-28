<?php
    session_start();
    require_once('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Catalog</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="design.css">


</head>

<body>

	<header>
		<?php require_once('header.php') ?>
	</header>
	
	<br><br><br>
	
	<center>
		<br>
		<form action="search.php" method="POST">
			<div class="x">
				Search bar here
				<br><br>
				<input type="text" name="searchQuery" class="flatSearch" placeholder="search the library">
				<input type="submit" value="search" class="flatSearchButton">
			</div>
		</form>
		<br><br>
	</center>
	
	<h2>Here are some books to read: </h2>
	<hr><br>
	<?php 
		$q = "SELECT * FROM book ORDER BY RAND() LIMIT 3";
		$result = $mysqli -> query($q);
		if ($result)
		{
			$images[] = 2;
			$bookNames[] = 2;
			$bookAuthors[] = 2;
			$i = 0;
			while($row = $result->fetch_assoc()){
				//storing these in arrays to use later
				$images[$i] = $row['imageLink']; 
				$bookNames[$i] = $row['bookName'];
				$bookAuthors[$i] = $row['bookAuthor'];
				$i++;

				//Images on the left followed by descriptions on the right
				echo "<div><img style=vertical-align:middle width=100em src=" . $row['imageLink'] . ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['bookName'] . "&nbsp&nbsp" . " - " . "&nbsp&nbsp" . $row['bookAuthor'] ."&nbsp". "</div><br><br>" ;

				//Same as above, trying to float left so multiple lines of text can appear beside an image
				/*echo "
					<div style='width: 400px'>  
						<div style='padding: 5px'>
						   <img style='float:left' width='100em' src=". $row['imageLink'] . ">
						    <span>" . $row['bookName']. "<br><br>".$row['bookAuthor'] . "</span>
						</div>      
					</div>
					<br style='clear:both' /><br>";*/
			}
			?>

	<!--<center>
		//Making the images appear on the top followed by their descriptions underneath
		<div class="row">
			<img width = 300em src=<?php //echo " $images[0]"; ?> >
			<img width = 300em src=<?php //echo " $images[1]"; ?> >
			<img width = 300em src=<?php //echo " $images[2]"; ?> >
   		 </div>

   	</center> -->
<?php
		}else{
			echo "There are no books in stock";
		}

?>
<!--
<div style="width: 400px">  
	<div style="padding: 5px">
	   <img src="https://upload.wikimedia.org/wikipedia/en/c/ce/Eragon_book_cover.png" style="float:left" width="200px">
	    <span>Author: Christopher Paolini<br><br>Inheritance Cycle: Eragon</span>
	</div>      
</div>
<br style="clear:both" />
-->
</body>
</html>

<!-- eragon image source: 

"https://upload.wikimedia.org/wikipedia/en/c/ce/Eragon_book_cover.png

-->