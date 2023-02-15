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
<?php
include("db_connect.php");
	if(isset($_POST['search'])){
		$response = "<ul><li>no data found!</li></ul>";

		$q = $connect->real_escape_string($_POST['q']);
		$sql34 = $connect->query(query:"SELECT Site_name FROM site4 WHERE Site_name LIKE '%$q%'");
		if($sql34->num_rows >0){
			$response = "<ul>";

			while($data = $sql34->fetch_array())
				$response .= "<li>".$data['Site_name']."</li>";

			$response .= "</ul>";

		}
		exit($response);
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ITG</title>
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
	<link rel="stylesheet" href="mystyles.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	 <script src="js3/jquery-3.2.1.min.js">
        </script>	
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
			background-image:url(pics/20.jpg) ;
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
								<li><a href="logout.php">LogOut</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li id="pagee" style="background-image: url(pics/7.jpeg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid" id="pagee">
			   			<div class="row">
				   			<div class="w3-content">
				   				<br><br>
				   				<div class="slider-text-inner text-center" id="userprofile">
				   					<div class="text-center">
				   					<img src="pics/18.jpg" class="w3-card-4 img-circle" alt="profile image" id="profile">
				   				    </div>
				   					<h2 style="color: white !important;">Hello <?php echo $row2["surname"];?>, &nbspWelcome to Your ZURU KENYA page</h2>
				   				</div>
				   				<div class="col-sm-5">
				   			    	<br><br><br>
				   			    	<input type="text" name="" placeholder="search For a place" id="searchBox">
		                            <div id="response"></div>
		                            <br><br>
										<div class="panel-header">
											<h2>Plan Your Visit</h2>
											<p>make your plans now &amp; don't miss out on the wonderfull things &amp; places.</p>
										</div>
										<form method="POST" action="plans.php" class="form-vertical">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group pt-5">
											<label>Select Site</label>
											<input type="text" name="site_name" id="site_name" class="form-control" 
											placeholder="Site name" onkeyup="GetDetail(this.value)" value="">
											<div id="response1"></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group pt-5">
											<label>Region</label>
											<input type="text" name="region" id="region" class="form-control" 
											placeholder="Region" value="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group pt-5">
											<label> Hotel</label>
											<input type="text" name="hotel" id="hotel" placeholder="hotel" class="form-control" value="">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group pt-5">
											<label>Enter Number Of Days</label>
											<input type="text" name="days" placeholder="Enter Days" id="days" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
									<div class="form-group pt-5">
											<label>Select Transport</label>
											<select type="text" class="form-control" id="transport" name="transport" style="color: black;" > 
													<option placeholder="select means of Transport" value="uber" >uber</option>
													<option value="wasili">wasili</option>
				                  <option value="Tour car">Tour car</option>
				                  <option value="Personal arrangements">Person arrangements</option>
											</select>
										</div>
									</div>
								</div>
								<button class="btn btn-md btn-success" type="submit" name="save">submit</button><br><br>
							</form>
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
				   						<h2>Made Plans</h2><a href="#" data-target="#photomodal" data-toggle="modal">
				   					</div>
				   					<div class="panel-footer" id="panel-footer" >
				   						<div class="table-responsive" id="panel">
				   							<table class="table table-striped">
				   								<tr>
													<th style="background-color: black;color: white;">Plan   Number</th>
													<th style="background-color: black;color: white;">Tour site</th>
													<th style="background-color: black;color: white;">Region</th>
													<th style="background-color: black;color: white;">hotel</th>
													<th style="background-color:  black;color: white;">days</th>
													<th style="background-color: black;color: white;">Transport</th>
													<th>accomplish</th>
													<th style="background-color: black;color: white;">remove plan</th>

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
														<td><?php echo $row[""];?></td>
														<td><?php echo $row[""];?></td>
														<td><?php echo $row[""];?></td>
														<td><?php echo $row[""];?></td>
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
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
         <script>

        // onkeyup event will occur when the user
        // release the key and calls the function
        // assigned to this event
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("region").value = "";
                document.getElementById("hotel").value = "";
                return;
            }
            else {

                // Creates a new XMLHttpRequest object
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {

                    // Defines a function to be called when
                    // the readyState property changes
                    if (this.readyState == 4 &&
                            this.status == 200) {
                        
                        // Typical action to be performed
                        // when the document is ready
                        var myObj = JSON.parse(this.responseText);

                        // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value
                        // received to first name input field
                        
                        document.getElementById(
                            "region").value = myObj[0];
                        
                        // Assign the value received to
                        // last name input field
                        document.getElementById(
                            "hotel").value = myObj[1];
                    }
                };

                // xhttp.open("GET", "filename", true);
                xmlhttp.open("GET", "data.php?site_name=" + str, true);
                
                // Sends the request to the server
                xmlhttp.send();
            }
        }
    </script>
    <script>

        // onkeyup event will occur when the user
        // release the key and calls the function
        // assigned to this event
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("region").value = "";
                document.getElementById("hotel").value = "";
                return;
            }
            else {

                // Creates a new XMLHttpRequest object
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {

                    // Defines a function to be called when
                    // the readyState property changes
                    if (this.readyState == 4 &&
                            this.status == 200) {
                        
                        // Typical action to be performed
                        // when the document is ready
                        var myObj = JSON.parse(this.responseText);

                        // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value
                        // received to first name input field
                        
                        document.getElementById(
                            "region").value = myObj[0];
                        
                        // Assign the value received to
                        // last name input field
                        document.getElementById(
                            "hotel").value = myObj[1];
                    }
                };

                // xhttp.open("GET", "filename", true);
                xmlhttp.open("GET", "data.php?site_name=" + str, true);
                
                // Sends the request to the server
                xmlhttp.send();
            }
        }
    </script>
    <script src="js3/jquery-3.2.1.min.js">
        </script>
	
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

