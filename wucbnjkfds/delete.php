<?php
session_start();
include 'cnct.php';

$sesname = $_SESSION['username'];

if (!$_SESSION['username']) {
	header("location: login.php");
}

	
	$id = $_GET['id'];
	$_SESSION['id'] = $id;
	
	$qlq = "DELETE FROM `data` WHERE `id` = '$id'";
    $ress = mysqli_query($conn, $qlq);
	header("location: home.php");



?>