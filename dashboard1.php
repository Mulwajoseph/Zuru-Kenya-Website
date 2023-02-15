<?php
session_start();
error_reporting(0);
include("db_connect.php");
$active_user=$_SESSION["active_user"];
if($active_user==""){
	echo'<script>alert("you need to login first");window.location.assign("http://localhost/itg/login.html");</script>';
}


$sql="SELECT * FROM clients WHERE email='$active_user'";
$select=mysqli_query($connect,$sql);
$count=mysqli_num_rows($select);
$row2=mysqli_fetch_assoc($select);

$sql5="SELECT * FROM site ";
$select5=mysqli_query($connect,$sql5);
$query5=mysqli_num_rows($select5);
$row5=mysqli_fetch_assoc($select5);
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Intelligent Tourist Guide</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css1/css/css/fontawesome-all.css">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		#profile{
			height: 105px !important;
			width: 105px !important;
			float: left !important;
			
		}
		#userprofile{
			background-color:none rgb(25,25,112,.8) none rgb(25,25,112,.8);
            background-color:rgb(25,25,112,);

		}
		#panel-footer{
			overflow-y: scroll; height: 405px;
			font-size: 15px
		}
		#main{
			background-image: url(pics/99.jpg);
		}
		#panel{
			background-image:url(pics/99.jpg) ;
			background-position: 0px 0px;
			background-repeat: no-repeat;
			background-size:100% 100%;
			position :relative;

		}
		#pagee{
			background-color: rgb(25,25,112,.8);
		}
		#form1{
			border-style:solid !important;
			border-width: 3px !important;
			border-color:white !important;
			border-radius: 23px !important;
		}
	</style>

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<p class="site">www.yoursitehere.com</p>
						</div>
						<div class="col-xs-8 text-right">
							<p class="num">Call: +01-123-456</p>
							<ul class="colorlib-social">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.html">ITG</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="public.php">Public Post</a></li>
								<li><a href="">LogOut</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li id="pagee" style="background-image: url(pics/99.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid" id="pagee">
			   			<div class="row">
				   			<div class="w3-content">
				   				<br><br>
				   				<div class="slider-text-inner text-center" id="userprofile">
				   					<div class="text-center">
				   					<img src="pics/99.jpg" class="w3-card-4 img-circle" alt="profile image" id="profile">
				   				    </div>
				   					<h2 style="color: white !important;"><?php echo $row2["surname"];?>!&nbspWelcome to Your ITG page</h2>
				   				</div>
				   				<div class="col-sm-6">

				   				<br><br><br>
				   				<div class="main">
				   					<div class="inner-main" >
				   				<div class="panel panel-defult" >
				   					<div class="w3-content" >
				   					<div class="panel-heder">
				   						<h1></h1>
				   						<span></span>
				   					</div>
				   					<div class="panel-body">
				   						<h2>Visted Tour Site</h2><a href="#" data-target="#photomodal" data-toggle="modal"><i class="fa fa-plus" style="float:right;color: black;background-color: rgb(163, 163, 194);font-size:15px; ">Add Sites</i></a>
				   					</div>
				   					<div class="panel-footer" id="panel-footer" >
				   						<div class="table-responsive" id="panel">
				   							<table class="table table-striped">
				   								<tr>
													<th style="background-color: black;color: white;">Num</th>
													<th style="background-color: black;color: white;">Site</th>
													<th style="background-color: black;color: white;">Photos</th>
													
													<th style="background-color: black;color: white;">Delete Places</th>

												</tr>
												<?php
													include("db_connect.php");
													$sql="SELECT * FROM site";
													$select=mysqli_query($connect,$sql);
													$query=mysqli_num_rows($select);
									                if($query>0){
													while($row=mysqli_fetch_assoc($select)){
													?>
													<tr>
														<td style="color: black;"><?php echo $row["site_id"];?></td>
														<td style="color: black;"><?php echo $row["place"];?></td>
														<td>
															<a href="showImages.php?id=<?php echo $row['site_id'];?>"<button class="btn btn-sm"><i class="fa fa-camera"></i></button></a>
														</td>
														
														<td style="color: red;">
															<a href="delete.php?c_id=<?php echo $row['site_id'];?>"><button class="btn btn-sm"><i class="fa fa-trash"></i></button></a>
														</td>
													</tr>
													<?php
													}
												    }
													?>
													</tr>
				   							</table>
				   							
				   						</div>
				   					</div>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
				   	</div>
				   			    <div class="col-sm-5">
				   			    	<br><br><br>
										<div class="panel-header">
											<h1 style="color: white;">PLAN YOUR VISIT</h1>
										</div>
										<form method="POST" action="maps.php" id="form1">
										<div class="panel-body">
											<div class="form-group">
												<label style="color: white;">SELECT A CATEGORY</label>
												<select class="form-control" id="category">
													<option value="meals">Meals</option>
													<option value="camping">Camping</option>
							                        <option value="Recretional">Recretional</option>
							                        <option value="Tour Visits">Tour Visits</option>
												</select>
											</div>
											<div class="form-group">
												<label style="color: white;">SELECT A TYPE</label>
							                    <select class="form-control" id="Recretional" style="display: none;"> 
							                        <option placeholder="Select A Type" style="display:none;">Mountion Climbing</option>
							                        <option>Deep Sea Diving</option>
							                        <option>Sky Diving</option>
							                        <option></option>
							                    </select>
							                    <select class="form-control" id="Tour Visits">
							                        <option>museum</option>
							                        <option>National Reserves</option>
							                        <option>National Park</option>
							                    </select>
							                    <select class="form-control" id="meals" style="display: none;">
							                        <option value="fish">Fish</option>
							                        <option value="mukimo">Mukimo</option>
							                    </select>

							                    <select class="form-control" id="camping" style="display: none;">
							                        <option value="hryax">Hyrax</option>
							                        <option value="tfalls">Thompson falls</option>
							                    </select>
											</div>
											<div class="form-group">
												<input type="text" name="SELECT A REGION">
												<label style="color:white;">SELECT A REGION</label>
											</div>
											<div class="form-group">
												<input type="text" name="SEARCH">
												<span ></span>
												<label style="color: white;"><i class="fa fa-search"></i>SEARCH</label>
											</div>
											<button class="btn btn-sm btn-success" type="submit" name="submit">submit</button>
										</div>
									</form>
									</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		
		

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	<div class="modal fade" id="sitemodal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1>add site</h1>
			</div>
			<div class="modal-body">
				<form method="POST" action="site.php">
					<div class="form-group">
						<label>Site</label>
						<input type="text" name="place" class="form-control" placeholder="Enter site">
					</div>

					<button class="btn btn-sm btn-success" name="submit" type="submit">Submit</button>&nbsp<button class="btn btn-sm btn-danger" name="reset" type="reset">Reset</button>
				</form>
			</div>
		</div>
		
	</div>
    </div>
	<div class="modal fade" id="photomodal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1>Add new site</h1>
			</div>
			<div class="modal-body">
				<form action="upload_photo.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Site</label>
						<input type="text" name="place" class="form-control" placeholder="Enter site">
					</div>
				    Select Photos for this site to Upload:
				    <input type="file" name="filed[]" class="form-control" multiple>
				    <input type="hidden" name="user_id" id="user_id" value="<?php echo $row2["id"];?>">
				    <div class="form-group">
						<label>Site Description</label>
						<textarea name="sitedescription" class="form-control"></textarea>
					</div>
<br>
				    <button class="btn btn-sm btn-success" name="submit" type="submit">Submit</button>&nbsp<button class="btn btn-sm btn-danger" name="reset" type="reset">Reset</button>
				</form>
			</div>
		</div>
		
	</div>
    </div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

