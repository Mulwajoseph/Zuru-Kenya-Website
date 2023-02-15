
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Intelligent Tourist Guide</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link rel="stylesheet" type="text/css" href="css1/css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="css1/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css1/w3v3.css">
	<script type="text/javascript" src="js2/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js2/jquery-1.11.3.min.js"></script>

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
		div.gallery {
		    margin: 5px;
		    border: 1px solid #ccc;
		    float: left;
		    width: 180px;
		}

		div.gallery:hover {
    		border: 1px solid #777;
		}

		div.gallery img {
		    width: 180px;
		    height: 140px;
		}

    </style>
<body>
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
								<li><a href="ndashboard.php">Go Back</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
<div class="col-sm-4">
<?php
	include("db_connect.php");
	if(isset($_POST['load'])){
		$search=mysqli_real_escape_string($connect,$_POST["searchr"]);
		if($search == ""){
			echo'<script>alert("field empty");history.back();</script>';
		}else{

		$sql22 = "SELECT * FROM site4 INNER JOIN siteImages WHERE site4.Site_name = siteImages.Site_name  AND site4.Site_name = '$search'";
		$query22 = mysqli_query($connect,$sql22);
		$count23 = mysqli_num_rows($query22);
		$count22 = mysqli_num_rows($query22);
        $row23=mysqli_fetch_assoc($query22);

        ?>
			<p style="font-size:28px;font-weight: bold;"><?php echo $row23["Site_name"];?></p>
			<p><?php echo $row23["Site_Info"];?></p>
</div>
<div class="col-sm-8">
	 <div>
	        	<h1>Visiting Charges Per Day</h1>
	        	<table class="table table-striped">
				<tr>
					<th style="background-color: black;color: white;">Local Adult</th>
					<th style="background-color: black;color: white;">Local Child</th>
					<th style="background-color: black;color: white;">Visiting Foreigner</th>

				</tr>
					<tr>
						<td style="color: black;"><?php echo $row23["PLAdult"];?></td>
						<td><?php echo $row23["PLYoung"];?></td>
						<td><?php echo $row23["PFEntry"];?></td>
					</tr>
			</table>
	        </div>
        <?php
        if($count23 > 0){
        while($row22=mysqli_fetch_assoc($query22)){
            $imageURL = 'images/thumb/'.$row22["file_name"];
            ?>
			<div class="gallery">
		    <img src="<?php echo $imageURL; ?>" alt="" />
	        </div>
       <?php }

      }   }
}
?>
</div>
</body>
</html>