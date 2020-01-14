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
			<title>Magazine</title>
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
						<h3 class="text-primary">Magazine - Category</h3> </div>
						<div class="col-md-7 align-self-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
								<li class="breadcrumb-item active">Magazine</li>
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
											if(isset($_POST['add'])){	
												$category_name=$_POST['category_name'];
												$start_date=$_POST['start_date'];
												$closure_date=$_POST['closure_date'];
												$final_closure_date=$_POST['final_closure_date'];
												//echo $final_closure_date;exit;
												
												$duplicate=mysqli_query($con,"select * from category where category_name='$category_name'");
												if (mysqli_num_rows($duplicate)>0)
												{
													echo "<div class='alert alert-danger'>
													<strong>Sorry User! Department Name already exists..!</strong> 
													</div>";
												}
												else
												{
													$query="INSERT INTO category (category_name,start_date,closure_date,final_closure_date) VALUES ('$category_name','$start_date','$closure_date','$final_closure_date');";
													if(mysqli_query($con,$query)){
														echo "<div class='alert alert-success'>
														<strong>Magazine Category Added Sucessfully</strong> 
														</div>";
														
													}
												}
											}
										?>
										<form autocomplete="off" method="post" action="magazine.php">				  
											<div class="form-group row">
												<label for="category_name" class="col-sm-4 col-form-label">Category Name</label>
												<div class="col-sm-8" style="fload:right">
													<input type="text" name="category_name" class="form-control" required id="category_name" placeholder="Please Type Magazine Category">
													
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="from" class="col-sm-12 col-form-label">Start Date</label>
													<input  type="text" id="from" name="start_date" class="form-control col-sm-12" required>
												</div>
												<div class="col-sm-4">
													<label for="to" class="col-sm-12 col-form-label">Closure Date</label>
													<input type="text" id="to" name="closure_date" onclick="go()" class="form-control col-sm-12 " required>
												</div>
												<div class="col-sm-4">
													<label for="to" class="col-sm-12 col-form-label">Final Closure Date</label>
													<input type="text" id="last" name="final_closure_date" class="form-control col-sm-12" required>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-9"></div>
												<div class="col-sm-3" >
													<input type="submit" name="add" value="Add Category"  class="btn btn-block btn-rounded btn-info" style="float:right">
												</div>
											</div>
										</form>
										
									</div>
								</div>
							</div>
							<!-- /# column -->
							<div class="col-lg-12">
								<div class="card">
									<div class="card-title">
										<h4>All Magazine Category List</h4>
										
									</div>
									<div class="card-body">
										<?php if(isset($_GET['reject'])){
											echo "<div class='alert alert-danger'>
											<strong>Sorry User! You Cann't Delete This Category...!</strong> 
											</div>";
										}
										if(isset($_GET['done'])){
											echo "<div class='alert alert-success'>
											<strong>Magazine Category Delete Sucessfully</strong> 
											</div>";
										}
										if(isset($_GET['update'])){
											echo "<div class='alert alert-warning'>
											<strong>Magazine Category Update Sucessfully</strong> 
											</div>";
										}
										?>
										<div class="table-responsive m-t-40">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Category Name</th>
														<th>Start Date</th>
														<th>Closure Date</th>
														<th>Final Closure Date</th>
														<th colspan="2"><center>Action</center> </th>
														
													</tr>
												</thead>
												<?php
													$query="select * from category ";
													//$query="SELECT * FROM  `category` INNER JOIN users on idea.idea_author_id=users.uid";
													$result=mysqli_query($con,$query);
													if(mysqli_num_rows($result)>0){
														while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
														?>
														<tbody>
															<tr>
																<th><?php echo $row["category_name"]; ?></th>
																<th><?php echo $row["start_date"]; ?></th>
																<th><?php echo $row["closure_date"]; ?></th>
																<th><?php echo $row["final_closure_date"]; ?></th>
																<th><a class="btn btn-mg btn-warning" href="edit_magaCate.php?c_id=<?php echo $row["c_id"]; ?>"><i class="fa fa-edit"></i></a></th>
																<th><a class="btn btn-mg btn-danger" href="delete_magaCate.php?c_id=<?php echo $row["c_id"]; ?>&&category_name=<?php echo $row["category_name"]; ?>"><i class="fa fa-trash-o"></i></a></th>
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
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script>
				$( function() {
					var dateFormat = "mm/dd/yy",
					from = $( "#from" )
					.datepicker({
						defaultDate: "+1w",
						changeMonth: true,
						numberOfMonths: 2
					})
					.on( "change", function() {
						to.datepicker( "option", "minDate", getDate( this ) );
						
					}),
					
					to = $( "#to" ).datepicker({
						defaultDate: "+1w",
						changeMonth: true,
						numberOfMonths: 2
					})
					.on( "change", function() {
						from.datepicker( "option", "maxDate", getDate( this ) );
						last.datepicker( "option", "minDate", getDate( this ) );
					}),
					last = $( "#last" ).datepicker({
						defaultDate: "+1w",
						changeMonth: true,
						numberOfMonths: 2
					})
					.on( "change", function() {
						to.datepicker( "option", "maxDate", getDate( this ) );
					})
					
					function getDate( element ) {
						var date;
						try {
							date = $.datepicker.parseDate( dateFormat, element.value );
							} catch( error ) {
							date = null;
						}
						
						return date;
					}
				} );
				
				
				
				
				
			</script>
			
			
		</body>
		
	</html>
	<?php
		
	}else 
	header('location:../index.php?deactivate');
?>																		