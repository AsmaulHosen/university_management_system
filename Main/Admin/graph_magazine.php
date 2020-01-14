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
			<title>Repots</title>
			<!-- Bootstrap Core CSS -->
			<link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
			<!-- Custom CSS -->
			<link href="../css/helper.css" rel="stylesheet">
			<link href="../css/style.css" rel="stylesheet">
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="/resources/demos/style.css">
			
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				
				function drawChart() {
					
					var data = google.visualization.arrayToDataTable([
					['Department','Number'],
					<?php
						$query="SELECT count(*) as number,department FROM post WHERE post_approved='Approved' GROUP BY department";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
							echo "['".$row["department"]."',".$row["number"]."],";
						}
					?>
					]);
					var options = {
						'title':'Published Post',
						'legend':'right',
						'is3D':true,
						
					};
					
					var chart = new google.visualization.PieChart(document.getElementById('contribution_approved'));
					
					chart.draw(data, options);
				}
			</script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				
				function drawChart() {
					
					var data = google.visualization.arrayToDataTable([
					['Department','Number'],
					<?php
						$query="SELECT count(*) as number,department FROM post WHERE post_approved='Not Approved' AND post_status='Select' GROUP BY department";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
							echo "['".$row["department"]."',".$row["number"]."],";
						}
					?>
					]);
					var options = {
						'title':'Selected Post',
						'legend':'right',
						'is3D':true,
						
					};
					
					var chart = new google.visualization.PieChart(document.getElementById('contribution_selected'));
					
					chart.draw(data, options);
				}
			</script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				
				function drawChart() {
					
					var data = google.visualization.arrayToDataTable([
					['Department','Number'],
					<?php
						$query="SELECT count(*) as number,department FROM post WHERE post_status='Pending' GROUP BY department";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
							echo "['".$row["department"]."',".$row["number"]."],";
						}
					?>
					]);
					var options = {
						'title':'Pending Post',
						'legend':'right',
						'is3D':true,
						
					};
					
					var chart = new google.visualization.PieChart(document.getElementById('contribution_pending'));
					
					chart.draw(data, options);
				}
			</script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				
				function drawChart() {
					
					var data = google.visualization.arrayToDataTable([
					['Department','Post'],
					
					<?php
						$query="SELECT count(post_author_id) as number,department from 
						(SELECT post_author_id,department from post inner join users on post.post_author_id=users.uid inner join student on users.uid=student.std_id  group by post_author_id) AS SUBQUERY 
						GROUP BY department";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
							echo "['".$row["department"]."',".$row["number"]."],";
						}
					?>
					]);
					var options = {
					
						'legend':'left',
						'is3D':true,
						
					};
					
					var chart = new google.visualization.PieChart(document.getElementById('contributior'));
					
					chart.draw(data, options);
				}
			</script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				
				function drawChart() {
					
					var data = google.visualization.arrayToDataTable([
					['Post Type','Number'],
					<?php
						$query="SELECT count(post_type) as number,post_type FROM post GROUP BY post_type";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
							echo "['".$row["post_type"]."',".$row["number"]."],";
						}
					?>
					]);
					var options = {
						'legend':'left',
						'is3D':true,
						
					};
					
					var chart = new google.visualization.PieChart(document.getElementById('post_type'));
					
					chart.draw(data, options);
				}
			</script>
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
								<?php
									if ($_SESSION['post']=='Guest'){
									?>
									<li><a href="guest_index.php"><i class="fa fa-home"></i><span class="hide-menu">Home </span> </a></li>						
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
						<h3 class="text-primary">Repots - Graph of Magazine</h3> </div>
						<div class="col-md-7 align-self-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
								<li class="breadcrumb-item active">Repots</li>
							</ol>
						</div>
					</div>
					<!-- End Bread crumb -->
					<!-- Container fluid  -->
					<div class="container-fluid">
					<h4>Department Wise Overwall Magazine Contribution</h4>
						<!-- Start Page Content -->
						<div class="row">
						
							<div class="col-lg-4">
								<div class="card">
									<div class="card-title">
										
									</div>
									<div class="card-body">
										<div id="contribution_approved" ></div>
									</div>
								</div>
								
							</div>
							<!-- /# column -->
							<div class="col-lg-4">
								<div class="card">
									<div class="card-title">
										
									</div>
									<div class="card-body">
										
										<div id="contribution_selected" ></div>
									</div>
								</div>
								
							</div>
							<!-- /# column -->
							<div class="col-lg-4">
								<div class="card">
									<div class="card-title">
									
									</div>
									<div class="card-body">
										<div id="contribution_pending" ></div>
									</div>
								</div>
								
							</div>
							<!-- /# column -->
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="card">
									<div class="card-title">
										<h4 class="card-title">Department Wise Magazine Contributior</h4>
									</div>
									<div class="card-body">
										<div id="contributior" ></div>
									</div>
								</div>
							</div>
							<!-- /# column -->
							<div class="col-lg-6">
								<div class="card">
									<div class="card-title">
										<h4 class="card-title">Post Type Contributior</h4>
									</div>
									<div class="card-body">
										<div id="post_type" ></div>
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