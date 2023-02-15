<?php

$site_name = $_REQUEST["site_name"];

include("db_connect.php");
if($site_name !== "")
{

	$sql10= "SELECT Site_Region ,site_hotel FROM site4 WHERE Site_name ='$site_name'";
	$query10 = mysqli_query($connect,$sql10);
	$row10= mysqli_fetch_array($query10);

	$region = $row10["Site_Region"];
	$hotel = $row10["site_hotel"];

}
$result=array("$region", "$hotel");
$myjson = json_encode($result);
echo $myjson;
?>