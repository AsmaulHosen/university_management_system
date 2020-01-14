<?php
	session_start();
	date_default_timezone_set('Asia/Dhaka');
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){

		//session_start();
		include("../../db.php");

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
			<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
			<title>Home</title>
			<!-- Bootstrap Core CSS -->
			<link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
			<!-- Custom CSS -->
			<link href="../css/helper.css" rel="stylesheet">
			<link href="../css/style.css" rel="stylesheet">
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
								<b><img src="../images/logo.png" alt="homepage" class="dark-logo" /></b>
								<!--End Logo icon -->
								<!-- Logo text -->
								<span><img src="../images/logo-text.png" alt="homepage" class="dark-logo" /></span>
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

									</a>
									<div class="dropdown-menu dropdown-menu-right animated zoomIn">
										<ul class="dropdown-user">

											<li><a href="../../logout.php"><i class="ti-power-off"></i> Logout</a></li>

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

								<?php
									if ($_SESSION['post']=='Admin'){
									?>
									<li><a href="index.php"><i class="fa fa-home"></i><span class="hide-menu">Home </span> </a></li>
									<li><a href="magazine.php"><i class="fa fa-newspaper-o "></i><span class="hide-menu">Magazine </span> </a></li>
									<?php
									}
								?>
								<?php
									if ($_SESSION['post']=='MC'){
									?>
									<li><a href="mc_index.php"><i class="fa fa-home"></i><span class="hide-menu">Home </span> </a></li>
									<li><a href="magazine_list.php"><i class="fa fa-newspaper-o "></i><span class="hide-menu">Magazine List</span> </a></li>
									<li><a href="chat.php"><i class="fa fa-envelope-o "></i><span class="hide-menu">Message</span> </a></li>
									<?php
									}
								?>
								<?php
									if ($_SESSION['post']=='MM'){
									?>
									<li><a href="mm_index.php"><i class="fa fa-home"></i><span class="hide-menu">Home </span> </a></li>
									<li><a href="magazine_list_selected.php"><i class="fa fa-newspaper-o "></i><span class="hide-menu">Selected Magazine </span> </a></li>
									<?php
									}
								?>
								<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu">Repots <span class="label label-rouded label-primary pull-right">3</span></span></a>
									<ul aria-expanded="false" class="collapse">
										<li><a href="graph_magazine.php">Graph of Magazine</a></li>
										<li><a href="graph_comment.php">Graph of Comments</a></li>
										<li><a href="numerical_data.php">Numerical Data</a></li>
									</ul>
								</li>

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
							<h3 class="text-primary">Home</h3>
						</div>
						<div class="col-md-6 ">
							<?php if(isset($_GET['done'])){
								echo "<div class='alert alert-danger alert-dismissible fade show'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<strong>Welcome!</strong> You are login as Marketing Manager .
								</div>";
							}?>
						</div>
						<div class="col-md-3 align-self-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

							</ol>
						</div>
					</div>
					<!-- End Bread crumb -->

					<!-- Container fluid  -->
					<div class="container-fluid">
						<!-- Start Page Content -->
						<div class="row">
							<div class="col-lg-7">
								<?php
									$query="SELECT p.id as id,category_name,magazine_title,magazine_desc,CONCAT(u.first_name, ' ' ,u.last_name) as Name ,department,date,post_type,post_status,file_input,post_approved,date,time
									from post as p,users as u
									where p.post_author_id=u.uid and post_status='Select' and post_approved='Approved' ";

									$result=mysqli_query($con,$query);
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

										?>
										<div class="card">
											<div class="card-title">

												<h5><strong>Magazine Title : </strong><?php echo $row["magazine_title"]; ?><i style="float: right">Time : <?php echo $row["time"]; ?></i></h5>
												<h6><strong>Category Name: </strong><?php echo $row["category_name"]; ?><i  style="float: right">Date : <?php echo $row["date"]; ?></i> </h6>
												<hr/>
											</div>
											<div class="card-body">
												<button class="btn btn-sm btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $row["time"]; ?>" aria-expanded="false" aria-controls="collapseExample">
													More Details <i class="fa fa-hand-o-down "></i>
												</button>
												<button class="btn btn-sm btn-success" type="button" data-toggle="collapse" data-target="#collapseExampl<?php echo $row["time"]; ?>" aria-expanded="false" aria-controls="collapseExample" style="float:right">
													See More Comments <i class="fa fa-hand-o-down "></i>
												</button>
												<div class="collapse" id="collapseExample<?php echo $row["time"]; ?>">
													<div class="card card-body">
														<p><i>Magazine Description : <?php echo $row["magazine_desc"]; ?></i></p>
														<h6><strong>Department Name: </strong><?php echo $row["department"]; ?>
															<p style="float:right"><strong>Student Name: </strong><?php if($row['post_type'] == "Public"){
																echo $row["Name"];
																}else if($row['post_type'] == "Anonymous"){
																echo "Annonymus";
															}?></p></h6>
															<label class='btn btn-mg btn-block btn-info' style='color:white'>
																<?php if($row['file_input']!=""){
																	echo "
																	<div class=''><a target='_blank' style=' text-decoration: none;color:white' href='../".$row['file_input']."'>
																	<i class='fa fa-download '></i> Attachment</a>
																	</div>";
																	}else{
																	echo "No Attachment";
																}?>
															</label>
													</div>
												</div>
												<div class="collapse" id="collapseExampl<?php echo $row["time"]; ?>">
													<?php
														$a=$row["id"];
														$query1="SELECT * FROM comment where post_id='$a'";

														$result1=mysqli_query($con,$query1);

														if(mysqli_num_rows($result)>0){
															while($row1=mysqli_fetch_array($result1, MYSQLI_ASSOC)){

															?>
															<div class="card card-body">
																<h6><B>Author Type : </B><?php echo $row1["author_type"]; ?> <i style="float: right">Time : <?php echo $row1["time"]; ?></i></h6>
																<p><b>Comment : </b><?php echo $row1["comment_body"]; ?> </p>
															</div>

															<?php
															}
														}
													?>
												</div>
											</div>
											<?php
												$date1=date_create($row['date']);
												$date2=date_create(date('Y-m-d'));
												$diff=date_diff($date1,$date2);
												$d = $diff->format("%R%a days");
												if ($d<14){
												?>
												<div class="card-footer">

													<form  method="POST" action="comment.php" id="validateForm">
														<input type="hidden" value = "<?=$row['id']?>" name="id">
														<div class="row ">
															<div class="col-sm-10 form-group">
																<input type="text" class="form-control"  name="comment_body" placeholder="Your comments.." >
																
															</div>
															<div class="col-sm-2" >
																<input type="submit" name="submit"  value="Add"  class="btn btn-block btn-rounded btn-info" >
															</div>
														</div>
													</form>
												</div>
												<?php }else{ ?>

												<div class="card-content">
													<div class="alert alert-danger">
														Sorry User..Comment Section Closed
													</div>
												</div>
											<?php }  ?>

										</div>
										<?php
										}
									}


								?>
							</div>
							<div class="col-lg-5">
								<div class="card">
									<div class="card-title">
										<button class="btn btn-outline-success btn-block  btn-rounded" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
											<i class="fa fa-newspaper-o"></i> Recent Post
										</button>
										<button class="btn btn-outline-info  btn-block btn-rounded" type="button" data-toggle="collapse" data-target="#collapseExampl" aria-expanded="false" aria-controls="collapseExample">
											<i class="fa fa-comments-o"></i> Recent Comments
										</button>

									</div>
									<div class="card-body">
										<div class="collapse" id="collapseExample">
											<div class="card card-body ">
												<table class="table-responsive  display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No.</th>
															<th>Post Title</th>
															<th>Participate Name</th>
															<th>Department</th>
														</tr>
													</thead>
													<?php
														$query="SELECT * FROM  post INNER JOIN category on post.category_name=category.category_name INNER JOIN users on post.post_author_id=users.uid ORDER BY id desc limit 3 ";
														$result=mysqli_query($con,$query);
														$counter = 0;
														if(mysqli_num_rows($result)>0){
															while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
															?>
															<tbody>
																<tr>
																	<th><?php echo ++$counter ;?></th>
																	<th><?php echo $row["magazine_title"]; ?></th>
																	<th><?php echo $row["first_name"]; ?></th>
																	<th><?php echo $row["department"]; ?></th>
																</tr>
															</tbody>
															<?php
															}
														}
													?>
												</table>
											</div>
										</div>
										<div class="collapse" id="collapseExampl">
											<div class="card card-body">
												<table class="table-responsive table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No.</th>
															<th>Post Desecription</th>
															<th>Comment</th>
															<th>Participate Name</th>
														</tr>
													</thead>
													<?php
														$query="SELECT * from comment INNER JOIN users on comment.author_id=users.uid INNER JOIN post on comment.post_id=post.id ORDER BY comment_id DESC limit 3";
														$result=mysqli_query($con,$query);
														$counter = 0;
														if(mysqli_num_rows($result)>0){
															while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
															?>
															<tbody>
																<tr>
																	<th><?php echo ++$counter ;?></th>
																	<th><?php echo $row["magazine_desc"]; ?></th>
																	<th><?php echo $row["comment_body"]; ?></th>
																	<th><?php echo $row["first_name"]; ?></th>
																</tr>
															</tbody>
															<?php
															}
														}
													?>
												</table>
											</div>
										</div>
									</div>
								</div>

							</div>

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
			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
			<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
			<script>
				
				$('#validateForm').bootstrapValidator({
					feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						comment_body: {
							validators: {
								notEmpty: {
									message: 'Please Something input in Comment Body'
								}
							}
						},
					}
				});
				
			</script>
		</body>
			<!-- All Jquery -->
			<script src="../js/lib/jquery/jquery.min.js"></script>
			<!-- Bootstrap tether Core JavaScript -->
			<script src="../js/lib/bootstrap/js/popper.min.js"></script>
			<script src="../js/lib/bootstrap/js/bootstrap.min.js"></script>
			<!-- slimscrollbar scrollbar JavaScript -->
			<script src="../js/jquery.slimscroll.js"></script>
			<!--Menu sidebar -->
			<script src="../js/sidebarmenu.js"></script>
			<!--stickey kit -->
			<script src="../js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
			<!--Custom JavaScript -->
			<script src="../js/scripts.js"></script>
			

	</html>
	<?php

	}else
	header('location:../index.php?deactivate');
?>
