<?php
include '../inc/connection.php';
include '../inc/login.php';
$del=$_GET['id'];

$query = $DBcon->query("DELETE FROM `comment` WHERE `id`='$del'");

if ($query){
		// echo "Успешно сохранено!";
		header('location: comments.php?status=success');
	}
?>