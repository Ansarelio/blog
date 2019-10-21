<?php
include '../inc/connection.php';
include '../inc/login.php';

if (isset($_GET['pg']) && !empty($_GET['pg'])){
	$pg = $_GET['pg'];
	$query = displayPag($pg,$DBcon);
	
	$comments = $query->fetch_all(MYSQLI_ASSOC);

	$result = json_encode($comments);
	die($result);
} else {
	die('pg ne bil otpravlen!');
}


function displayPag($pg,$DBcon){

	$offset = ($pg-1) * 3;;
   	$query = $DBcon->query("SELECT * FROM `comment` LIMIT 3 OFFSET $offset");
   return $query;
}
?>