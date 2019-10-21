<?php
session_start();
$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "blog";

$DBcon = new Mysqli($DBhost, $DBuser, $DBpass, $DBname);
if ($DBcon->connect_errno){
  die ("Error: " . $DBcon->connect_error);
}

date_default_timezone_set('Asia/Almaty');



?>