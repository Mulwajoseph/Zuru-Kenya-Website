
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
			.gallery img {
						    width: 20%;
						    height: auto;
						    border-radius: 5px;
						    cursor: pointer;
						    transition: .3s;
						    }

    </style>
</head>
<body>
<div class="col-sm-3">
<?php
	include("db_connect.php");
	if(isset($_POST['load'])){
		$search=mysqli_real_escape_string($connect,$_POST["searchr"]);

		$sql22 = "SELECT * FROM site4 INNER JOIN siteImages WHERE site4.Site_name = siteImages.Site_name  AND site4.Site_name = '$search'";
		$query22 = mysqli_query($connect,$sql22);
		$count22 = mysqli_num_rows($query22);
        $row22=mysqli_fetch_assoc($query22);
        /*while($row22=mysqli_fetch_assoc($query22)){
            $imageURL = 'images/thumb/'.$row["file_name"];
        }*/
         
}
?>
<br><br>
<p><?php echo $row22["Site_name"];?></p>
<br><br>
<p><?php echo $row22["Site_Info"];?></p>
</div>
<div class="col-sm-9">	

	<div class="gallery">
		<img src="<?php echo $imageURL; ?>" alt="" />
		<img src="<?php echo'images/thumb/'.$row22['file_name']; ?>" alt="" />
	</div>
   			<div class="gallery">

		  	</div>
		  	</div>
</body>
</html>