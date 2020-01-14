<?php
	if(isset($_POST['login']))
	{
		function CheckCaptcha($userResponse) {
			$fields_string = '';
			$fields = array(
            'secret' => '6LcjfU4UAAAAAN24CIV4cXH9r7n1iWG9juZxrHwO',
            'response' => $userResponse);
			foreach($fields as $key=>$value)
			$fields_string .= $key . '=' . $value . '&';
			$fields_string = rtrim($fields_string, '&');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
			$res = curl_exec($ch);
			curl_close($ch);
			return json_decode($res, true);
		}
		// Call the function CheckCaptcha
		$result = CheckCaptcha($_POST['g-recaptcha-response']);
		if ($result['success']) {
			//If the user has checked the Captcha box
			// echo "Captcha verified Successfully";
			require('../db.php');
			//$con=mysqli_connect('localhost','root','','ewsd');
			session_start();
			//if (isset($_POST['login'])) {
			
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
					
			$result = mysqli_query($con, "SELECT * FROM users INNER JOIN student on users.uid=student.std_id WHERE email = '" . $email. "' and password = '" . $password. "' and user_type='STD'");
			$result2 = mysqli_query($con, "SELECT * FROM users INNER JOIN staff on users.uid=staff.s_id WHERE email = '" . $email. "' and password = '" . $password. "' and user_type='STAFF' and post='MC'");
			$result_2 = mysqli_query($con, "SELECT * FROM users INNER JOIN staff on users.uid=staff.s_id WHERE email = '" . $email. "' and password = '" . $password. "' and user_type='STAFF' and post='MM'");
			$result_3 = mysqli_query($con, "SELECT * FROM users INNER JOIN staff on users.uid=staff.s_id WHERE email = '" . $email. "' and password = '" . $password. "' and user_type='STAFF' and post='Guest'");
			$result3 = mysqli_query($con, "SELECT * FROM users INNER JOIN staff on users.uid=staff.s_id WHERE email = '" . $email. "' and password = '" . $password. "' and user_type='Admin'");
					
			if ($row = mysqli_fetch_array($result)) {
				$_SESSION['email']=$email;
				//$_SESSION['password']=$password;
				$_SESSION['name']=$row['first_name'];
				$_SESSION['last_name']=$row['last_name'];
				$_SESSION['id']=$row['uid'];
				$id= $row['uid'];
				$_SESSION['status']=$row['status'];
				$_SESSION['department']=$row['department_id'];
				$_SESSION['user_type']='STD';
				$_SESSION['std_login']=TRUE;
				$_SESSION['login']=TRUE;
				$update = mysqli_query($con, "UPDATE `users` SET last_login_activity = current_timestamp WHERE uid='$id'");
				include('send_mail.php');
				if($password=='123'){
					//echo "Student Page password change";
					header("Location:../Main/updatepassword.php?update");
					}else{
					//echo "Student Page ";
					header("Location:../Main/index.php?done");
				}
				}else if($row = mysqli_fetch_array($result2)) {
				$_SESSION['email']=$email;
				$_SESSION['name']=$row['first_name'];
				$_SESSION['id']=$row['uid'];
				$id= $row['uid'];
				$_SESSION['status']=$row['status'];
				$_SESSION['user_type']='STAFF';
				$_SESSION['post']=$row['post'];
				$_SESSION['department']=$row['department_id'];
				$_SESSION['post']=$row['post'];
				$did = $row['department_id'];
				$results = mysqli_query($con, "SELECT d_name FROM department Where d_id = '$did' ");
				if($row = mysqli_fetch_array($results)){
				$_SESSION['d_name']=$row['d_name'];
				}
				$_SESSION['login']=TRUE;
				$update = mysqli_query($con, "UPDATE `users` SET last_login_activity = current_timestamp WHERE uid='$id'");		
				if($password=='123'){
					//echo "MC Staff Page password change";
					header("Location:../Main/Admin/mc_index.php?done");
					}else{
					//echo "MC Staff Page";
					header("Location:../Main/Admin/mc_index.php?done");
				}
				}else if($row = mysqli_fetch_array($result_2)) {
				$_SESSION['email']=$email;
				$_SESSION['name']=$row['first_name'];
				$_SESSION['id']=$row['uid'];
				$id= $row['uid'];
				$_SESSION['status']=$row['status'];
				$_SESSION['user_type']='STAFF';
				$_SESSION['post']=$row['post'];
				$_SESSION['department']=$row['department_id'];
				$_SESSION['post']=$row['post'];
				$_SESSION['login']=TRUE;
				$update = mysqli_query($con, "UPDATE `users` SET last_login_activity = current_timestamp WHERE uid='$id'");			
				if($password=='123'){
					//echo "MM Staff Page password change";
					header("Location:../Main/Admin/mm_index.php?done");
					}else{
					//echo "MM Staff Page";
					header("Location:../Main/Admin/mm_index.php?done");
				}
				}
				else if($row = mysqli_fetch_array($result_3)) {
				$_SESSION['email']=$email;
				$_SESSION['name']=$row['first_name'];
				$_SESSION['id']=$row['uid'];
				$id= $row['uid'];
				$_SESSION['status']=$row['status'];
				$_SESSION['user_type']='STAFF';
				$_SESSION['post']=$row['post'];
				$_SESSION['department']=$row['department_id'];
				$_SESSION['post']=$row['post'];
				$_SESSION['login']=TRUE;
				$update = mysqli_query($con, "UPDATE `users` SET last_login_activity = current_timestamp WHERE uid='$id'");			
				if($password=='123'){
					//echo "Guest Staff Page password change";
					header("Location:../Main/Admin/guest_index.php?done");
					}else{
					//echo "Guest Staff Page";
					header("Location:../Main/Admin/guest_index.php?done");
				}
				}
				else if ($row = mysqli_fetch_array($result3)) {
				$_SESSION['email']=$email;
				$_SESSION['name']=$row['first_name'];
				$_SESSION['id']=$row['uid'];
				$id= $row['uid'];
				$_SESSION['status']=$row['status'];
				$_SESSION['user_type']='Admin';
				$_SESSION['post']=$row['post'];
				$_SESSION['department']=$row['department_id'];
				$_SESSION['post']=$row['post'];
				$_SESSION['login']=TRUE;
				$update = mysqli_query($con, "UPDATE `users` SET last_login_activity = current_timestamp WHERE uid='$id'");	
				if($password=='123'){
					//echo "Admin Page password change";
					header("Location:../Main/Admin/index.php?done");
					}else{
					//echo "Admin Page ";
					header("Location:../Main/Admin/index.php?done");
				}
				}else {
				//echo "error msg";
				header('location:../index.php?error');
			}
			
			//}
			} else {
			// If the CAPTCHA box wasn't checked
			//echo "Error Message";  
			header('location:../index.php?ewcaptcha_error');
		}
	}
?>