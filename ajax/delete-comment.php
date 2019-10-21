<?php
include '../inc/connection.php';


if(isset($_POST['id']) && !empty($_POST['id'])){
	$del=$_POST['id'];
	$query = $DBcon->query("DELETE FROM `comment` WHERE `id`='$del'");
	if ($query){
		 exit('Success');
  } else {
    	exit('Fail');
  }
}
?>