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

$sql5="SELECT * FROM site4";
$select5=mysqli_query($connect,$sql5);
$query5=mysqli_num_rows($select5);
$row5=mysqli_fetch_assoc($select5);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="js3/jquery-3.2.1.min.js">
    </script>
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
	<!--<link rel="stylesheet" href="css/style.css">-->
	<link rel="stylesheet" href="mystyles.css">
	<style type="text/css">
		.colorlib-nav {
  margin: 0; }
  @media screen and (max-width: 768px) {
    .colorlib-nav {
      margin: 0; } }
  .colorlib-nav .top {
    display: block;
    background: whitesmoke;
    padding: .8em 0; }
    .colorlib-nav .top p {
      color: gray;
      margin: 0; }
    .colorlib-nav .top .num {
      display: inline-block; }
      @media screen and (max-width: 768px) {
        .colorlib-nav .top .num {
          display: none; } }
    .colorlib-nav .top .colorlib-social {
      display: inline-block;
      padding: 0;
      margin: 0 0 0 20px; }
      .colorlib-nav .top .colorlib-social li a {
        color: #4586FF;
        padding: 4px 7px; }
  .colorlib-nav .top-menu {
    padding: 40px 30px; }
    @media screen and (max-width: 768px) {
      .colorlib-nav .top-menu {
        padding: 28px 1em; } }
  .colorlib-nav #colorlib-logo {
    font-size: 24px;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
    font-weight: 600; }
    .colorlib-nav #colorlib-logo a {
      position: relative;
      color: #000; }
      .colorlib-nav #colorlib-logo a i {
        position: absolute;
        top: 4px;
        left: 0;
        color: #4586FF; }
  @media screen and (max-width: 768px) {
    .colorlib-nav .menu-1 {
      display: none; } }
  .colorlib-nav ul {
    padding: 0;
    margin: 8px 0 0 0; }
    .colorlib-nav ul li {
      padding: 0;
      margin: 0;
      list-style: none;
      display: inline;
      font-weight: 400; }
      .colorlib-nav ul li a {
        position: relative;
        font-size: 15px;
        padding: 30px 12px;
        color: rgba(0, 0, 0, 0.7);
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s; }
        .colorlib-nav ul li a:hover {
          color: #000; }
      .colorlib-nav ul li.has-dropdown {
        position: relative; }
        .colorlib-nav ul li.has-dropdown .dropdown {
          width: 140px;
          -webkit-box-shadow: 0px 14px 33px -9px rgba(0, 0, 0, 0.75);
          -moz-box-shadow: 0px 14px 33px -9px rgba(0, 0, 0, 0.75);
          box-shadow: 0px 14px 33px -9px rgba(0, 0, 0, 0.75);
          z-index: 1002;
          visibility: hidden;
          opacity: 0;
          position: absolute;
          top: 40px;
          left: 0;
          text-align: left;
          background: #000;
          padding: 20px;
          -webkit-border-radius: 4px;
          -moz-border-radius: 4px;
          -ms-border-radius: 4px;
          border-radius: 4px;
          -webkit-transition: 0s;
          -o-transition: 0s;
          transition: 0s; }
          .colorlib-nav ul li.has-dropdown .dropdown:before {
            bottom: 100%;
            left: 40px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #000;
            border-width: 8px;
            margin-left: -8px; }
          .colorlib-nav ul li.has-dropdown .dropdown li {
            display: block;
            margin-bottom: 7px; }
            .colorlib-nav ul li.has-dropdown .dropdown li:last-child {
              margin-bottom: 0; }
            .colorlib-nav ul li.has-dropdown .dropdown li a {
              padding: 2px 0;
              display: block;
              color: #999999;
              line-height: 1.2;
              text-transform: none;
              font-size: 13px;
              letter-spacing: 0; }
              .colorlib-nav ul li.has-dropdown .dropdown li a:hover {
                color: #fff; }
        .colorlib-nav ul li.has-dropdown:hover a, .colorlib-nav ul li.has-dropdown:focus a {
          color: #000; }
      .colorlib-nav ul li.btn-cta a {
        padding: 30px 0px !important;
        color: #fff; }
        .colorlib-nav ul li.btn-cta a span {
          background: #4586ff;
          padding: 4px 10px;
          display: -moz-inline-stack;
          display: inline-block;
          zoom: 1;
          *display: inline;
          -webkit-transition: 0.3s;
          -o-transition: 0.3s;
          transition: 0.3s;
          -webkit-border-radius: 100px;
          -moz-border-radius: 100px;
          -ms-border-radius: 100px;
          border-radius: 100px; }
        .colorlib-nav ul li.btn-cta a:hover span {
          -webkit-box-shadow: 0px 14px 20px -9px rgba(0, 0, 0, 0.75);
          -moz-box-shadow: 0px 14px 20px -9px rgba(0, 0, 0, 0.75);
          box-shadow: 0px 14px 20px -9px rgba(0, 0, 0, 0.75); }
      .colorlib-nav ul li.active > a {
        color: #000 !important;
        position: relative; }
        .colorlib-nav ul li.active > a:after {
          opacity: 1;
          -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0); 
      }
      #form1 ul{
      	float: left;
		list-style: none;
		padding: 0px;
		border: 1px solid black;
		margin-top: 0px;
      }
	
	#form1 input ,ul{
		width: 250px;
	}
	#form1 li:hover{
		color: white;
		background: blue;
	}
	#profile{
			height: 105px !important;
			width: 105px !important;
			float: left !important;
			
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
							<p class="site">www.zurukenya.com</p>
						</div>
						<div class="col-xs-8 text-right">
							<p class="num">Call: +2547-123-456</p>
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
							<div id="colorlib-logo"><a href="index.html">ZURU KENYA</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul style="float:right;">
								<li><a href="logout.php">LogOut</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
		<div class="slider-text-inner text-center" id="userprofile">
		<div class="text-center">
			<img src="pics/18.jpg" class="w3-card-4 img-circle" alt="profile image" id="profile">
		    </div>
			<h2 style="color: black; !important;">Hello <?php echo $row2["surname"];?>, &nbspWelcome to Your ZURU KENYA page</h2>
		</div>
		<br><br><br>
      <div class="col-sm-4">
      	<form id="form1" method="POST" action="x.php">
      		<input type="text" name="searchr" placeholder="search For a place" id="searchBox"><a><button class="btn btn-sm" type="" name="load"><i class="fa fa-angle-right"><img src="pics/search.png" width="20px"></i></button></a>
         	<div id="response"></div>
        </form>
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
					<input type="hidden" name="uuser_id"  id="uuser_id" value="<?php echo $row2["email"];?>" class="form-control">
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
<br><br><br>
<div class="col-sm-7">
	<div class="panel-body">
		<h2>Made Plans</h2><a href="#" data-target="#photomodal" data-toggle="modal">
	</div>
	<div class="panel-footer" id="panel-footer">
		<div class="table-responsive" id="panel">
			<table class="table table-striped">
				<tr>
					<th style="background-color: black;color: white;">Tour site</th>
					<th style="background-color: black;color: white;">Region</th>
					<th style="background-color: black;color: white;">hotel</th>
					<th style="background-color:  black;color: white;">days</th>
					<th style="background-color: black;color: white;">Transport</th>
					<th style="background-color: black;color: white;">remove plan</th>

				</tr>
				<?php
					include("db_connect.php");
					$active_user=$_SESSION["active_user"];
					$sql="SELECT * FROM plans WHERE user_email = '$active_user'";
					$select=mysqli_query($connect,$sql);
					$query=mysqli_num_rows($select);
	                if($query>0){
					while($row=mysqli_fetch_assoc($select)){
					?>
					<tr>
						<td style="color: black;"><?php echo $row["TourSite"];?></td>
						<td><?php echo $row["RegionName"];?></td>
						<td><?php echo $row["hotel"];?></td>
						<td><?php echo $row["Days"];?></td>
						<td><?php echo $row["Transportation"];?></td>
						<td style="color: red;">
							<a href="delete.php?c_id=<?php echo $row['entry_number'];?>"><button class="btn btn-sm" style="color: red;">Delete<i class="fa fa-trash"></i></button></a>
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
 <script type="text/javascript">
       	$(document).ready(function() {
       		$("#searchBox").keyup(function() {
       			var query = $("#searchBox").val();
       			if(query.length > 0){
       				$.ajax(
       					{	
       						url:'ndashboard.php',
       						method:'POST',
       						data: {
       							search: 1,
       							q: query
       						},
       						success: function(data){
       							$("#response").html(data)

       						},
       						dataType: "text" 
       					 }

       					
       				);
       			}
       			

       		});
       		$(document).on('click', 'li', function() {
       			var Site_name = $(this).text();
       			$("#searchBox").val(Site_name);
       			$("#response").html("");


       		});
       	});

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
</body>
</html>