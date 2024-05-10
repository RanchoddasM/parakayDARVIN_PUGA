<?php
session_start();
include 'cnct.php';

if (isset($_POST['add'])) {
	
	$details = mysqli_real_escape_string($conn, $_POST['details']);
	$time = strftime("%X");
	$date = strftime("%B %d %Y");
	$post = "Private";
	$auth = "Unknown";

	foreach ($_POST['pub'] as $key) {
		if ($key != null) {
			$post = "Public";
			$auth = $sesname;
		}
	}
	$sqlq = "INSERT INTO `data`(`details`, `postdate`, `posttime`, `post`, `Author`) VALUES ('$details','$date','$time','$post', '$auth')";
    $ress = mysqli_query($conn, $sqlq);
	header("location: home.php");
}else{
	echo "error";
}


?>