<?php
	
	include("../../db.php");
	if(isset($_POST['update'])){											
		
		$id=$_POST['id'];
		$post_approved=$_POST['post_approved'];
		
		$sql2="SELECT * FROM post,users WHERE post.post_author_id=users.uid AND post.id=$id ";
		$result2=$con->query($sql2);
		foreach($result2 as $data){
			$category_name=$data['category_name'];
			$magazine_title =$data['magazine_title '];
			$magazine_desc =$data['magazine_desc '];
			$post_type=$data['post_type'];
			$email =$data['email'];
			$first_name=$data['first_name'];
			$last_name=$data['last_name'];
		}
		
		include('send_mail_published.php'); 
		if(count($_POST)>0) {
			mysqli_query($con,"UPDATE post set post_approved='$post_approved' where id='$id'")or die(mysqli_error());
			
			echo '<script>window.location.href="magazine_list_selected.php?select"</script>';
			
			}else{
			echo '<script>window.location.href="magazine_list_selected.php?reject"</script>';
			
			
		}
		
	}
	
?>