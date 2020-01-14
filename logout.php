<?php
	require('db.php');
	session_start();
	$id=$_SESSION['id'];
	$update = mysqli_query($con, "UPDATE `users` SET last_logout_activity = current_timestamp WHERE uid='$id'");
	session_destroy();
	header('location:index.php');
?>