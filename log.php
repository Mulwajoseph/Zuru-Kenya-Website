<?php
session_start();
include("db_connect.php");
if(isset($_POST["submit"])){
	$email=mysqli_real_escape_string($connect,$_POST["email"]);
	$password=mysqli_real_escape_string($connect,$_POST["password"]);

	$hashed_password=hash("MD5",$password);

	$sql="SELECT * FROM clients WHERE email='$email' AND password='$hashed_password'";
	$select=mysqli_query($connect,$sql);
	$count=mysqli_num_rows($select);
	if($count>0){
		$_SESSION["active_user"]=$email;
		$active_user=$_SESSION["active_user"];
		echo '<script>window.location.assign("http://localhost/ITG/ndashboard.php");</script>';
	}else{
		echo '<script> alert ("Unsuccessful login");window.location.assign("http://localhost/ITG/login.html");</script>';		
	}
}else{
	    echo'<script>alert("form not submitted")window.location.assign("http://localhost/ITG/login.html")</script>';
}
?>