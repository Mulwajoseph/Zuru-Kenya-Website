<?php
include("db_connect.php");
$place_id=$_GET["c_id"];
$sql="DELETE FROM plans WHERE entry_number='$place_id'";
$delete=mysqli_query($connect,$sql);
if($delete){
	echo'<script>alert("Site records deleted successfully");history.back();</script>';
}else{
    echo'<script>alert("Site records not deleted");history.back();</script>';
}
?>
