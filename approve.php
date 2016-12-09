<?php
require_once('connect.php'); //dont’ know if I need this, check once this page is completed
$rentID = $_GET['rentID'];
$d = strtotime("+1 week");
$returnDate = date("Y-m-d",$d);
$setActiveQuery = "UPDATE rentDetails SET active=1, dateOfReturn = '$returnDate' WHERE rentID = '$rentID';";
$setActiveResult = $mysqli -> query($setActiveQuery);

header("Location: studentMenu.php");
?>