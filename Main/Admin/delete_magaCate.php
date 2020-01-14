<?php
	include '../../db.php' ;
	
	$check=mysqli_query($con,"SELECT c_id, p.category_name
	from post as p,category as c
	where c.category_name=p.category_name
	and p.category_name='" . $_GET["category_name"] . "'");
	//echo $_GET["category_name"]; exit;
	if (mysqli_num_rows($check)>0)
	{
		echo '<script>window.location.href="magazine.php?reject"</script>';
	}
	else
	{
		$query="DELETE FROM category WHERE c_id='" . $_GET["c_id"] . "'";
		if(mysqli_query($con,$query)){
			echo '<script>window.location.href="magazine.php?done"</script>';
		}
	}
	
?>