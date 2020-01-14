<?php
	session_start();
	date_default_timezone_set('Asia/Dhaka');
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){
		
		//session_start();
		include("../db.php");
		
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<!-- Tell the browser to be responsive to screen width -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<!-- Favicon icon -->
			<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
			<title>Must Change</title>
			<!-- Bootstrap Core CSS -->
			<link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
			<!-- Custom CSS -->
			<link href="css/helper.css" rel="stylesheet">
			<link href="css/style.css" rel="stylesheet">
			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
			<!--[if lt IE 9]>
				<script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		
		<body class="fix-header fix-sidebar">
			<!-- Main wrapper  -->
			<div id="main-wrapper">
				<div class="header">
					<nav class="navbar top-navbar navbar-expand-md navbar-light">
						<!-- Logo -->
						<div class="navbar-header">
							<a class="navbar-brand" href="index.html">
								<!-- Logo icon -->
								<b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
								<!--End Logo icon -->
								<!-- Logo text -->
								<span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
							</a>
						</div>
						<!-- End Logo -->
						<div class="navbar-collapse">
							<!-- toggle and nav items -->
							<ul class="navbar-nav mr-auto mt-md-0">
								<!-- This is  -->
								<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
								<li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
								
								
								
							</ul>
							
							<!-- User profile and search -->
							<ul class="navbar-nav my-lg-0">
								
								<!-- Profile -->
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo $_SESSION['name'];?>
										<?php echo $_SESSION['last_name'];?>
									</a>
									<div class="dropdown-menu dropdown-menu-right animated zoomIn">
										<ul class="dropdown-user">
											<li><a href="updatepassword.php"><i class="ti-settings"></i> Update Password</a></li>
											<li><a href="../logout.php"><i class="ti-power-off"></i> Logout</a></li>
											
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				<!-- End header header -->
				<!-- Left Sidebar  -->
				<div class="left-sidebar">
					<!-- Sidebar scroll-->
					<div class="scroll-sidebar">
						<!-- Sidebar navigation-->
						<nav class="sidebar-nav">
							<ul id="sidebarnav">
								<li class="nav-devider"></li>
								
								<li><a href="index.php"><i class="fa fa-home"></i><span class="hide-menu">Home </span> </a></li>						
								<li><a href="timeline.php"><i class="fa fa-address-book"></i><span class="hide-menu">Timeline </span> </a></li>						
								<li><a href="post.php"><i class="fa fa-newspaper-o"></i><span class="hide-menu">Post </span> </a></li>					
								<li><a href="chat.php"><i class="fa fa-envelope-o"></i><span class="hide-menu">Message </span> </a></li>					
								
								
								
							</ul>
						</nav>
						<!-- End Sidebar navigation -->
					</div>
					<!-- End Sidebar scroll-->
				</div>
				<!-- End Left Sidebar  -->
				<!-- Page wrapper  -->
				<div class="page-wrapper">
					<!-- Bread crumb -->
					<div class="row page-titles">
						<div class="col-md-3 align-self-center">
						<h3 class="text-primary">Update Password</h3> </div>
						<div class="col-md-6 ">
							<?php if(isset($_GET['update'])){
								echo "<div class='alert alert-warning alert-dismissible fade show'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<strong>Please!</strong> Update Your Password .
								</div>";
							}?>
						</div>
						<div class="col-md-3 align-self-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
								<li class="breadcrumb-item active">Update Password</li>
							</ol>
						</div>
					</div>
					<!-- End Bread crumb -->
					
					<!-- Container fluid  -->
					<div class="container-fluid">
						<!-- Start Page Content -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-title">
										<h4>Update Password</h4>
										
									</div>
									<div class="card-body">
										<script type="text/javascript">
											$(document).ready(function() {
												$('#example-progress-bar-hierarchy').strengthMeter('progressBar', {
													container: $('#example-progress-bar-hierarchy-container'),
													hierarchy: {
														'0': 'progress-bar-danger',
														'10': 'progress-bar-warning',
														'15': 'progress-bar-success'
													}
												});
											});
										</script>
										<?php
											require('../db.php');
											if(isset($_POST['update'])){											
												$email = $_SESSION['email'];
												$password = mysqli_real_escape_string($con, $_POST['current']);
												$new_password=$_POST['new_password'];
												$p_length=strlen($new_password);
												//echo $p_length;
												if($p_length <=5){
													echo "<div class='alert alert-danger'>
													Sorry User New Password Should be Minimum  6 Character .
													</div>";
													}else{
													$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . $password. "' and user_type='STD'");
													if ($row = mysqli_fetch_array($result)) {													
														$query="UPDATE users set password='$new_password' where email='$email'";
														if(mysqli_query($con,$query)){
															echo "<div class='alert alert-success'>
															<strong>Password Successfuly Updated.</strong> 
															</div>";
														}
														}else{
														echo "<div class='alert alert-danger'>
														Soory User...Your Inputed Current Password is Wrong.
														</div>";
													}
												}
											}
										?>
										<div class="basic-form">
											<form autocomplete="off" method="post" action="updatepassword.php">				  
												<div class="form-group row">
													<label for="inputPassword" class="col-sm-3 col-form-label">Current Password</label>
													<div class="col-sm-8" style="fload:right">
														<input type="password" name="current" class="form-control" required id="inputPassword" placeholder="Please Type Your Current Password">
														
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword" class="col-sm-3 col-form-label">New Password</label>
													<div class="col-sm-8">
														<input type="password" name="new_password" onblur="checkLength(this)" class="form-control" id='password'  maxlength="30" required placeholder="Please Type Your New Password">
													</div>
												</div>
												
												<div class="form-group row">
													<label for="inputPassword" class="col-sm-3 col-form-label">Confirm Password</label>
													<div class="col-sm-8">
														<input type="password" name="confirm_password" class="form-control" id='confirm_password' required  placeholder="Please Type Your Confirm Password">
													</div>
												</div>
												<div class="form-group row">
													
													<div class="col-sm-8" style="margin-left:40%">
														<input type="submit" name="update" value="Update"  class="btn btn-success">
													</div>
												</div>
											</form>
											<script>
												var password = document.getElementById("password")
												, confirm_password = document.getElementById("confirm_password");
												
												function validatePassword(){
													if(password.value != confirm_password.value) {
														confirm_password.setCustomValidity("Passwords Don't Match");
														} else {
														confirm_password.setCustomValidity('');
													}
												}											
												password.onchange = validatePassword;
												confirm_password.onkeyup = validatePassword;																								
											</script>
										</div>
									</div>
								</div>
							</div>
							<!-- /# column -->
							
						</div>
						
						
						<!-- End PAge Content -->
					</div>
					<!-- End Container fluid  -->
					<!-- footer -->
					<footer class="footer"> © 2019 All rights reserved. Team Name</footer>
					<!-- End footer -->
				</div>
				<!-- End Page wrapper  -->
			</div>
			<!-- End Wrapper -->
			<!-- All Jquery -->
			<script src="js/lib/jquery/jquery.min.js"></script>
			<!-- Bootstrap tether Core JavaScript -->
			<script src="js/lib/bootstrap/js/popper.min.js"></script>
			<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
			<!-- slimscrollbar scrollbar JavaScript -->
			<script src="js/jquery.slimscroll.js"></script>
			<!--Menu sidebar -->
			<script src="js/sidebarmenu.js"></script>
			<!--stickey kit -->
			<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
			<!--Custom JavaScript -->
			<script src="js/scripts.js"></script>
			
		</body>
		
	</html>
	<?php
		
	}else 
	header('location:../index.php?deactivate');
?>