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