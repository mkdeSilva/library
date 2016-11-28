<?php
    session_start();
    require_once('connect.php');

    $searchQuery = $_POST['searchQuery'];
?>


<!DOCTYPE html>
<html>

<head>

    <title>Search</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="design.css">
	
</head>

<body>
	
	<header><?php require_once('header.php'); ?></header>
	<br><br><br>
	<?php 
    //echo $searchQuery;
    $q = "SELECT * FROM book where bookName LIKE '%$searchQuery%' OR bookGenre LIKE '%$searchQuery%' OR bookAuthor LIKE '%$searchQuery%' "; //Searching for book names that contain the string of the searchQuery

    //echo $q;
    echo "<br>";
    $result = $mysqli -> query($q);
    if ($result)
    {
        $images = array();
        $bookNames = array();
        $bookAuthors = array();
        $i = 0;
        while($row = $result->fetch_assoc()){

            //storing these in arrays to use later
            $images[$i] = $row['imageLink']; 
            $bookNames[$i] = $row['bookName'];
            $bookAuthors[$i] = $row['bookAuthor'];
            $i++;
            //Images on the left followed by descriptions on the right
            /*echo "<center><div><img style = vertical-align:middle width=100em src=" . $row['imageLink'] . ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['bookName'] . "&nbsp&nbsp" . " - " . "&nbsp&nbsp" . $row['bookAuthor'] ."&nbsp". "</div><br><br></center>" ;*/
            }

        if (empty($bookNames)){
            echo "<br><br><br><br><br><center><h2>There are no matching books for <em>'" .$searchQuery . "'</em> in our library<br><br><div class='flatLink'><a href=catalog.php>Go back to catalog</a></div></h2></center>";
        }else{ 
            echo '<h2>Search Results for "' . $searchQuery . '" </h2><hr><br>';

            foreach($bookNames as $index => $name){
                echo "<div style='padding: 40px'><img style = vertical-align:middle width=100em src=" . $images[$index] . ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $name . "&nbsp&nbsp" . " - " . "&nbsp&nbsp" . $bookAuthors[$index] ."&nbsp". "</div><br><br>" ;
            }

            }

        } else {
            echo "There are no matching books for " . $searchQuery . " in our library";
    }
    ?>
</body>

</html>

