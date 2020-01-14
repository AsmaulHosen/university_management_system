
<?php
	include '../db.php' ;
	
	$check=mysqli_query($con,"SELECT * from post,comment where post.id=comment.post_id and comment.post_id=" . $_GET["id"] . "");
	echo "SELECT * from post,comment where post.id=comment.post_id and comment.post_id=" . $_GET["id"] . "";exit;
	//echo $_GET["category_name"]; exit;
	if (mysqli_num_rows($check)>0)
	{
		echo '<script>window.location.href="post.php?reject"</script>';
	}
	else
	{
		$query="DELETE FROM post WHERE id='" . $_GET["id"] . "'";
		if(mysqli_query($con,$query)){
			echo '<script>window.location.href="post.php?delete"</script>';
		}
	}
	
?>