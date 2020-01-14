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
			<title>Chat</title>
			<!-- Bootstrap Core CSS -->
			<link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
			<!-- Custom CSS -->
			<link href="../css/helper.css" rel="stylesheet">
			<link href="../css/style.css" rel="stylesheet">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="chat.css">
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			
			<style>
				.dot {
				height: 25px;
				width: 25px;
				border-radius: 50%;
				display: inline-block;
				}
			</style>
			<script>
				
				var id ="";
				function contact(){
					//alert('cd');
					var div = document.getElementById("chat_name");
					var d="";
					$.ajax({
						type:'POST',
						url:"ajax_query.php",
						data:{"contact":1},
						dataType:"json",
						success : function(response){
							for(var i=0;i<response.length ;i++){
								var a = "";
								if((response[i].last_login_activity > response[i].last_logout_activity)){
									a += "<div class='chat_img'><span class='dot' style='background-color:#33FF39;'></span></div>"
									} else {
									a += "<div class='chat_img'><span class='dot' style='background-color:#FF5833;'></span></div>"
								}
								var b = "";
								if((response[i].last_login_activity > response[i].last_logout_activity)){
									b += response[i].last_login_activity;
									} else {
									b += response[i].last_logout_activity;
								}
								
								
								d += "<div class='chat_list active_chat'>"+
								"<div class='chat_people'>"+a+
								"<div class='chat_ib'>"+
								"<h5><a  onclick='chat("+response[i].uid+")'><b>"+response[i].first_name+"</b><span class='chat_date'>"+b+"</span></a></h5>"+
								"</div>"+
								"</div>"+
								"</div>";
								
								
							}
							
							div.innerHTML = d;
							
						}
					});
				}
				window.onload=contact;
				function chat(a){
					document.getElementById("msg").value='';
					var div = document.getElementById("chat_history");
					var d="";
					var f="";
					$.ajax({
						type:'POST',
						url:"ajax_query.php",
						data:{chat:a},
						dataType:"json",
						success : function(response){	
							
							for(var i=0;i<response.length ;i++){
								if (response[i].to_user_id!==a){
									d = "<div class='incoming_msg'>"+
									"<div class='incoming_msg_img'><img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'></div>"+
									"<div class='received_msg'>"+
									"<div class='received_withd_msg'>"+
									"<p>"+response[i].chat_message+"</p>"+
									"<span class='time_date'>"+response[i].timestamp+"</span></div>"+
									"</div>"+
									"</div>";
								}
								if(response[i].to_user_id == a){
									d = "<div class='outgoing_msg'>"+
									"<div class='sent_msg'>"+
									"<p>"+response[i].chat_message+"</p>"+
									"<span class='time_date'> "+response[i].timestamp+"</span> </div>"+
									"</div>";
									
								}
								f += d;
								
								div.innerHTML = f;
							}
						},
						error: function(){
							div.innerHTML = '<h4>Start conversation</h4>';
						}
					});
					id = a;
					send_msg();
					
				}
				
				
				function send_msg(){
					var msg = document.getElementById("msg").value;
					
					if (msg != ''){
						$.ajax({
							type:'POST',
							url:"ajax_query.php",
							data:{r_id:id,"message":msg},
							success : function(){
								chat(id);	
							}
							
						});
						
						
					}
					
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
							<h3 class="text-primary">Home</h3> 
						</div>
						
						<div class="col-md-7 align-self-center">
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
							<div class="col-lg-12">
							<div class="card">
							<div class="card-title">
							<h4>Profile | Click to Start Conversation</h4>
							</div>
							<div class="card-body">
							<div class="row">
							<div class="col-lg-4">
							<div class="headind_srch">
							<div class="recent_heading">
							
							</div>
							<div class="srch_bar"></div>
							</div>
							
							<div id="chat_name" class="inbox_chat scroll"></div>
							</div>
							<div class="col-lg-8">
							<div id = "chat_history" class="msg_history"></div>
							<div id="chat_insertion" class="type_msg">
							<form method="POST" id = "form" >
							<div class="input_msg_write">
							<input type="text" id = "msg" class="write_msg" placeholder="Type a message" required/>
							<button class="msg_send_btn" onclick="send_msg()" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							</div>
							</form>
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