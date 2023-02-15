<?php
session_start();
include("db_connect.php");
if(isset($_POST["submit"])){

	$firstname=mysqli_real_escape_string($connect,$_POST["firstname"]);
	$lastname=mysqli_real_escape_string($connect,$_POST["lastname"]);
	$surname=mysqli_real_escape_string($connect,$_POST["surname"]);
	$contacts=mysqli_real_escape_string($connect,$_POST["contacts"]);
	$email=mysqli_real_escape_string($connect,$_POST["email"]);
	$password=mysqli_real_escape_string($connect,$_POST["password"]);
	$confirmpassword=mysqli_real_escape_string($connect,$_POST["confirmpassword"]);

	if($password!=$confirmpassword){
		echo '<script>alert("password do not match");history.back();</script>';
	}else{
		$hashed_password=hash("MD5",$password);
		$sql="SELECT * FROM clients WHERE email='$email'";
		$select=mysqli_query($connect,$sql);
		$count=mysqli_num_rows($select);
		if($count>0){
			echo '<script>alert("user with the same email exist");history.back();</script>';
		}else{
			$sql2="INSERT INTO clients(firstname,lastname,surname,contacts,email,password)VALUES('$firstname','$lastname','$surname','$contacts','$email','$hashed_password')";
			$insert=mysqli_query($connect,$sql2);
			$_SESSION["user"]=$email;
			$active_user=$_SESSION["user"];
			if($insert){
				$_SESSION["active_user"]=$email;
				$active_user=$_SESSION["active_user"];
				echo'<script>alert("REGISTERED SUCCESSFULLY");window.location.assign("http://localhost/ITG/ndashboard.php");</script>';
			}else{
			echo'<script>alert("UNSUCCESSFUL REGISTRATION");history.back();</script>';
			
			}
		}
		mysqli_close($connect);
	}
}
?>