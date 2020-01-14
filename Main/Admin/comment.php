<?php 
	
	session_start();
	include("../../db.php");
	if(isset($_POST['submit'])){	
		
		$comment_body=$_POST['comment_body'];
		$author_id=$_SESSION['id'];
		$author_type=$_SESSION['user_type'];
		$date=date('m/d/Y');
		$time=date('h:i:s a');
		$id = $_POST['id'];
		
		$query="INSERT INTO `comment` (post_id,comment_body,author_id,author_type,date,time) VALUES ('$id','$comment_body','$author_id','$author_type','$date','$time')";
		if(mysqli_query($con,$query)){
			if ($_SESSION['post']=='MC'){
				header('location:mc_index.php');
				}
			if ($_SESSION['post']=='MM'){
				header('location:mm_index.php');
				}
			if ($_SESSION['post']=='Admin'){
				header('location:index.php');
				}
		
		
			
		}
	}
	
?>
