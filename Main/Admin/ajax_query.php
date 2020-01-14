<?php
	session_start();
	include("../../db.php");
	
	if(isset($_POST['contact'])){
	$did = $_SESSION['department'];
	$uid = $_SESSION['id'];
		$result = mysqli_query($con, "SELECT *
		FROM users as u,staff as s,department as d
		WHERE u.uid=s.s_id
		AND d.d_id = s.department_id
		and s.department_id=$did 
		AND u.uid !=$uid
		UNION
		SELECT *
		FROM users as u,student as st,department as d
		WHERE u.uid=st.std_id
		AND d.d_id = st.department_id
		and st.department_id=$did
		AND u.uid !=$uid");
		$array;
		while($row=mysqli_fetch_array($result)){
			$array[] = [
			'uid'=>$row['uid'],
			'first_name'=>$row['first_name'],
			'user_type'=>$row['user_type'],
			'last_login_activity'=>$row['last_login_activity'],
			'last_logout_activity'=>$row['last_logout_activity'],
			];
		};
		//print_r ($array);
		echo json_encode($array);
	}
	
	if(isset($_POST['chat'])){
		$id = $_POST['chat'];
		$uid = $_SESSION['id'];
		$result = mysqli_query($con, "SELECT * FROM `chat_message` WHERE 
		`to_user_id`= '$id' AND `from_user_id` = '$uid' OR 
		`to_user_id`='$uid' AND `from_user_id`='$id' ORDER BY `timestamp` ASC  ");
		$array;
		
		while($row=mysqli_fetch_array($result)){
			$array[] = [
			'to_user_id'=>$row['to_user_id'],
			'chat_message'=>$row['chat_message'],
			'timestamp'=>$row['timestamp'],
			];
		};
		//print_r ($array);e_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`)
		echo json_encode($array);
	}
	
	if(isset($_REQUEST['r_id'])){
	$r_id = $_POST['r_id'];
	$msg = $_POST['message'];
	$uid = $_SESSION['id'];
	$result = mysqli_query($con, "INSERT INTO `chat_message`(`to_user_id`, `from_user_id`, `chat_message`) 
	VALUES ('$r_id','$uid','$msg')  ");
	
	}
	
	?>	