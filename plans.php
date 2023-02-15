<?php
include("db_connect.php");
if(isset($_POST["save"]))
{
	$user_email = mysqli_real_escape_string($connect,$_POST['uuser_id']);
	$site_name = mysqli_real_escape_string($connect,$_POST['site_name']);
	$region = mysqli_real_escape_string($connect,$_POST['region']);
	$hotel = mysqli_real_escape_string($connect,$_POST['hotel']);
	$days = mysqli_real_escape_string($connect,$_POST['days']);
	$transport = mysqli_real_escape_string($connect,$_POST['transport']);

	$sql24 = "INSERT INTO plans(RegionName,TourSite,Transportation,Days,hotel,user_email)VALUES('$region','$site_name','$transport','$days','$hotel','$user_email')";

	$insert24 = mysqli_query($connect,$sql24);
	if($insert24)
	{
		echo'<script>alert("plans added");history.back();</script>';

	}else{
		echo'<script>alert("plans not added");history.back();</script>';

	}
}
?>