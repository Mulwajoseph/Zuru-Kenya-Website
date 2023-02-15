<?php
session_start();
error_reporting(0);
include("db_connect.php");
if(isset($_POST["submit"])){
	$place=mysqli_real_escape_string($connect,$_POST["place"]);

	$sql="SELECT * FROM site WHERE place='$place'";
	$select=mysqli_query($connect,$sql);
	$query=mysqli_num_rows($select);
	if($query>0){
		echo'<script>alert("place exist");history.back();</script>';

	}else{
		$sql2="INSERT INTO site(place) VALUES ('$place')";
		$insert=mysqli_query($connect,$sql2);
		if(!$insert){
				echo'<script>alert("site not added");history.back();</script>';
		}else{
			echo'<script>alert("site added");history.back();</script>';
		}
		
	}
}
?>