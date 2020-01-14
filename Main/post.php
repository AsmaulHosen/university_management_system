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
			<title>Personal Post</title>
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
						<div class="col-md-5 align-self-center">
						<h3 class="text-primary">Post</h3> </div>
						<div class="col-md-7 align-self-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
								<li class="breadcrumb-item active">Post</li>
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
										<h4 class="card-title">Personal Post</h4>

									</div>

									<div class="card-body">
										<?php if(isset($_GET['delete'])){

											echo "<div class='alert alert-danger'>
											<strong>Success!</strong> Idea Delete Succesfully.
											</div>";
										}?>
										<?php if(isset($_GET['reject'])){

											echo "<div class='alert alert-warning'>
											<strong>Sorry User!</strong> You Cann't Delete this Post because it Contains Numbers of Comment.
											</div>";
										}?>
										<?php if(isset($_GET['update'])){

											echo "<div class='alert alert-warning'>
											<strong>Success!</strong> Idea Update Succesfuly.
											</div>";
										}?>
										<!-- Nav tabs -->
										<div class=" ">
											<ul class="nav nav-tabs tabs-vertical" role="tablist">
												<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home9" role="tab"><span><i class="fa fa-upload"></i>&nbsp; Published Post</span></a> </li>
												<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile9" role="tab"><span><i class="fa fas fa-check-square"></i>&nbsp; Selected Post</span></a> </li>
												<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages9" role="tab"><span><i class="fa fas fa-spinner fa-pulse"></i>&nbsp; Pending Post</a> </li>
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
													<div class="tab-pane active p-20" id="home9" role="tabpanel">
														<?php
															include("../db.php");
															$a= $_SESSION['id'];
															//echo $a;
															$query="SELECT * FROM post
															WHERE post_approved='Approved'
															AND post_status='Select'
															AND post_author_id='$a'";

															$result=mysqli_query($con,$query);
															if(mysqli_num_rows($result)>0){
																while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
																?>
																<div class="p-20">
																	<h4><strong>Category : </strong><?php echo $row["category_name"]; ?><a style="float:right" class="btn btn-sm btn-danger" href="Edit_bonus_Type.php?bonus_type_id=<?php echo $row["bonus_type_id"]; ?>"><i class="fa fa-scissors"></i></a></h4>
																	<hr/>
																	<h5><i>Date : <?php echo $row["date"];?></i> <i style="float: right">Time : <?php echo $row["time"];?></i></h5>
																	<h5><strong>Magazine Title : </strong><?php echo $row["magazine_title"];?></h5>
																	<h5><strong>Post Type : </strong><?php echo $row["post_type"];?></h5>
																	<p><i>Magazine Description : <?php echo $row["magazine_desc"];?></i></p>
																	<h6> File Download :  <label class='btn btn-mg btn-success btn-rounded' style='color:white'>
																		<?php
																			if($row['file_input']!=""){
																				echo "

																				<a target='_blank' style='color:white' href='".$row['file_input']."'>
																				<i class='fa fa-download '></i> File</a>";
																				}else{
																				echo "No Attachment";
																			}
																		?>
																		</label>
																	</h6>
																	<hr/>
																</div>

																<?php
																}

																}else {
															?>
															<div class="p-20">
																<h4>No posts have been published yet.</h4>

															</div>
															<?php
															}
														?>
													</div>
													<div class="tab-pane  p-20" id="profile9" role="tabpanel">
														<?php
															include("../db.php");
															$a= $_SESSION['id'];
															//echo $a;
															$query="SELECT * FROM post
															WHERE post_approved='Not Approved'
															AND post_status='Select'
															AND post_author_id='$a'";

															$result=mysqli_query($con,$query);
															if(mysqli_num_rows($result)>0){
																while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
																?>
																<div class="p-20">
																	<h4><strong>Category : </strong><?php echo $row["category_name"]; ?><a style="float:right" class="btn btn-mg btn-danger btn-rounded" href="Edit_bonus_Type.php?bonus_type_id=<?php echo $row["bonus_type_id"]; ?>"><i class="fa fa-scissors"></i></a></h4>
																	<hr/>
																	<h5><i>Date : <?php echo $row["date"];?></i>  <i style="float: right">Time : <?php echo $row["time"];?></i></h5>
																	<h5><strong>Magazine Title : </strong><?php echo $row["magazine_title"];?></h5>
																	<h5><strong>Post Type : </strong><?php echo $row["post_type"];?></h5>
																	<p><i>Magazine Description : <?php echo $row["magazine_desc"];?></i></p>
																	<h6> File Download :  <label class='btn btn-mg btn-success btn-rounded' style='color:white'>
																		<?php
																			if($row['file_input']!=""){
																				echo "

																				<a target='_blank' style='color:white' href='".$row['file_input']."'>
																				<i class='fa fa-download '></i> File</a>";
																				}else{
																				echo "No Attachment";
																			}
																		?>
																		</label>
																	</h6>
																	<hr/>
																</div>

																<?php
																}

																}else {
															?>
															<div class="p-20">
																<h4>No posts have been Selected yet</h4>
															</div>
															<?php
															}
														?>
													</div>
													<div class="tab-pane p-20" id="messages9" role="tabpanel">
														<?php
															include("../db.php");
															$a= $_SESSION['id'];
															//echo $a;
															$query="SELECT * FROM post
															WHERE post_approved='Not Approved'
															AND post_status='Pending'
															AND post_author_id='$a'";

															$result=mysqli_query($con,$query);
															if(mysqli_num_rows($result)>0){
																while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
																?>
																<div class="p-20">
																	<h4><strong>Category : </strong><?php echo $row["category_name"]; ?>

																		<?php
																				$cname=$row["category_name"];
																					$query1="SELECT * FROM category WHERE category_name='$cname' and final_closure_date <= DATE_FORMAT(CURDATE(), '%m/%d/%Y')";
																					//echo $query1;
																							$result1=mysqli_query($con,$query1);
																							if(mysqli_num_rows($result1)>0){
																							while($row=mysqli_fetch_array($result1, MYSQLI_ASSOC)){

																								//echo $row['final_closure_date'];

																								echo '<a style="float:right" >Update & Delete Session Completed</a>';

																							}

																							}else{
																						?>
																						<a style="float:right" class="btn btn-sm btn-warning btn-rounded" href="updatepost.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-edit"></i> </a>
																						<a style="float:right" class="btn btn-sm btn-danger btn-rounded" href="delete_post.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-scissors"></i></a>
																				<?php
																							}

																					?>


																	</h4>
																	<hr/>
																	<h5><i>Date : <?php echo $row["date"];?></i> <i style="float: right">Time : <?php echo $row["time"];?></i></h5>
																	<h5><strong>Magazine Title : </strong><?php echo $row["magazine_title"];?></h5>
																	<h5><strong>Post Type : </strong><?php echo $row["post_type"];?></h5>
																	<p><i>Magazine Description : <?php echo $row["magazine_desc"];?></i></p>
																	<h6> File Download :  <label class='btn btn-mg btn-success btn-rounded' style='color:white'>
																		<?php
																			if($row['file_input']!=""){
																				echo "

																				<a target='_blank' style='color:white' href='".$row['file_input']."'>
																				<i class='fa fa-download '></i> File</a>";
																				}else{
																				echo "No Attachment";
																			}
																		?>
																		</label>
																	</h6>
																	<hr/>
																</div>

																<?php
																}

																}else {
															?>
															<div class="p-20">
																<h4>All Post Selected</h4>
															</div>
															<?php
															}
														?>
													</div>
												</div>
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
				<script>
					$('#accept').click(function() {
						if ($('#submitbtn').is(':disabled')) {
							$('#submitbtn').removeAttr('disabled');
							} else {
							$('#submitbtn').attr('disabled', 'disabled');
						}
					});
				</script>
			</body>
		</html>
		<?php
		}else
		header('location:../index.php?deactivate');
?>
