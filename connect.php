<?php
$mysqli = new mysqli('127.0.0.1','root','root','library');
if($mysqli->connect_errno){
    echo $mysqli->connect_errno." : ".$mysqli->connect_error;
}
?>