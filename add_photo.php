<?php
session_start();
include("db_connect.php");
$active_user=$_SESSION["active_user"];
$plac=$_GET["place_id"];
$sql="SELECT * FROM site WHERE place='$plac'";
$query=mysqli_query($connect,$sql);
$count=mysqli_num_rows($query);
$row=mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/w3v3.css">
	<link rel="stylesheet" type="text/css" href="css/css/css/fontawesome-all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
    </style>
</head>
<body>	
<form action="upload_photo.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="hid" name="site_id" id="site_id" value="<?php echo $row["id"];?> ">
    <input type="submit" name="submit" value="Upload">
</form>
</body>
</html>