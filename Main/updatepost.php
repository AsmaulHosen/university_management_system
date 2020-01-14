<?php
	session_start();
	date_default_timezone_set('Asia/Dhaka');
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){
		
		//session_start();
		include("../db.php");
		
		$result = mysqli_query($con,"SELECT * FROM post WHERE id='" . $_GET['id'] . "'");
		$row= mysqli_fetch_array($result);
		define('SITE_ROOT',dirname(__FILE__));
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$filesToZip=array();
			foreach($_FILES['file']['tmp_name'] as $key => $tmp_name)
			{
				$name=basename($_FILES['file']['name'] [$key]);
				$uploads_dir=SITE_ROOT.'/references/'.$name;
				array_push($filesToZip,$name);
				move_uploaded_file($_FILES['file']['tmp_name'][$key],"$uploads_dir");
			}
			$zip=new ZipArchive();
			$zip_Name=time().'.zip';
			if($zip->open($zip_Name,ZipArchive::CREATE)==TRUE){
				foreach($filesToZip as $file){
					
					$zip->addFile('references/'.$file,$file);
				}
				$zip->close();
				
			}
			
			$magazine_title=$_POST['magazine_title'];
			$magazine_desc=$_POST['magazine_desc'];
			$post_type=$_POST['post_type'];
			$id = $_POST['id'];
			
			$source_file = $zip_Name;
			$destination_path = 'zip_file/';
			rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME));
			
			$total = count(array_filter($_FILES['file']['name']));
		
		$ftotal=$total+1;
		
		
		if($total<1) {
			//echo "Insert without attachment<br>";
			$query="UPDATE post SET `magazine_title`='$magazine_title',`magazine_desc`='$magazine_desc',`post_type`='$post_type' WHERE id='$id'";
			//echo $query;exit;
			$result=mysqli_query($con,$query);
		}
		else{
			//echo "Insert with attachment<br>";
			$query="UPDATE post SET `magazine_title`='$magazine_title',`magazine_desc`='$magazine_desc',`post_type`='$post_type',`file_input`='zip_file/$source_file'WHERE id='$id'";
			//echo $query;exit;
			$result=mysqli_query($con,$query);
		}
		header('location:post.php?update');
		}
		
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
			<title>Time Line</title>
			<!-- Bootstrap Core CSS -->
			<link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
			<!-- Custom CSS -->
			<link href="css/helper.css" rel="stylesheet">
			<link href="css/style.css" rel="stylesheet">
			<style>
				.has-error .help-block {
				color: red;
			}
			</style>
			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
			<!--[if lt IE 9]>
			<script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
			<script>
			function checkFile(sender){
			var ff = document.getElementById("inputFile");
			var validExtension = ".pdf";
			var validExtension1 = ".doc";
			var validExtension2 = ".docx";
			var fileExtension = sender.value;
			fileExtension = fileExtension.substring(fileExtension.lastIndexOf('.'));
			if ((fileExtension != validExtension) && (fileExtension != validExtension1) && (fileExtension != validExtension2)){
			swal({
			title: "Invalid File! " ,
			text: "Valid File is Only pdf, doc, docx  Type.",
			type: "error",
			
			showConfirmButton: true,
			},
			window.load = function(){
			window.location='http://localhost/EWSD/Main/timeline.php';
			});
			
			return false;
			}
			else{
			
			return true;
			}
			}
			
			function checkImage(sender){
			var ff = document.getElementById("inputImage");
			var validExtension = ".jpg";
			var validExtension1 = ".jpeg";
			var validExtension2 = ".png";
			var fileExtension = sender.value;
			fileExtension = fileExtension.substring(fileExtension.lastIndexOf('.'));
			if ((fileExtension != validExtension) && (fileExtension != validExtension1) && (fileExtension != validExtension2)){
			swal({
			title: "Invalid File! " ,
			text: "Valid File is Only jpg, jpeg, png  Type.",
			type: "error",
			
			showConfirmButton: true,
			},
			window.load = function(){
			window.location='http://localhost/EWSD/Main/updatepost.php';
			});
			
			return false;
			}
			else{
			
			return true;
			}
			}
			
			
			</script>
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
			<h3 class="text-primary">Timeline</h3> </div>
			<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
			<li class="breadcrumb-item active">Timeline</li>
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
			<h4>Update Post</h4>
			
			</div>
			
			<div class="card-body">
			<form  method="post" id="validateForm" enctype="multipart/form-data">
			<div class="form-group row">
			<label for="magazine_title" class="col-sm-2 col-form-label">Magazine Title</label>
			<input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
			<div class="col-sm-5" style="fload:right">
			<input type="text" name="magazine_title" class="form-control"  id="magazine_title" value="<?php echo $row['magazine_title']; ?>">
			</div>
			<label for="category_name" class="col-sm-2 col-form-label">Magazine Category</label>
			<div class="col-sm-3" style="fload:right">
			<input type="text" name="category_name" class="form-control"  id="category_name" value="<?php echo $row['category_name']; ?>" disabled>
			</div>
			</div>
			<div class="form-group row">
			<label for="magazine_desc" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10" style="fload:right">
			<input type="text" name="magazine_desc" class="form-control"  id="magazine_desc" value="<?php echo $row['magazine_desc']; ?>">
			</div>
			</div>
			<div class="form-group row">
			<div class="col-sm-12" >
			<input id="accept" name="accept" type="checkbox" value="1" /><strong>Do You want to file upload again </strong>
			</div>
			</div>
			<div class="form-group row" id="fileinput" style="display:none">
			<label for="magazine_desc" class="col-sm-2 col-form-label">Select File</label>
			<input type="file" id="inputFile" onchange="checkFile(this);" name="file[]"  class="form-control-file col-sm-4">
			<label for="magazine_desc" class="col-sm-2 col-form-label">Select Image</label>
			<input type="file" id="inputImage" onchange="checkImage(this);" name="file[]" class="form-control-file col-sm-4">
			</div>
			<div class="form-group row">
			<label for="post_type" class="col-sm-2 col-form-label">Post Type</label>
			<div class="col-sm-4 col-form-label" style="fload:right">
			<input type="radio" name="post_type" value="Public" id="Public" <?php if($row['post_type']=='Public'){?> checked="" <?php }?>/>Public
			<input type="radio" name="post_type" value="Anonymous" id="Anonymous" <?php if($row['post_type']=='Anonymous') {?> checked="" <?php }?>/>Anonymous ?
			</div>
			
			<div class="col-sm-4  " >
			<input id="submitbtn" name="post" type="submit" class="btn btn-block btn-success" value="Update" />
			</div>
			</div>
			</form>
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
			magazine_title: {
			validators: {
			stringLength: {
			min: 5,
			message: 'Please Enter Magazine Title with minimum 3 letters length'
			},
			notEmpty: {
			message: 'Please Enter Magazine Title'
			}
			}
			},
			category_name: {
			validators: {
			notEmpty: {
			message: 'Please Enter Magazine Category Name'
			}
			}
			},
			magazine_desc: {
			validators: {
			notEmpty: {
			message: 'Please Enter Magazine Description'
			}
			}
			},
			}
			});
			
			function documentFilter(trigger, target) {
			var $target = $(target);
			
			$(trigger).change(function() {
			$target.toggle(this.checked);
			});
			}
			documentFilter("#accept", "#fileinput");
			
			</script>
			</body>
			</html>
			<?php
			}else
			header('location:../index.php?deactivate');
			?>
						