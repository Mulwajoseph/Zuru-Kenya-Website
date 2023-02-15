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
<html>
	<head>
		<title></title>
		<!--<style type="text/css">
			ul{
				float: left;
				list-style: none;
				padding: 0px;
				border: 1px solid black;
				margin-top: 0px;
			}
			input ,ul{
				width: 250px;
			}
			li:hover{
				color: white;
				background: blue;
			}
		</style>-->
		<link rel="stylesheet" type="text/css" href="mystyles.css">
	</head>

	<body>

		<input type="text" name="" placeholder="search Query" id="searchBox" >
		<div id="response"></div>
        <script src="js3/jquery-3.2.1.min.js">
        </script>
        <script type="text/javascript">
       	$(document).ready(function() {
       		$("#searchBox").keyup(function() {
       			var query = $("#searchBox").val();
       			if(query.length > 0){
       				$.ajax(
       					{	
       						url:'get.php',
       						method:'POST',
       						data: {
       							search: 1,
       							q: query
       						},
       						success: function(data){
       							$("#response").html(data)

       						},
       						dataType: "text" 
       					 }

       					
       				);
       			}
       			

       		});
       		$(document).on('click', 'li', function() {
       			var Site_name = $(this).text();
       			$("#searchBox").val(Site_name);
       			$("#response").html("");


       		});
       	});
        </script>

	</body>
</html>
 <script type="text/javascript">
    	$(document).ready(function() {
       		$("#site_name").keyup(function() {
       			var query = $("#site_name").val();
       			if(query.length > 0){
       				$.ajax(
       					{	
       						url:'ndashboard.php',
       						method:'POST',
       						data: {
       							search: 1,
       							q: query
       						},
       						success: function(data){
       							$("#response1").html(data)

       						},
       						dataType: "text" 
       					 }

       					
       				);
       			}
       			

       		});
       		$(document).on('click', 'li', function() {
       			var Site_name = $(this).text();
       			$("#site_name").val(Site_name);
       			$("#response1").html("");


       		});
       	});
    </script>