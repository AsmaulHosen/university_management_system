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
			<title>Selected Magazine List</title>
			<!-- Bootstrap Core CSS -->
			<link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
			<!-- Custom CSS -->
			<link href="../css/helper.css" rel="stylesheet">
			<link href="../css/style.css" rel="stylesheet">
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="/resources/demos/style.css">
			
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
						<div class="col-md-5 align-self-center">
						<h3 class="text-primary">Magazine - Selected</h3> </div>
						<div class="col-md-7 align-self-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
								<li class="breadcrumb-item active">Selected</li>
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
										<h4>Selected Magazine List</h4>
										<?php if(isset($_GET['select'])){
											
											echo "<div class='alert alert-success'>
											<strong>Post Published Sucessfully</strong> 
											</div>";
										}
										if(isset($_GET['reject'])){
											
											echo "<div class='alert alert-danger'>
											Soory User...Not Selected
											</div>";
										}
										
										
										?>
									</div>
									<div class="card-body">
										<h5>Not Published List</h5>
										<div class="table-responsive m-t-40">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Category Name</th>
														<th>Title</th>
														<th>Dese</th>
														<th>Student Name</th>
														<th>Department</th>
														<th>Date</th>
														<th>Post Type</th>
														
														<th>Post Status</th>
														<th>Post Approved</th>
														
														
													</tr>
												</thead>
												<?php
													$query="SELECT p.id as id,category_name,magazine_title,magazine_desc,CONCAT(u.first_name, ' ' ,u.last_name) as Name ,department,date,post_type,post_status,file_input,post_approved
													from post as p,users as u
													where p.post_author_id=u.uid
													and post_status='Select'
													and post_approved='Not Approved'
													";
													
													$result=mysqli_query($con,$query);
													if(mysqli_num_rows($result)>0){
														while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
														?>
														<tbody>
															<tr>
																<th><?php echo $row["category_name"]; ?></th>
																<th><?php echo $row["magazine_title"]; ?></th>
																<th><?php echo $row["magazine_desc"]; ?></th>
																<th><?php echo $row["Name"]; ?></th>
																<th><?php echo $row["department"]; ?></th>
																<th><?php echo $row["date"]; ?></th>
																<th><?php echo $row["post_type"]; ?></th>
																
																<th><?php echo $row["post_status"]; ?></th>
																<th><a class="btn btn-sm btn-warning" href="published_post.php?id=<?php echo $row["id"]; ?>">
																<i class="fa fa-edit"></i>&nbsp; <?php echo $row["post_approved"]; ?> </a>
																</th>
																
																
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
							<!-- /# column -->
							
							<div class="col-lg-12">
								<div class="card">
									<div class="card-title">
										<h4>Selected Magazine List</h4>
										<?php if(isset($_GET['select'])){
											
											echo "<div class='alert alert-success'>
											<strong>Post Selected Sucessfully</strong> 
											</div>";
										}
										if(isset($_GET['reject'])){
											
											echo "<div class='alert alert-danger'>
											Soory User...Not Selected
											</div>";
										}
										
										
										?>
									</div>
									<div class="card-body">
										<h5>Published List</h5>
										<div class="table-responsive m-t-40">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Category Name</th>
														<th>Title</th>
														<th>Dese</th>
														<th>Student Name</th>
														<th>Department</th>
														<th>Date</th>
														<th>Post Type</th>
														<th>File</th>
														<th>Post Status</th>
														<th>Post Approved</th>
														
														
													</tr>
												</thead>
												<?php
													$query="SELECT p.id as id,category_name,magazine_title,magazine_desc,CONCAT(u.first_name, ' ' ,u.last_name) as Name ,department,date,post_type,post_status,file_input,post_approved
													from post as p,users as u
													where p.post_author_id=u.uid
													and post_status='Select'
													and post_approved='Approved'
													";
													
													$result=mysqli_query($con,$query);
													if(mysqli_num_rows($result)>0){
														while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
														?>
														<tbody>
															<tr>
																<th><?php echo $row["category_name"]; ?></th>
																<th><?php echo $row["magazine_title"]; ?></th>
																<th><?php echo $row["magazine_desc"]; ?></th>
																<th><?php echo $row["Name"]; ?></th>
																<th><?php echo $row["department"]; ?></th>
																<th><?php echo $row["date"]; ?></th>
																<th><?php echo $row["post_type"]; ?></th>
																<th><?php
																	$che=$row["category_name"];
																	$query_check= mysqli_query($con,"SELECT final_closure_date FROM category WHERE category_name='$che'");
																	$rows= mysqli_fetch_array($query_check);
																	$date1=date_create($rows['final_closure_date']); 
																	$date2=date_create(date('m/d/Y'));
																	if ($date1<$date2){
																		if($row['file_input']!=""){
																			echo " 
																			<div class=''>
																			<label class='btn btn-sm btn-info' style='color:white'>
																			<a target='_blank' style=' text-decoration: none;color:white' href='../".$row['file_input']."'> 
																			<i class='fa fa-download '></i> File</a> 
																			</label>
																			</div>";
																			}else{
																			echo "No Attachment";
																		}}else{
																	?>
																	<i>Final Closer Date Not Finished</i>
																	<?php
																	}
																	
																?></th>
																<th><?php echo $row["post_status"]; ?></th>
																<th><Strong><?php echo $row["post_approved"]; ?></strong>
																</th>
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
			
			
			
			
		</body>
		
	</html>
	<?php
		
	}else 
	header('location:../index.php?deactivate');
?>						

